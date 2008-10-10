<h1><?php echo ($lang['editalias']);?></h1>

<?php list($alias, $label, $code, $module_type) = split(" ", $alias, 4); ?>
<?php list($module, $type) = split(" # ", $module_type, 2); ?>
<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $linenum; ?>" / >

<!-- Code -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['code']);?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="code" value="<?php echo $code; ?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['code_txt']); ?></td>
  </tr>
</table>
<!-- Label -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['label']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="label" value="<?php echo $label; ?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['label_txt']); ?></td>
  </tr>
</table>
<!-- Module -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['module']); ?></h2></td>
  </tr>
  <tr>
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
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['module_txt']);?></td>
  </tr>
</table>
<!-- Type -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['type']);?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <select name="type">
    <?php foreach (load_file(TYPE_FILE_LOCATION) as $typenf): ?>
    <?php $typef = rtrim($typenf); ?>
    	<?php if (rtrim($type) == $typef): ?>
    		<option value="<?php echo $typef; ?>" selected><?php echo $typef; ?></option>
    	<?php else: ?>
    		<option value="<?php echo $typef; ?>"><?php echo $typef; ?></option>
    	<?php endif; ?>
    <?php endforeach; ?>
	</select>
    </td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['type_txt']); ?></td>
  </tr>
</table>

<table cellspacing="0" cellpadding="0" border="0" class="tb_buttons">
  <tr>
    <td><input type="submit" value="<?php echo ($lang['save']); ?>" /></form></td>
    <td><form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"><input type="submit" value="<?php echo ($lang['cancel']); ?>" /></form></td>
  </tr>
</table>