<h2 style="float:left;">Bell Scheduler</h2>
<span style="float:left;margin-left:60px;font-size:22px;">
Zone: 
	<select id="Zone">
    	<?php foreach($zones as $myzone){ ?>
		<option value="<?=$myzone->idBellZone;?>"<?=($zone == $myzone->idBellZone ? ' selected="selected"' : '');?>><?=$myzone->name;?></option>
		<?php } ?>
	</select>
</span>
<br clear="all"/>
<p>You can manage your schedule by using the calendar window below</p>
<div id="calendar"></div>