<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.macro_name.value == "") {
		alert( "No Macro Name has been selected, please try again." );
		form.macro_name.focus();
		return false ;
	}

	if (form.macro_command.value == "") {
		alert( "No Macro Command has been selected, please try again." );
		form.macro_command.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['addmacro']); ?></th></tr>
<tr><td>

<!-- start center table -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<!-- status -->
<tr>
<td align="left"><h6><?php echo ($lang['status']);?>:</h6></td>
<td align="left">
<select name="status">
	<option value="" selected><?php echo ($lang['enabled']);?></option>
	<option value="#"><?php echo ($lang['disabled']);?></option>
</select>
</td>
</tr>
<tr>
<td align="left"><h6><?php echo ($lang['label']);?>:</h6></td>
<td align="left">
<input size="50" type="text" name="macro_name" value="" />
</td>
</tr>
<tr>
<td align="left"><h6><?php echo ($lang['execute']);?>:</h6></td>
<td align="left">
<input size="100" type="text" name="macro_command" value="" />
</td>
</tr>
</table>


</td></tr>
<tr><td align="center"><input type="submit" value="<?php echo ($lang['add']);?>" /></td></tr>
</table>

</form>
