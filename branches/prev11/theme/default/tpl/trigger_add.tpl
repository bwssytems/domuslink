<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.unit.value == "") {
		alert( "No unit has been selected, please try again." );
		form.unit.focus();
		return false ;
	}

	if (form.macro.value == "") {
		alert( "No macro has been selected, please try again." );
		form.macro.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['addtrigger']); ?></th></tr>
<tr><td>

<!-- start center table -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
<td align="center"><h6><?php echo ($lang['trig_cmd']);?>:</h6></td>
<td style="width:10px;"></td>
<td align="center"><h6><?php echo ($lang['status']);?>:</h6></td>
</tr>
<tr>
<td align="center">
<!-- trigger command -->
<select name="command">
	<option value="on" selected><?php echo ($lang['on']);?></option>
	<option value="off"><?php echo ($lang['off']);?></option>
</select>
<!-- end trigger command -->
</td>
<td>&nbsp;</td>
<td align="center">
<!-- status -->
<select name="status">
	<option value="" selected><?php echo ($lang['enabled']);?></option>
	<option value="#"><?php echo ($lang['disabled']);?></option>
</select>
<!-- end status -->
</td>
</tr>
<tr>
<td align="center"><h6><?php echo ($lang['trig_unit']);?>:</h6></td>
<td>&nbsp;</td>
<td align="center"><h6><?php echo ($lang['macro']);?>:</h6></td>
</tr>
<tr>
<td align="center">
<!-- trigger unit -->
<select name="unit" size="9">
<?php foreach ($codelabels as $codelabel): ?>
	<?php list($code, $label) = explode("@", $codelabel, 2); ?>
	<?php if (!is_multi_alias($code)): ?>
		<option value="<?php echo $label;?>"><?php echo label_parse($label, false);?></option>
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
	<option value="<?php echo $macro_name;?>"><?php echo label_parse($macro_name, false);?> - <?php echo $commands;?></option>
<?php endforeach; ?>
</select>
<!-- end execute macro -->
</td>
</tr>
</table>
<!-- end center table -->

</td></tr>
<tr><td align="center"><input type="submit" value="<?php echo ($lang['add']);?>" /></td></tr>
</table>

</form>
