<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.groupname.value == "") {
		alert( "The group name field is empty, please try again." );
		form.groupname.focus();
		return false ;
	}
	
	if (form.imagename.value == "") {
		alert( "The image name field is empty, please try again." );
		form.imagename.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['addgroups']); ?></th></tr>

<tr><td>

<!-- Group Name -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top"><h6><?php echo ($lang['group']); ?>:</h6></td>
    <td valign="top"><input type="text" name="groupname" value="" size="40" /></td>
  </tr>


<!-- Image Name -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['imagename']);?>:</h6></td>
    <td valign="top">
    <select name="imagename">
	<?php foreach ($imagenames as $name): ?>
		<option value="<?php echo $name;?>" class="imagebacked_menu" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/menu_<?php echo $name; ?>_off.png);"><?php echo $name;?></option>
	<?php endforeach; ?>
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