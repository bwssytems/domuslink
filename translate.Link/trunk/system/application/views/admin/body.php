<div id="content">

<ul>
<table cellspacing="0" cellpadding="4" border="0">
<?php foreach($users->result() as $row): ?>
<tr>
<td><li><?php echo $row->name; ?></li></td><td>-> <?php echo anchor('admin/languages/'.$row->id, 'Languages'); ?>/<?php echo anchor('admin/user_edit/'.$row->id, 'Edit'); ?>/<?php echo anchor('admin/user_delete/'.$row->id, 'Remove'); ?></td>
</tr>
<?php endforeach; ?>
</table>
</ul>

</div>