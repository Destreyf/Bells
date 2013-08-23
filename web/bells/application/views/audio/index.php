<a href="<?=URL::site("audio/add");?>">Add New Bell Audio…</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; foreach($data['audio'] as $row){ $i++; ?>
        <tr>
            <td><?=$row->name.($row->default == 1 ? ' <strong>(System Default)</strong>' : '');?></td>
            <td><?=substr($row->description,0,40);?></td>
            <td>
                <a href="<?=URL::site($row->filename);?>" class="quick_play">Listen</a>
                <a href="<?=URL::site('audio/manage/'.$row->idBellAudio);?>">Manage</a>
                <a href="<?=URL::site('audio/delete/'.$row->idBellAudio);?>" class="delete" title="Are you sure you want to delete the bell audio '<?=$row->name;?>'?" parent=":refresh">Delete…</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>