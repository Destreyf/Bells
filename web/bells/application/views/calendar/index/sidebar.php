<?
if(isset($sidebar_data) && $sidebar_data != ''){
	foreach($sidebar_data as $item){
		echo '<span idbellprofile="'.$item->idBellProfile.'" class="schedule ui-draggable">';
        echo '<h3>';
        echo '<i class="fa fa-plus" onclick="toggle_menu(this);" style="cursor: pointer;"></i>&nbsp;';
        echo '<a href="'.URL::site('schedule/edit/'.$item->idBellProfile).'" style="float: right">Edit…</a>';
        echo $item->name;
        echo '</h3>';
        echo '<p>'.$item->description.'</p>';
        echo '<ul style="display:none;">';
		foreach($item->hours as $hour){
			$pm = ($hour->hour-12 > 0);
			echo '<li>&nbsp;'.($pm ? $hour->hour-12 : $hour->hour).':'.str_pad($hour->minute,2,"0",STR_PAD_LEFT).($pm ? 'pm' : 'am').' '.$hour->name.'</li>';
		}
        echo '</ul>';
        echo '</span>';
	}
} else {
	echo "Something is misconfigured.";
}
?>