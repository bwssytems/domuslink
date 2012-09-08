<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.commands.value == "") {
		alert( "The commands field is empty, please try again." );
		form.commands.focus();
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
<tr><th><?php echo ($lang['addscene']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<!-- Label -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['label']);?>:</h6></td>
    <td valign="top"><input type="text" name="label" value="" size="20" /></td>
  </tr>

<!-- Commands -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['commands']);?>:</h6></td>
    <td valign="top"><input type="text" name="commands" value="" size="100" /></td>
  </tr>

<!-- Location -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['location']);?>:</h6></td>
    <td valign="top">
    <select name="loc">
	<?php foreach ($floorplan as $locnf): ?>
	<?php $locf = rtrim($locnf); ?>
		<option value="<?php echo $locf;?>"><?php echo $locf;?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>

  <tr>
    <td colspan="2" align="center"><h6><?php echo ($lang['OR']); ?></h6></td>
  </tr>

  <tr>
    <td valign="top"><h6><?php echo ($lang['newloc']); ?>:</h6></td>
    <td valign="top"><input type="text" name="newloc" value="" size="20" /></td>
  </tr>

<!-- Group -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['group']);?>:</h6></td>
    <td valign="top">
    <select name="group">
	<?php foreach ($groups as $group): ?>
		<option value="<?php echo $group->getType();?>" class="imagebacked_menu" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/menu_<?php echo $group->getGroupImage(); ?>_off.png);"><?php echo $group->getType();?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>

<!-- Security Access Level -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['seclevel']);?>:</h6></td>
    <td valign="top"><input type="text" name="secaccesslevel" value="" size="4" /></td>
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