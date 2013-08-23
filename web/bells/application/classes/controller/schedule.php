<?php
class Controller_Schedule extends Controller_Admin {
	/*public function __construct(Request $request, Response $response){
		parent::__construct($request, $response);
	}*/
	public function action_create(){
		$d = array(
			'idBellZone'	=> 0,
			'idBellAudio'	=> 0,
			'name'			=> '~New Bell~',
		);
		$q = DB::insert('BellProfiles',array_keys($d))->values($d)->execute();
		$idBellProfile = $q[0];
		$this->request->redirect("schedule/edit/".$idBellProfile);
	}
	
	public function action_edit(){
		//Nothing just load the main page!
		$idBellProfile = $this->request->param('id');
		$data	= array();
		$q		= DB::query(Database::SELECT,"SELECT * FROM `BellProfiles` WHERE `idBellProfile` = :idBellProfile LIMIT 1");
		$q->parameters(array(
			':idBellProfile'	=> $idBellProfile,
		));
		$result = $q->as_object()->execute();
		if($d = $this->request->post()){
			//var_dump($d['times']);
			//exit;
			//Lets update the database!
			DB::update('BellProfiles')->set($d['data'])->where('idBellProfile', '=', $idBellProfile)->execute();
			
			//Now to clean old bell times out!
			DB::delete('BellTimes')->where('idBellProfile', '=', $idBellProfile)->execute();
			
			//And lets create new bell time records!
			foreach($d['times'] as $key => $time){
				if((string)$key == "?-?"){
					continue;
				}
				$hour = (int)$time['hour']+($time['ampm'] == 'pm' ? ((int)$time['hour'] < 12 ? 12 : 0) : 0);
				$entry = array(
					'idBellProfile'	=> $idBellProfile,
					'idBellAudio'	=> $time['idBellAudio'],
					'hour'			=> ($hour == 24 ? 0 : $hour),
					'minute'		=> $time['minute'],
					'name'			=> $time['name']
				);
				DB::insert('BellTimes',array_keys($entry))->values($entry)->execute();
			}
			$this->request->redirect("schedule/edit/".$idBellProfile);
		}
		foreach($result as $row){
			$row->hours = DB::query(Database::SELECT,"SELECT * FROM `BellTimes` WHERE `idBellProfile` = :idBellProfile ORDER BY `hour` ASC, `minute` ASC")->parameters(array(':idBellProfile'=>$row->idBellProfile))->as_object()->execute();
			break;
		}
		$this->template->data['audio']		= DB::query(Database::SELECT,"SELECT * FROM `BellAudio`")->as_object()->execute();
		$this->template->data['schedule']	= $row;
	}
}
?>