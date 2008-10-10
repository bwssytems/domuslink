<?php $label; $code; $module; $type; $loc; ?>

<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $linenum; ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editalias']);?></th></tr>

<tr><td colspan="2">

<!-- Code -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top" width="60px"><h6><?php echo ($lang['code']); ?>:</h6></td>
    <td valign="top" width="150px"><input type="text" name="code" value="<?php echo $code; ?>" size="10" /></td>
  </tr>
</table>

<!-- Label -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top" width="60px"><h6><?php echo ($lang['label']);?>:</h6></td>
    <td valign="top" width="150px"><input type="text" name="label" value="<?php echo $label; ?>" size="20" /></td>
  </tr>
</table>

<!-- Modules -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top" width="60px"><h6><?php echo ($lang['module']);?>:</h6></td>
    <td valign="top" width="150px">
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
</table>

<!-- Type -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top" width="60px"><h6><?php echo ($lang['type']);?>:</h6></td>
    <td valign="top" width="150px">
    <select name="type">
    <?php foreach ($modtypes as $key => $typenf): ?>
    <?php $typef = rtrim($typenf); ?>
    	<?php if (rtrim($type) == $typef): ?>
    		<option value="<?php echo $typef; ?>" selected><?php echo $typef; ?></option>
    	<?php else: ?>
    		<option value="<?php echo $typef; ?>"><?php echo $typef; ?></option>
    	<?php endif; ?>
    <?php endforeach; ?>
    </td>
  </tr>
</table>

<!-- Location -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top" width="60px"><h6><?php echo ($lang['location']);?>:</h6></td>
    <td valign="top" width="150px">
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
<td style="border-right: none;" align="right"><input type="submit" value="<?php echo ($lang['save']); ?>" /></form></td>
<td style="border-left: none;"><form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"><input type="submit" value="<?php echo ($lang['cancel']); ?>" /></form></td>
</tr>
</table>