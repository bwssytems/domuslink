<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $theScene->getLineNum(); ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editscene']);?></th></tr>

<tr><td colspan="2">

<!-- Label -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['label']);?>:</h6></td>
    <td valign="top"><input type="text" name="label" value="<?php echo $theScene->getLabel(); ?>" size="20" /></td>
  </tr>

<!-- Commands -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['commands']);?>:</h6></td>
    <td valign="top"><input type="text" name="commands" value="<?php echo $theScene->getCommands(); ?>" size="100" /></td>
  </tr>

<!-- Location -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['location']);?>:</h6></td>
    <td valign="top">
    <select name="loc">
	<?php foreach ($floorplan as $locnf): ?>
	<?php $locf = rtrim($locnf); ?>
	    <?php if ($theScene->getAliasMap()->getFloorPlanLabel() == $locf): ?>
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
	    <?php if ($theScene->getAliasMap()->getGroup() == $group->getType()): ?>
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
    <td valign="top"><input type="text" name="secaccesslevel" value="<?php echo strval($theScene->getAliasMap()->getAccessLevel()); ?>" size="4" /></td>
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