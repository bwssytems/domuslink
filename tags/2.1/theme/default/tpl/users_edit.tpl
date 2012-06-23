<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $theUser->getLineNum(); ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editalias']);?></th></tr>

<tr><td colspan="2">

<!-- Type -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top"><h6><?php echo ($lang['type']); ?>:</h6></td>
    <td valign="top">
    <select name="type">
    	<?php $typef = rtrim($theUser->getType()); ?>
    	<?php if ("pin" == $typef): ?>
    		<option value="<?php echo $typef; ?>" selected><?php echo $lang['usertypepin']; ?></option>
    	<?php else: ?>
    		<option value="pin"><?php echo $lang['usertypepin']; ?></option>
    	<?php endif; ?>
    	<?php if ("user" == $typef): ?>
    		<option value="<?php echo $typef; ?>" selected><?php echo $lang['usertypeuser']; ?></option>
    	<?php else: ?>
    		<option value="user"><?php echo $$lang['usertypeuser']; ?></option>
    	<?php endif; ?>
    </select>
    </td>
  </tr>


<!-- Username -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['username']);?>:</h6></td>
    <td valign="top"><input type="text" name="username" value="<?php echo $theUser->getUserName(); ?>" size="20" /></td>
  </tr>


<!-- Password -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['password']);?>:</h6></td>
    <td valign="top"><input type="password" name="password" value="<?php echo $theUser->getPassword(); ?>" size="20" /></td>
  </tr>

<!-- Security Level -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['seclevel']);?>:</h6></td>
    <td valign="top"><input type="text" name="seclevel" value="<?php echo strval($theUser->getSecurityLevel()); ?>" size="20" /></td>
  </tr>

<!-- Security Level Type -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['secleveltype']);?>:</h6></td>
    <td valign="top">
    <select name="secleveltype">
	    <?php $typef = trim($theUser->getSecurityLevelType()); ?>
    	<?php if ("exact" == $typef): ?>
    		<option value="<?php echo $typef; ?>" selected><?php echo $lang['secleveltypeexact']; ?></option>
    	<?php else: ?>
    		<option value="exact"><?php echo $lang['secleveltypeexact']; ?></option>
    	<?php endif; ?>
    	<?php if ("greater" == $typef): ?>
    		<option value="<?php echo $typef; ?>" selected><?php echo $lang['secleveltypegreater']; ?></option>
    	<?php else: ?>
    		<option value="greater"><?php echo $lang['secleveltypegreater']; ?></option>
    	<?php endif; ?>
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