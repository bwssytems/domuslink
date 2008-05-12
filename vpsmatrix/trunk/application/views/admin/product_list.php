<div id="content">

<table cellspacing="0" cellpadding="0" border="0" class="admin_provider">
<?php foreach($query->result() as $row): ?>
<tr>
	<td width="120px"><?php echo anchor('admin/product_edit/'.$row->id, $row->reference); ?></td>
	<td><font size="-2"><?php echo anchor('admin/product_delete/'.$row->id, 'Remove'); ?></font></td>
</tr>
<?php endforeach; ?>
</table>

</div>
