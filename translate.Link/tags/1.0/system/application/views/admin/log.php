<div id="content">

<table cellspacing="0" cellpadding="3" border="1" style="font-size:10px">

<tr>
<th>Name</th>
<th>Action</th>
<th>Language</th>
<th>Date</th>
</tr>
<?php foreach($logs->result() as $log): ?>
<tr>
<td align="center"><?php echo $log->name; ?></td>
<td align="center"><?php echo $log->action; ?></td>
<td align="center"><?php echo $log->lang_id; ?></td>
<td align="center"><?php echo $log->date; ?></td>
</tr>
<?php endforeach; ?>

</table>
<br />
<?php echo anchor('admin/clear_logs/', 'Clear Logs'); ?>
</div>