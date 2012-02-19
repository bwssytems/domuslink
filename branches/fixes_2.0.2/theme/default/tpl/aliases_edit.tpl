<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $theAlias->getLineNum(); ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editalias']);?></th></tr>

<tr><td colspan="2">

<!-- Code -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top"><h6><?php echo ($lang['code']); ?>:</h6></td>
    <td valign="top"><input type="text" name="code" value="<?php echo $theAlias->getHouseDevice(); ?>" size="10" /></td>
  </tr>


<!-- Label -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['label']);?>:</h6></td>
    <td valign="top"><input type="text" name="label" value="<?php echo $theAlias->getLabel(); ?>" size="20" /></td>
  </tr>


<!-- Modules -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['module']);?>:</h6></td>
    <td valign="top">
    <select name="module">
    <?php foreach ($modlist as $modulenf): ?>
    <?php $modulef = rtrim($modulenf); ?>
    	<?php if ($theAlias->getModuleType() == $modulef): ?>
    		<option value="<?php echo $modulef; ?>" selected><?php echo $modulef; ?></option>
    	<?php else: ?>
    		<option value="<?php echo $modulef; ?>"><?php echo $modulef; ?></option>
    	<?php endif; ?>
    <?php endforeach; ?>
	</select>
    </td>
  </tr>

<!-- Module Options -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['option']);?>:</h6></td>
    <td valign="top"><input type="text" name="moduleopts" value="<?php echo $theAlias->getModuleOptions(); ?>" size="20" /></td>
  </tr>

<!-- Type -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['type']);?>:</h6></td>
    <td valign="top">
    <select name="type">
    <?php foreach ($modtypes as $module): ?>
    	<?php if ($theAlias->getAliasMap()->getType() == $module->getType()): ?>
    		<option value="<?php echo $module->getType(); ?>" class="imagebacked_mod" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_<?php echo $module->getModuleImage(); ?>_off.png);" selected><?php echo $module->getType(); ?></option>
    	<?php else: ?>
    		<option value="<?php echo $module->getType(); ?>" class="imagebacked_mod" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_<?php echo $module->getModuleImage(); ?>_off.png);"><?php echo $module->getType(); ?></option>
    	<?php endif; ?>
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
	    <?php if ($theAlias->getAliasMap()->getFloorPlanLabel() == $locf): ?>
    		<option value="<?php echo $locf; ?>" selected><?php echo $locf; ?></option>
    	<?php else: ?>
    		<option value="<?php echo $locf; ?>"><?php echo $locf; ?></option>
    	<?php endif; ?>
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
	    <?php if ($theAlias->getAliasMap()->getGroup() == $group->getType()): ?>
    		<option value="<?php echo $group->getType(); ?>" class="imagebacked_menu" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/menu_<?php echo $group->getGroupImage(); ?>_off.png);" selected><?php echo $group->getType(); ?></option>
    	<?php else: ?>
    		<option value="<?php echo $group->getType(); ?>" class="imagebacked_menu" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/menu_<?php echo $group->getGroupImage(); ?>_off.png);"><?php echo $group->getType(); ?></option>
    	<?php endif; ?>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>

<!-- Security Access Level -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['seclevel']);?>:</h6></td>
    <td valign="top"><input type="text" name="secaccesslevel" value="<?php echo strval($theAlias->getAliasMap()->getAccessLevel()); ?>" size="4" /></td>
  </tr>
</table>

</td></tr>

<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['save']); ?>" />
<input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
</td>
</tr>
</table>
</form>