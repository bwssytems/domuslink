<div id="content">
<h1><?php echo $name; ?></h1>

<table cellspacing="2" cellpadding="2" border="0">

<tr>
<td width="100" align="center"><b>Lang</b></td><td width="100" align="center"><b>Action</b></td>
</tr>
<?php foreach($assoc_langs->result() as $row): ?>
<tr>
<td align="center"><?php echo $row->int_name; ?></td><td align="center"><font size="-2"><?php echo anchor('admin/lang_unassociate/'.$row->ul_id.'/'.$this->uri->segment(3), 'Remove'); ?></font></td>
</tr>
<?php endforeach; ?>

</table>
<br />
<?php echo form_open('admin/lang_associate'); ?>
<input type="hidden" name="user_id" value="<?php echo $this->uri->segment(3); ?>"/>
<?php echo form_dropdown('lang_id', $avail_langs); ?></td>
<input type="submit" value="Add" /></td>
<?php echo form_close(); ?>

</div>