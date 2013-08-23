<?
if(isset($sidebar_data) && $sidebar_data != ''){
	foreach($sidebar_data as $item){
		echo '<span idbellprofile="'.$item->idBellProfile.'" class="schedule ui-draggable">';
        echo '<h3>'.$item->name.'</h3>';
        echo '<p>'.$item->description.'</p>';
        echo '<ul>';
		foreach($item->hours as $hour){
			$pm = ($hour->hour-12 > 0);
			echo '<li>&nbsp;'.($pm ? $hour->hour-12 : $hour->hour).':'.str_pad($hour->minute,2,"0",STR_PAD_LEFT).($pm ? 'pm' : 'am').' '.$hour->name.'</li>';
		}
		echo '<li class="additional"><a href="'.URL::site('schedule/edit/'.$item->idBellProfile).'">Edit…</a></li>';
        echo '</ul>';
        echo '</span>';
	}
} else {
	echo "Something is misconfigured.";
}
?>