<div id="content">

<table cellspacing="2" cellpadding="2" border="0">
<?php foreach($users->result() as $row): ?>
<tr>
	<td><?php echo $row->name; ?></td>
	<td><font size="-2"><?php echo anchor('admin/languages/'.$row->id, 'Languages'); ?></font></td>
	<td><font size="-2"><?php echo anchor('admin/user_edit/'.$row->id, 'Edit'); ?></font></td>
	<td><font size="-2"><?php echo anchor('admin/user_delete/'.$row->id, 'Remove'); ?></font></td>
</tr>
<?php endforeach; ?>
</table>

</div>