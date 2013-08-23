<?php
class Controller_Bell extends Controller_Admin {
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
	
	public function action_edit($idBellProfile=0){
		//Nothing just load the main page!
		$idBellProfile = $this->request->param('id');
		$data	= array();
		$q		= DB::query(Database::SELECT,"SELECT * FROM `BellProfiles` WHERE `idBellProfile` = :idBellProfile");
		$q->parameters(array(
			':idBellProfile'	=> $idBellProfile,
		));
		$result = $q->as_object()->execute();
		foreach($result as $row){
			$row->hours = DB::query(Database::SELECT,"SELECT * FROM `BellTimes` WHERE `idBellProfile` = :idBellProfile ORDER BY `hour` ASC, `minute` ASC")->parameters(array(':idBellProfile'=>$row->idBellProfile))->as_object()->execute();
			$data[] = $row;
		}
		var_dump($data,$result,$idBellProfile);
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