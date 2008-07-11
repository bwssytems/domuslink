<div id="content">

<br />
<table cellspacing="0" cellpadding="4" border="0" align="center">
<tr><td width="160px"><b>Username</b></td><td width="300px"><b>Name</b></td><td align="center"><b>Actions</b></td></tr>
<?php foreach($users->result() as $row): ?>
<tr class="row">
<td><?php echo $row->username; ?></td><td><?php echo $row->name; ?></td><td><font size="-2"><?php echo anchor('admin/user_languages/'.$row->id, 'Language(s)'); ?> / <?php echo anchor('admin/user_edit/'.$row->id, 'Edit'); ?> / <?php echo anchor('admin/user_delete_confirm/'.$row->id, 'Remove'); ?></font></td>
</tr>
<?php endforeach; ?>
</table>
<br />

</div>