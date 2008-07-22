<div id="content">

<?php echo form_open('admin/lang_add'); ?>
<table cellspacing="2" cellpadding="2" border="0" align="center">
<tr><td align="center" colspan="2"><h2>Add Language</td></tr>
<tr><td>Original Name:</td><td><input type="input" name="org_name" /></td></tr>
<tr><td>English Name:</td><td><input type="input" name="int_name" /></td></tr>
<tr><td>Filename:</td><td><input type="input" name="filename" /></td></tr>

<tr><td></td><td><input type="submit" value="Add" /></td></tr>
</table>
<?php echo form_close(); ?>

<br />
</div>