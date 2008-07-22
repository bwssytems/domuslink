<div id="content">

<?php echo form_open('admin/user_add'); ?>
<table cellspacing="2" cellpadding="2" border="0" align="center">
<tr><td align="center" colspan="2"><h2>Add User</td></tr>
<tr><td>Name:</td><td><input type="input" name="name" /></td></tr>
<tr><td>Email:</td><td><input type="input" name="email" /></td></tr>
<tr><td>Username:</td><td><input type="input" name="username" /></td></tr>
<tr><td>Password:</td><td><input type="input" name="password" /></td></tr>
<tr><td>Type:</td><td><?php echo form_dropdown('group_id', $groups, '2'); ?></td></tr>
<tr><td>Status:</td><td><?php echo form_dropdown('status', $status, 'AC'); ?></td></tr>

<tr><td></td><td><input type="submit" value="Add" /></td></tr>
</table>
<?php echo form_close(); ?>

<br />
</div>