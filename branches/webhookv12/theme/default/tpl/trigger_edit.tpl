<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $linenum; ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['edittrigger']); ?></th></tr>
<tr><td colspan="2">

<!-- start center table -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
<td align="center"><h6><?php echo ($lang['trig_cmd']);?>:</h6></td>
<td style="width:10px"></td>
<td align="center"><h6><?php echo ($lang['status']);?>:</h6></td>
</tr>
<tr>
<td align="center">
<!-- trigger command -->
<select name="command" style="width:50px;">
	<option value="on" <?php if ($tcommand == "on") echo "selected"; ?>><?php echo ($lang['on']);?></option>
	<option value="off" <?php if ($tcommand == "off") echo "selected"; ?>><?php echo ($lang['off']);?></option>
</select>
<!-- end trigger command -->
</td>
<td>&nbsp;</td>
<td align="center">
<!-- status -->
<select name="status" style="width:75px;">
 	<option value="" <?php if ($enabled) echo "selected"; ?>><?php echo ($lang['enabled']);?></option>
 	<option value="#" <?php if (!$enabled) echo "selected"; ?>><?php echo ($lang['disabled']);?></option>
</select>
<!-- end status -->
</td>
</tr>
<tr>
<td align="center"><h6><?php echo ($lang['trig_unit']);?>:</h6></td>
<td>&nbsp;</td>
<td align="center"><h6><?php echo ($lang['execute']);?>:</h6></td>
</tr>
<tr>
<td align="center">
<!-- trigger unit -->
<select name="unit" size="9">
<?php foreach ($aliases as $alias): ?>
	<?php if (!$alias->isMultiAlias()): ?>
		<option value="<?php echo $alias->getLabel();?>" <?php if ($unit == $alias->getLabel()) echo "selected"; ?>><?php echo label_parse($alias->getLabel(), false);?></option>
	<?php endif; ?>
<?php endforeach; ?>
</select>
<!-- end trigger unit -->
</td>
<td>&nbsp;</td>
<td align="center" style="width:200px;">
<!-- execute macro -->
<select name="macro" size="9">
<?php foreach ($cmacs as $cmac): ?>
	<?php list($macro_label, $macro_name, $delay, $commands) = explode(" ", $cmac, 4); ?>
	<option value="<?php echo $macro_name;?>" <?php if (trim($selmacro) == $macro_name) echo "selected"; ?>><?php echo label_parse($macro_name, false);?> - <?php echo $commands;?></option>
<?php endforeach; ?>
</select>
<!-- end execute macro -->
</td>
</tr>
</table>
<!-- end center table -->

</td></tr>
<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['save']);?>" />
<input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
</td>
</tr>
</table>
</form>