<div id="content">

<br />
<table cellspacing="0" cellpadding="4" border="0" align="center">

<tr><td width="140"><b>Original Name</b></td><td width="140"><b>English Name</b></td><td width="120"><b>Filename</b></td><td align="center" width="100"><b>Actions</b></td></tr>

<?php foreach($languages->result() as $row): ?>
<tr class="row"><td><?php echo $row->org_name; ?></td><td><?php echo $row->int_name; ?></td><td><?php echo $row->filename; ?></td><td align="center"><font size="-2"><?php echo anchor('admin/lang_edit/'.$row->id, 'Edit'); ?>  / <?php echo anchor('admin/lang_remove/'.$row->id, 'Remove'); ?></font></td></tr>
<?php endforeach; ?>

</table>
<br />

</div>