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
<tr><th><?php echo ($lang['addalias']); ?></th></tr>

<tr><td>

<!-- Code -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top"><h6><?php echo ($lang['code']); ?>:</h6></td>
    <td valign="top"><input type="text" name="code" value="" size="10" /></td>
  </tr>


<!-- Label -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['label']);?>:</h6></td>
    <td valign="top"><input type="text" name="label" value="" size="20" /></td>
  </tr>


<!-- Modules -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['module']);?>:</h6></td>
    <td valign="top">
    <select name="module">
	<?php foreach ($modlist as $modulenf): ?>
 	<?php $modulef = rtrim($modulenf); ?>
 		<option value="<?php echo $modulef;?>"><?php echo $modulef;?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>


<!-- Module Options -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['option']);?>:</h6></td>
    <td valign="top"><input type="text" name="moduleopts" value="" size="20" /></td>
  </tr>

<!-- Type -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['type']);?>:</h6></td>
    <td valign="top">
    <select name="type">
	<?php foreach ($modtypes as $module): ?>
		<option value="<?php echo $module->getType();?>" class="imagebacked_mod" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_<?php echo $module->getModuleImage(); ?>_off.png);"><?php echo $module->getType();?></option>
	<?php endforeach; ?>
	</select>
    </td>
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