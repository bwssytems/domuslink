<SCRIPT LANGUAGE="JavaScript">
InstantiateProgressBar("<?php echo $lang['progress']; ?>");
</script>

<table cellspacing="0" cellpadding="0" border="0" align="center" class="content" width="550px">
<tr>
<th width="275px"><?php echo ($lang['upload']); ?></th>
<th width="275px"><?php echo ($lang['erase']); ?></th>
</tr>

<tr>
<td valign="top" style="padding: 4px;" <?php if ($type == "upload"): ?> rowspan="2" <?php endif; ?>>
<?php if ($type != "upload"): ?>
	<?php echo($lang['upload_txt']); ?>
<?php else: ?>
	<h3><?php echo ($lang["uploadsuccess"]); ?></h3><?php echo($lang["upload_erase_log_txt"]); ?>
<?php endif; ?>
<br /><br />
</td>
<td style="border-left:none; padding: 4px;" valign="top" <?php if ($type == "erase"): ?> rowspan="2" <?php endif; ?>>
<?php if ($type != "erase"): ?>
	<?php echo($lang['erase_txt']); ?>
<?php else: ?>
	<h3><?php echo ($lang["erasesuccess"]); ?></h3><?php echo($lang["upload_erase_log_txt"]); ?>
<?php endif; ?>
<br /><br />
</td>
</tr>

<tr>
<?php if ($type != "upload"): ?>
<td align="center" style="padding: 4px;">
<form name="upload" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>?action=upload">
<input type="submit" value="<?php echo($lang['upload']); ?>" onclick="CallJS('DisplayProgressBar()')" />
</form>
</td>
<?php endif; ?>
<?php if ($type != "erase"): ?>
<td align="center" style="border-left:none; padding: 4px;">
<form name="erase" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>?action=erase">
<input type="submit" value="<?php echo($lang['erase']); ?>" onclick="CallJS('DisplayProgressBar()')" />
</form>
</td>
<?php endif; ?>
</tr>

<tr><td align="center" colspan="2" style="font-size: 9px; font-style: italic;"><?php echo($lang['upload_erase_txt']); ?></td></tr>
</table>

<div id="log" style="display:none">
<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['log']); ?></th></tr>

<tr><td>

<?php 
if (isset($out) && is_array($out)):
foreach ($out as $line): 
if (substr($line, 0, 5) == "....."):
$line = "################################################################";
endif; ?>
<?php echo trim($line); ?><br />
<?php endforeach; ?>
<?php endif; ?>

</td></tr>
</table>
</div>
