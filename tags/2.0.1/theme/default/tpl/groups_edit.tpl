<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $theGroup->getLineNum(); ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editgroups']);?></th></tr>

<tr><td colspan="2">

<!-- Group Name -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top"><h6><?php echo ($lang['group']); ?>:</h6></td>
    <td valign="top"><input type="text" name="groupname" value="<?php echo $theGroup->getType(); ?>" size="40" /></td>
  </tr>


<!-- Image Name -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['imagename']);?>:</h6></td>
    <td valign="top">
    <select name="imagename">
	<?php foreach ($imagenames as $name): ?>
	    <?php if ($theGroup->getGroupImage() == $name): ?>
    		<option value="<?php echo $name; ?>" class="imagebacked_menu" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/menu_<?php echo $name; ?>_off.png);" selected><?php echo $name; ?></option>
    	<?php else: ?>
    		<option value="<?php echo $name; ?>" class="imagebacked_menu" style="background-image: url(<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/menu_<?php echo $name; ?>_off.png);"><?php echo $name; ?></option>
    	<?php endif; ?>
	<?php endforeach; ?>
	</select>
    </td>
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