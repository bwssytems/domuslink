<div id="content">

<table cellspacing="0" cellpadding="3" border="1" style="font-size:10px">

<tr>
<th>Username</th>
<th>Action</th>
<th>Language</th>
<th>Date</th>
</tr>
<?php foreach($logs->result() as $log): ?>
<tr>
<td align="center"><?php echo $log->username; ?></td>
<td align="center"><?php echo $log->action; ?></td>
<td align="center"><?php echo $log->language; ?></td>
<td align="center"><?php echo $log->date; ?></td>
</tr>
<?php endforeach; ?>

</table>
<br />
<?php echo anchor('admin/clear_logs/', 'Clear Logs'); ?>
</div>