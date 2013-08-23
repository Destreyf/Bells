<h2>Editing Audio '<?=$data['audio']->name;?>'</h2>
<form method="post" enctype="multipart/form-data">
	<table>
    	<tr>
        	<td><strong>Name</strong>: </td>
            <td colspan="3"><input type="text" name="data[name]" value="<?=$data['audio']->name;?>" style="width:315px;" /></td>
        </tr>
        <tr>
        	<td colspan="4"><strong>Description</strong>: </td>
        </tr>
        <tr>
        	<td colspan="4"><textarea name="data[description]" rows="4" cols="60"><?=$data['audio']->description;?></textarea></td>
        </tr>
        <tr>
        	<td><strong>Filename</strong>: </td>
            <td title="<?=$data['audio']->filename;?>" id="file"><?=$data['audio']->filename;?></td>
            <td id="listen"><?=(realpath(APPPATH.'../'.$data['audio']->filename) ? '<a href="'.URL::site($data['audio']->filename).'" class="quick_play">Listen</a>' : 'Error, Audio File Missing?');?>&nbsp;&nbsp;&nbsp;|</td>
            <td style="margin-left:0px;padding-left:0px;"><a href="#" id="change_file">Change</a></td>
        </tr>
        <tr>
        	<td><strong>System Default: </strong></td>
            <td colspan="3"><label>Yes <input type="checkbox" name="data[default]" value="1"<?=($data['audio']->default == 1 ? ' checked="checked"' : '');?> /></label></td>
        </tr>
        <tr style="background-color:#FFF;">
        	<td colspan="4" align="center" valign="bottom" height="40"><input type="submit" value="Save Changes"></td>
        </tr>
    </table>
</form>