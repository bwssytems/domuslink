<?php $label; $code; $module; $type; $loc; ?>

<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $linenum; ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editalias']);?></th></tr>

<tr><td colspan="2">

<!-- Code -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top"><h6><?php echo ($lang['code']); ?>:</h6></td>
    <td valign="top"><input type="text" name="code" value="<?php echo $code; ?>" size="10" /></td>
  </tr>


<!-- Label -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['label']);?>:</h6></td>
    <td valign="top"><input type="text" name="label" value="<?php echo label_parse($label); ?>" size="20" /></td>
  </tr>


<!-- Modules -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['module']);?>:</h6></td>
    <td valign="top">
    <select name="module">
    <?php foreach (load_file(MODULE_FILE_LOCATION) as $modulenf): ?>
    <?php $modulef = rtrim($modulenf); ?>
    	<?php if ($module == $modulef): ?>
    		<option value="<?php echo $modulef; ?>" selected><?php echo $modulef; ?></option>
    	<?php else: ?>
    		<option value="<?php echo $modulef; ?>"><?php echo $modulef; ?></option>
    	<?php endif; ?>
    <?php endforeach; ?>
	</select>
    </td>
  </tr>


<!-- Type -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['type']);?>:</h6></td>
    <td valign="top">
    <select name="type">
    <?php foreach ($modtypes as $key => $typenf): ?>
    <?php $typef = rtrim($typenf); ?>
    	<?php if (rtrim($type) == $typef): ?>
    		<option value="<?php echo $typef; ?>" selected><?php echo $typef; ?></option>
    	<?php else: ?>
    		<option value="<?php echo $typef; ?>"><?php echo $typef; ?></option>
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
	<?php foreach (load_file(FPLAN_FILE_LOCATION) as $locnf): ?>
	<?php $locf = rtrim($locnf); ?>
	    <?php if (rtrim($loc) == $locf): ?>
    		<option value="<?php echo $locf; ?>" selected><?php echo $locf; ?></option>
    	<?php else: ?>
    		<option value="<?php echo $locf; ?>"><?php echo $locf; ?></option>
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