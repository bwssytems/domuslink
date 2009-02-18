<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.module.value == "") {
		alert( "No module has been selected, please try again." );
		form.module.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $linenum; ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['edittrigger']); ?></th></tr>
<tr><td colspan="2">

<!-- start center table -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
<td width="180px" align="center"><h6><?php echo ($lang['trig_cmd']);?>:</h6></td>
<td width="180px" align="center"><h6><?php echo ($lang['status']);?>:</h6></td>
</tr>
<tr>
<td align="center">
<!-- trigger command -->
<select name="command">
	<option value="on" <?php if ($tcommand == "on") echo "selected"; ?>><?php echo ($lang['on']);?></option>
	<option value="off" <?php if ($tcommand == "off") echo "selected"; ?>><?php echo ($lang['off']);?></option>
</select>
<!-- end trigger command -->
</td>
<td align="center">
<!-- status -->
<select name="status">
 	<option value="" <?php if ($enabled) echo "selected"; ?>><?php echo ($lang['enabled']);?></option>
 	<option value="#" <?php if (!$enabled) echo "selected"; ?>><?php echo ($lang['disabled']);?></option>
</select>
<!-- end status -->
</td>
</tr>
<tr>
<td align="center"><h6><?php echo ($lang['trig_unit']);?>:</h6></td>
<td align="center"><h6><?php echo ($lang['execute']);?>:</h6></td>
</tr>
<tr>
<td align="center">
<!-- trigger unit -->
<select name="unit" size="9">
<?php foreach ($codelabels as $codelabel): ?>
	<?php list($code, $label) = split("@", $codelabel, 2); ?>
	<?php if (!is_multi_alias($code)): ?>
		<option value="<?php echo $label;?>" <?php if ($unit == $label) echo "selected"; ?>><?php echo label_parse($label, false);?></option>
	<?php endif; ?>
<?php endforeach; ?>
</select>
<!-- end trigger unit -->
</td>
<td align="center">
<!-- execute macro -->
<select name="macro" size="9">
<?php foreach ($cmacs as $cmac): ?>
	<?php list($alias, $cmd, $trans) = split("@", $cmac, 3); ?>
	<option value="<?php echo $alias;?>_<?php echo $cmd;?>" <?php if (trim($selmacro) == $alias."_".$cmd) echo "selected"; ?>><?php echo label_parse($alias, false);?> <?php echo strtoupper($trans);?></option>
<?php endforeach; ?>
</select>
<!-- end execute macro -->
</td>
</tr>
</table>
<!-- end center table -->

</td></tr>
<tr>
<td style="border-right: none;" align="right"><input type="submit" value="<?php echo ($lang['save']);?>" /></form></td>
<td style="border-left: none;"><form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"><input type="submit" value="<?php echo ($lang['cancel']); ?>" /></form></td>
</tr>
</table>
