<?php
class Controller_Cron extends Controller {
	public function action_index(){
		
	}
	public function action_bells(){
		sleep(1);
		$start = time();
		$this->write("Starting ClassroomSmart Bell Platform");
		$custom_bell_query	= DB::query(Database::SELECT,"SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = :date AND bt.`hour` = :hour AND bt.`minute` = :minute AND bd.idBellZone= :zone AND bd.last_idBellTime != bt.idBellTime")
							->bind(':date', $date)->bind(':hour', $hour)->bind(':minute', $minute)->bind(':zone', $zone)->as_object();
		$zones_query		= DB::query(Database::SELECT,"SELECT * FROM `BellZones` ORDER BY `idBellZone` DESC")->as_object();
		while(true){
			//Time to loop, and setup standard zones!
			$default_bells_query= DB::query(Database::SELECT,"SELECT * FROM `BellTimes` bt JOIN `BellZoneDefaultProfiles` bzdp ON bzdp.idBellProfile".date('l')." = bt.idBellProfile WHERE bt.hour = :hour AND bt.minute = :minute AND bzdp.idBellZone= :zone")
							->bind(':standard_target',$dayofweek)->bind(':hour', $hour)->bind(':minute', $minute)->bind(':zone', $zone)->as_object();
			/////////////////////////////////////////
			if(isset($zones)){
				unset($zones);
			}
			
			$zones = $zones_query->execute();
			foreach($zones as $target_zone){
				$all_zones = array();
				//Lets find all custom bells to use
				$date	= date('Y-m-d');
				$hour	= date('G');
				$minute	= date('i');
				
				//Assign the zone!
				$zone	= $target_zone->idBellZone;
				
				//call the Query for this zone!
				if(isset($custom_bells)){
					unset($custom_bells);
				}
				//$this->write("Testing For ".$date." HOUR: ".$hour." MINUTE: ".$minute." ZONE: ".$zone);
				$custom_bells = $custom_bell_query->execute();
				//$this->write($custom_bells);
				if(sizeof($custom_bells) > 0){
					//We have custom bells to execute!
					$this->write(print_r($custom_bell_query,true));
					foreach($custom_bells as $custom_bells_row){
						$b 		= $this->get_bell($custom_bells_row->idBellAudio,$custom_bells_row->idBellProfile);
						$this->write(print_r($b,true));
						$path	= realpath(APPPATH.'../'.$b->filename);
						$cmd = "/usr/sbin/asterisk -rx 'originate ".$target_zone->endpoint_data." application playback silence/6&".substr($path,0,-4)."'";
						$response = array();
						$status = exec($cmd,$response);
						$this->write(array($response,$cmd,$status));
						DB::update('BellDates')->set(array('last_idBellTime'=>$custom_bells_row->idBellTime))->where('idBellDate', '=', $custom_bells_row->idBellDate)->execute();
					}
				} else {
					//Check for default bells maybe?
					$dayofweek = date('l');
					if(isset($default_bells)){
						unset($default_bells);
					}
					
					$default_bells = $default_bells_query->execute();
					if(sizeof($default_bells) > 0){
						foreach($default_bells as $row){
							
						}
						$this->write(print_r($default_bells,true));
					} else {
						$all_zones[] = $target_zone;
					}
				}
			}
			sleep(10);
			if(time()-$start >= 10800){
				return;
			}
		}
	}
	public function write($text, $level="Info"){
		echo "[".date('Y-m-d H:ia')."][".$level."] ".(is_object($text) || is_array($text) ? print_r($text,true) : $text)."\n";
		ob_flush();
	}
	public function get_bell($idBellAudio,$idBellProfile=0){
		if($idBellAudio == 0){
			$b = DB::query(Database::SELECT,"SELECT * FROM `BellAudio` WHERE `default` = 1 LIMIT 1")->as_object()->execute();
		} else {
			$b = DB::query(Database::SELECT,"SELECT * FROM `BellAudio` WHERE `idBellAudio` = ".$idBellAudio." LIMIT 1")->as_object()->execute();
		}
		return $b[0];
	}
}
?>
