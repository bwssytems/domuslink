<div id="content">

<?php echo form_open('admin/user_save'); ?>
<table cellspacing="2" cellpadding="2" border="0">

<?php foreach($user->result() as $row): ?>
<tr><td>Name:</td><td><input type="hidden" name="id" value="<?php echo $row->id; ?>"/><input type="input" name="name" value="<?php echo $row->name; ?>"/></td></tr>
<tr><td>Email:</td><td><input type="input" name="email" value="<?php echo $row->email; ?>"/></td></tr>
<tr><td>Username:</td><td><input type="input" name="username" value="<?php echo $row->username; ?>"/></td></tr>
<tr><td>Password:</td><td><input type="input" name="password" value="<?php echo $row->password; ?>"/></td></tr>
<tr><td>Status:</td><td><input type="input" name="status" value="<?php echo $row->status; ?>"/></td></tr>
<?php endforeach; ?>

<tr><td></td><td><input type="submit" value="Save" /></td></tr>
</table>
<?php echo form_close(); ?>

</div>