<table cellspacing="0" cellpadding="0" border="0" width="600px" align="center" class="content">
<tr><th><?php echo ($lang['error']); ?></th></tr>

<tr><td>

<?php foreach ($errormsgs as $msg): ?>
<?php echo $msg; ?><br />
<?php endforeach; ?>

</td></tr>
</table>