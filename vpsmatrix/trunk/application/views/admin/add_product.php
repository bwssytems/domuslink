<div id="content">

<?php echo form_open('admin/product_db_insert'); ?>
<input type="hidden" name="provider_id" value="<?php echo $provider_id; ?>"  />
<table cellspacing="0" cellpadding="0" border="0">
<tr><td>Reference:</td><td><input type="text" name="reference" value="" maxlength="128" size="25" /></td></tr>
<tr><td>HD:</td><td><input type="text" name="hd" value="" maxlength="32" size="25" /></td></tr>
<tr><td>Bandwidth:</td><td><input type="text" name="bandwidth" value="" maxlength="32" size="25" /></td></tr>
<tr><td>RAM:</td><td><input type="text" name="ram" value="" maxlength="32" size="25" /></td></tr>
<tr><td>PC/CPU:</td><td><input type="text" name="pc" value="" maxlength="255" size="25" /></td></tr>
<tr><td>OS(s):</td><td><input type="text" name="os" value="" maxlength="255" size="25" /></td></tr>
<tr><td>IPs:</td><td><input type="text" name="pc" value="" maxlength="2" size="25" /></td></tr>
<tr><td>Domains:</td><td><input type="text" name="pc" value="" maxlength="2" size="25" /></td></tr>
<tr><td>Backup:</td><td><input type="text" name="backup" value="" maxlength="64" size="25" /></td></tr>
<tr><td>Ctrl Panel:</td><td><input type="text" name="pc" value="" maxlength="255" size="25" /></td></tr>
<tr><td>DNS:</td><td><input type="text" name="pc" value="" maxlength="128" size="25" /></td></tr>
<tr><td>Currency:</td><td><?php echo form_dropdown('currency_id', $options, '1'); ?></td></tr>
<tr><td>Setup Fee:</td><td><input type="text" name="setup_fee" value="" maxlength="10" size="25" /></td></tr>
<tr><td>Monthly Fee:</td><td><input type="text" name="monthly_fee" value="" maxlength="10" size="25" /></td></tr>
<tr><td>Yearly Fee:</td><td><input type="text" name="yearly_fee" value="" maxlength="10" size="25" /></td></tr>
<tr><td>Add Date:</td><td><input type="text" name="add_date" value="" maxlength="255" size="25" /></td></tr>
<tr><td>User:</td><td><input type="text" name="chg_who" value="" maxlength="255" size="25" /></td></tr>
<tr><td>Notes:</td><td><input type="text" name="notes" value="" maxlength="255" size="25" /></td></tr>
<tr><td></td><td><input type="submit" value="Submit" /></td></tr>
</table>
<?php echo form_close(); ?>

</div>