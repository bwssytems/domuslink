<div id="content">

<table cellspacing="2" cellpadding="2" border="0">

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