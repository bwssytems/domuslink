<div id="content">

<?php echo form_open('admin/lang_save'); ?>
<table cellspacing="2" cellpadding="2" border="0" align="center">
<tr><td align="center" colspan="2"><h2>Language Edit</td></tr>
<?php foreach($language->result() as $row): ?>
<tr><td>Original Name:</td><td><input type="hidden" name="id" value="<?php echo $row->id; ?>"/><input type="input" name="org_name" value="<?php echo $row->org_name; ?>"/></td></tr>
<tr><td>English Name:</td><td><input type="input" name="int_name" value="<?php echo $row->int_name; ?>"/></td></tr>
<tr><td>Filename:</td><td><input type="input" name="filename" value="<?php echo $row->filename; ?>"/></td></tr>
<?php endforeach; ?>

<tr><td></td><td><input type="submit" value="Save" /></td></tr>
</table>
<?php echo form_close(); ?>

<br />
</div>