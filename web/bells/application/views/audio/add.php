<h2>Create new Bell Audio</h2>
<form method="post" enctype="multipart/form-data">
	<table>
    	<tr>
        	<td><strong>Name</strong>: </td>
            <td colspan="2"><input type="text" name="data[name]" style="width:315px;" /></td>
        </tr>
        <tr>
        	<td colspan="2"><strong>Description</strong>: </td>
        </tr>
        <tr>
        	<td colspan="2"><textarea name="data[description]" rows="4" cols="60"></textarea></td>
        </tr>
        <tr>
        	<td><strong>File</strong>: </td>
            <td><input type="file" name="filename" /> .mp3 & .wav only</td>
        </tr>
        <tr>
        	<td><strong>System Default: </strong></td>
            <td colspan="3"><label>Yes <input type="checkbox" name="data[default]" value="1" /></label></td>
        </tr>
        <tr style="background-color:#FFF;">
        	<td colspan="4" align="center" valign="bottom" height="40"><input type="submit" value="Save Changes"></td>
        </tr>
    </table>
</form>