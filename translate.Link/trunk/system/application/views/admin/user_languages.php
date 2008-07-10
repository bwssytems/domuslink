<div id="content">

<br />
<table cellspacing="0" cellpadding="4" border="0" align="center">
<tr><td align="center"><h1><?php echo $name; ?></h1></td></tr>
<tr><td align="center">

<table cellspacing="0" cellpadding="4" border="0" align="center">
<tr>
<td><b>Lang</b></td><td><b>Action</b></td>
</tr>
<?php foreach($assoc_langs->result() as $row): ?>
<tr class="row">
<td><?php echo $row->int_name; ?></td><td align="center"><font size="-2"><?php echo anchor('admin/lang_unassociate/'.$row->ul_id.'/'.$this->uri->segment(3), 'Remove'); ?></font></td>
</tr>
<?php endforeach; ?>
<tr><td colspan="2"><?php echo form_open('admin/lang_associate'); ?>
<input type="hidden" name="user_id" value="<?php echo $this->uri->segment(3); ?>"/>
<?php echo form_dropdown('lang_id', $avail_langs); ?>&nbsp;<input type="submit" value="Add" />
<?php echo form_close(); ?></td></tr>

</table>

</td></tr>
</table>

<br />

</div>