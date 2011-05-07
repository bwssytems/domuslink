<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.code.value == "") {
		alert( "The code field is empty, please try again." );
		form.code.focus();
		return false ;
	}
	
	if (form.label.value == "") {
		alert( "The label field is empty, please try again." );
		form.label.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['adduser']); ?></th></tr>

<tr><td>

<!-- Type -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top"><h6><?php echo ($lang['type']); ?>:</h6></td>
    <td valign="top">
    <select name="type">
		<option value="pin"><?php echo $lang['usertypepin'];?></option>
		<option value="user"><?php echo $lang['usertypeuser'];?></option>
	</select>
    </td>
  </tr>


<!-- Username -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['username']);?>:</h6></td>
    <td valign="top"><input type="text" name="username" value="" size="20" /></td>
  </tr>


<!-- Password -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['password']);?>:</h6></td>
    <td valign="top"><input type="password" name="password" value="" size="20" /></td>
  </tr>


<!-- Security Level -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['seclevel']);?>:</h6></td>
    <td valign="top"><input type="text" name="seclevel" value="" size="20" /></td>
  </tr>

<!-- Security Level Type -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['secleveltype']);?>:</h6></td>
    <td valign="top">
    <select name="secleveltype">
		<option value="exact"><?php echo $lang['secleveltypeexact'];?></option>
		<option value="greater"><?php echo $lang['secleveltypegreater'];?></option>
	</select>
    </td>
  </tr>

</table>

</td></tr>

<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['add']);?>" />
</td>
</tr>
</table>

</form>