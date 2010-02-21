<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.location.value == "") {
		alert( "The field is empty, please try again." );
		form.location.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" width="200px" class="content">
<tr><th><?php echo ($lang['addlocation']); ?></th></tr>

<tr><td align="center">

<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td align="center"><h6><?php echo ($lang['location']); ?>:</h6></td></tr>
  <tr><td align="center" width="150px"><input type="text" name="location" value="" size="25" /></td></tr>
</table>

</td></tr>

<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['add']);?>" />
</td>
</tr>
</table>

</form>