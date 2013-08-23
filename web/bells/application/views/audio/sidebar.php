<span>
	<h3>Create new Bell Audio</h3>
    <p>Create a new usable audio entry for the Bell Scheduling Platform.  You can upload a MP3 or WAV file and the system will automatically convert the media for you.</p>
    <ul>
    	<li class="additional">
        	<a href="<?=URL::site("audio/add");?>">Add…</a>
       	</li>
   	</ul>
</span>
<? foreach($sidebar_data as $row){ ?>
<span>
	<h3><?=$row->name.($row->default == 1 ? ' <strong>(System Default)</strong>' : '');?></h3>
    <p><?=$row->description;?></p>
    <ul>
    	<li class="additional">
        	<a href="<?=URL::site("audio/manage/".$row->idBellAudio);?>">Manage…</a> | 
            <a href="<?=URL::site('audio/delete/'.$row->idBellAudio);?>" class="delete" title="Are you sure you want to delete the bell audio '<?=$row->name;?>'?" parent=":refresh">Delete…</a>
       	</li>
  	</ul>
</span>
<?php } ?>