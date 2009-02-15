<!--
<?php echo $msg; ?>
<div id="uplog" style="<?php echo $divstate; ?>">
<br /><br />

</div>
-->

<table cellspacing="0" cellpadding="0" border="0" align="middle" class="content" width="550px">
<tr>
<th width="275px"><?php echo ($lang['upload']); ?></th>
<th width="275px"><?php echo ($lang['erase']); ?></th>
</tr>

<tr>
<td valign="top" style="padding: 4px;"><?php echo($lang['upload_txt']); ?><br /><br /></td>
<td style="border-left:none; padding: 4px;" valign="top">
<?php if ($type == "erase"): ?>
	<?php echo($lang['erase_txt']); ?>
<?php else: ?>
	<?php echo($lang['erase_txt']); ?>
<?php endif; ?>
<br /><br />
</td>
</tr>

<tr>
<td align="center" style="padding: 4px;">
<form name="upload" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>?action=upload">
<input type="submit" value="<?php echo($lang['upload']); ?>" onclick="CallJS('Demo()')" />
</form>
</td>
<td align="center" style="border-left:none; padding: 4px;">
<form name="erase" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>?action=erase">
<input type="submit" value="<?php echo($lang['erase']); ?>" onclick="CallJS('Demo()')" />
</form>
</td>
</tr>

<tr><td align="center" colspan="2" style="font-size: 9px; font-style: italic;"><?php echo($lang['upload_erase_txt']); ?></td></tr>
</table>

<div id="log" style="display:none">
<table cellspacing="0" cellpadding="0" border="0" align="middle" class="content">
<tr><th><?php echo $log; ?></th></tr>

<tr><td>

<?php 
foreach ($out as $line): 
if (substr($line, 0, 5) == "....."):
$line = "################################################################"; 
//$line = ""; 
endif; ?>
<?php echo trim($line); ?><br />
<?php endforeach; ?>

</td></tr>
</table>
</div>