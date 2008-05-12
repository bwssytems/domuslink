<div id="content">

<?php echo form_open('admin/provider_db_insert'); ?>
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>Provider name:</td><td><input type="text" name="name" value="" maxlength="500" size="25"  /></td>
</tr>
<tr>
<td>Country:</td><td><?php echo form_dropdown('country_id', $options, '2'); ?></td>
</tr>
<tr>
<td>URL:</td><td><input type="text" name="url" value="" maxlength="128" size="25"  /></td>
</tr>
<tr>
<td></td><td><input type="submit" value="Submit" /></td>
</tr>
</table>
<?php echo form_close(); ?>

</div>