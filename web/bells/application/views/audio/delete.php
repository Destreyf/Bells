<h2>Delete Bell Audio '<?=$data['audio']->name;?>'</h2>
Are you sure want to remove teh audio file '<?=$data['audio']->name;?>'?
<form method="post" action="<?=Request::current()->url();?>">
	<input type="submit" value="Confirm" name="confirm" /> | <input type="button" value="Go Back" onclick="window.location.href='<?=$_SERVER['HTTP_REFERER'];?>';" />
</form>