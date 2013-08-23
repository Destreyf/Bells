<h2 style="float:left;">Edit Schedule `<?=$data['schedule']->name;?>`</h2>
<br clear="all"/>
<form method="post">
	<h3>General Settings</h3>
	<table>
    	<tr>
        	<td>Schedule Name: </td>
            <td><input type="text" name="data[name]" value="<?=$data['schedule']->name;?>"></td>
        </tr>
        <tr>
        	<td>Default Audio File: </td>
            <td>
            	<select name="data[idBellAudio]">
                	<option value="0">System Default</option>
                    <? foreach($data['audio'] as $audio){ ?>
                    <option value="<?=$audio->idBellAudio;?>"<?=($audio->idBellAudio == $data['schedule']->idBellAudio ? ' selected="selected"' : '');?>><?=$audio->name.($audio->default != 0 ? ' (System Default)' : '');?></option>
                    <? } ?>
                </select>
            </td>
        </tr>
    </table>
	<h3>Schedule</h3>
	<a href="#" id="new_time">Add New</a>
	<table>
		<thead>
			<tr>
				<th>Time Name</th>
				<th>Time</th>
				<th>Audio File</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php $index=0;foreach($data['schedule']->hours as $row){ ?>
			<tr>
				<td><input type="text" name="times[<?=$index;?>][name]" value="<?=$row->name;?>"/></td>
				<td>
					<select name="times[<?=$index;?>][hour]">
						<?php for($i=1;$i<=12;$i++){ echo '<option'.($i == $row->hour || $i == $row->hour-12 ? ' selected="selected"' : '').'>'.$i.'</option>';}?>
					</select>
					:
					<select name="times[<?=$index;?>][minute]">
						<?php for($i=0;$i<=60;$i++){ echo '<option'.((int)$i == (int)$row->minute ? ' selected="selected"' : '').'>'.str_pad($i,2,"0",STR_PAD_LEFT).'</option>';}?>
					</select>
					<select name="times[<?=$index;?>][ampm]">
						<option value="am"<?=($row->hour < 12 ? ' selected="selected"' : '');?>>AM</option>
						<option value="pm"<?=($row->hour >= 12 ? ' selected="selected"' : '');?>>PM</option>
					</select>
				</td>
				<td>
					<select name="times[<?=$index;?>][idBellAudio]">
						<option value="0">System Default</option>
						<? foreach($data['audio'] as $audio){ ?>
						<option value="<?=$audio->idBellAudio;?>"<?=($audio->idBellAudio == $row->idBellAudio ? ' selected="selected"' : '');?>><?=$audio->name.($audio->default != 0 ? ' (System Default)' : '');?></option>
						<? } ?>
                </select>
				</td>
				<td><a href="#" class="remove_time">Remove</a></td>
			</tr>
		<?php $index++; } echo '<script>var last_index='.$index.';</script>'; ?>
		</tbody>
		<tfoot style="display:none;">
			<tr>
				<td><input type="text" name="times[?-?][name]"></td>
				<td>
					<select name="times[?-?][hour]">
						<?php for($i=1;$i<=12;$i++){ echo '<option>'.$i.'</option>';}?>
					</select>
					:
					<select name="times[?-?][minute]">
						<?php for($i=0;$i<=60;$i++){ echo '<option>'.str_pad($i,2,"0",STR_PAD_LEFT).'</option>';}?>
					</select>
					<select name="times[?-?][ampm]"><option value="am">AM</option><option value="pm">PM</option></select>
				</td>
				<td>
					<select name="times[?-?][idBellAudio]">
						<option value="0">System Default</option>
						<? foreach($data['audio'] as $audio){ ?>
						<option value="<?=$audio->idBellAudio;?>"><?=$audio->name.($audio->default != 0 ? ' (System Default)' : '');?></option>
						<? } ?>
                </select>
				</td>
				<td><a href="#" class="remove_time">Remove</a></td>
			</tr>
		</tfoot>
	</table>
	<input type="submit" value="Save Changes"/>
</form>