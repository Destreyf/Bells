<?php
class Controller_Calendar extends Controller_Admin {
	public function __construct(Request $request, Response $response){
		if(!Auth::instance()->logged_in()){
			$action = Request::current()->action();
			if($action != 'index'){
				echo json_encode(array('logged_out'=>true));
				exit;
			}
		}
		parent::__construct($request, $response);
	}
	public function action_index($zone=0){
		//echo Auth::instance()->hash_password("password");
		$zone = $this->request->param('id');
		//Nothing just load the main page!
		$data	= array();
		$q		= DB::query(Database::SELECT,"SELECT * FROM `BellProfiles` WHERE `idBellZone` = :zone || `idBellZone` = 0 ORDER BY `order` ASC");
		$q->parameters(array(
			':zone'	=> $zone,
		));
		$result = $q->as_object()->execute();
		foreach($result as $row){
			$row->hours = DB::query(Database::SELECT,"SELECT * FROM `BellTimes` WHERE `idBellProfile` = :idBellProfile ORDER BY `hour` ASC, `minute` ASC")->parameters(array(':idBellProfile'=>$row->idBellProfile))->as_object()->execute();
			$data[] = $row;
		}
		$this->template->sidebar_data = $data;
		
		/* Lets get Zone Data */
		$q		= DB::query(Database::SELECT,"SELECT * FROM `BellZones`");
		$this->template->zones = $q->as_object()->execute();
		$this->template->zone = $zone;
	}
	public function action_events(){
		//Lets get a list of events for a given bit of information!
		$post	= $this->request->post();
		$query	= DB::query(Database::SELECT, 'SELECT * FROM BellDates bd JOIN `BellProfiles` bp ON bp.idBellProfile = bd.idBellProfile WHERE bd.`date` >= :from AND bd.`date` <= :to AND bd.`idBellZone` = :zone ORDER BY `date` ASC');
 
		$query->parameters(array(
			':from' 	=> date('Y-m-d',$post['start']),
			':to'		=> date('Y-m-d',$post['end']),
			':zone'		=> @(int)$post['zone'],
		));
	
		$result = $query->as_object()->execute();
		$data = array();
		foreach($result as $row){
			if(isset($data_tmp['idBellProfile']) && $data_tmp['idBellProfile'] == $row->idBellProfile){
				if(strtotime($row->date)-strtotime($data_tmp['end']) <= 86400){
					$data_tmp['end'] = $row->date;
					if(!is_array($data_tmp['idBellDate'])){
						$data_tmp['idBellDate'] = array($data_tmp['idBellDate'],$row->idBellDate);
					} else {
						$data_tmp['idBellDate'][] = $row->idBellDate;
					}
					continue;
				} else {
					$data[] = $data_tmp;
					unset($data_tmp);
				}
			} else {
				if(isset($data_tmp)){
					$data[] = @$data_tmp;
					unset($data_tmp);
				}
			}
			$data_tmp = array(
				'idBellProfile'	=> $row->idBellProfile,
				'idBellDate'	=> $row->idBellDate,
				'title'			=> $row->name,
				'start'			=> $row->date,
				'end'			=> $row->date
			);
		}
		if(isset($data_tmp)){
			//Musta gotten lost!
			$data[] = $data_tmp;
		}
		echo json_encode($data);
		exit;
	}
	public function action_add(){
		$post	= $this->request->post();
		$dates	= (isset($post['dates']) ? (is_array($post['dates']) ? $post['dates'] : array($post['dates'])) : array());
		
		
		$start	= strtotime(date('Y-m-d',strtotime($post['from'])));
		$end	= strtotime(date('Y-m-d',strtotime($post['to'])));
		if(is_null($post['to']) || $post['to'] == ''){
			$end = $start;
		}
		$force = isset($post['force']);
		
		$errors = array();
		
		while($start <= $end){
			$day = array(
				'idBellProfile' 	=> $post['idBellProfile'],
				'idBellZone'		=> $post['zone'],
				'date'				=> date('Y-m-d',$start),
				'last_idBellTime'	=> 0
			);
			if(!DB::select()->from('BellDates')->where('idBellProfile','!=',$post['idBellProfile'])->where('date','=',date('Y-m-d',$start))->where('idBellZone','=',$post['zone'])->execute()->count() || $force === true){
				//Lets see if we were given any dates to remove from the system...
				if(sizeof($dates) > 0){
					foreach($dates as $mydate){
						DB::delete('BellDates')->where('idBellDate','=',$mydate)->execute();
					}
				}
				//Need to clean this date if needed
				if($force || DB::select()->from('BellDates')->where('date','=',date('Y-m-d',$start))->where('idBellZone','=',$post['zone'])->execute()->count() > 0){
					//Looks like we need to clean out the old entry!
					DB::delete('BellDates')->where('date','=',date('Y-m-d',$start))->where('idBellZone','=',$post['zone'])->execute();
				}
				
				//Lets create our new entr/y|(ies) now!
				DB::insert('BellDates', array_keys($day))->values($day)->execute();
				$start = strtotime("+1 DAYS",$start);
			} else {
				$errors[] = true;
				break;	
			}
		}
		
		echo json_encode(array('status'=>(sizeof($errors) == 0 ? true : false)));
		exit;
	}
}
?>
