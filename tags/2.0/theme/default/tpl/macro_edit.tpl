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
<input type="hidden" name="line" value="<?php echo $theMacro->getlineNum(); ?>" / >


<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['editmacro']); ?></th></tr>
<tr>
<td>

<!-- start center table -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<!-- status -->
<tr>
<td align="left"><h6><?php echo ($lang['status']);?>:</h6></td>
<td align="left">
<select name="status">
 	<option value="" <?php if ($theMacro->isEnabled()) echo "selected"; ?>><?php echo ($lang['enabled']);?></option>
 	<option value="#" <?php if (!$theMacro->isEnabled()) echo "selected"; ?>><?php echo ($lang['disabled']);?></option>
</select>
</td>
</tr>
<!-- label -->
<tr>
<td align="left"><h6><?php echo ($lang['label']);?>:</h6></td>
<td align="left">
<input size="50" type="text" name="macro_name" value="<?php echo $theMacro->getLabel()?>" />
</td>
</tr>
<!-- command -->
<tr>
<td align="left"><h6><?php echo ($lang['execute']);?>:</h6></td>
<td align="left">
<input size="100" type="text" name="macro_command" value="<?php echo $theMacro->getCommand()?>" />
</td>
</tr>
</table>


</td>
</tr>
<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['save']);?>" />
<input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
</td>
</tr>
</table>
</form>