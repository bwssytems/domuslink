<h1><?=$lang['editalias'];?></h1>

<?php list($alias, $label, $code, $module_type) = split(" ", $alias, 4); ?>
<?php list($module, $type) = split(" # ", $module_type, 2); ?>
<form action="<?=$_SERVER['PHP_SELF'];?>?action=save" method="post">
<input type="hidden" name="line" value="<?=$linenum;?>" / >

<!-- Code -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['code'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="code" value="<?=$code;?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['code_txt'];?></td>
  </tr>
</table>
<!-- Label -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['label'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="label" value="<?=$label;?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['label_txt'];?></td>
  </tr>
</table>
<!-- Module -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['module'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <select name="module">
    <? foreach (load_file(MODULE_FILE_LOCATION) as $modulenf): ?>
    <? $modulef = rtrim($modulenf); ?>
    	<? if ($module == $modulef): ?>
    		<option value="<?=$modulef;?>" selected><?=$modulef;?></option>
    	<? else: ?>
    		<option value="<?=$modulef;?>"><?=$modulef;?></option>
    	<? endif; ?>
    <? endforeach; ?>
	</select>
    </td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['module_txt'];?></td>
  </tr>
</table>
<!-- Type -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['type'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <select name="type">
    <? foreach (load_file(TYPE_FILE_LOCATION) as $typenf): ?>
    <? $typef = rtrim($typenf); ?>
    	<? if (rtrim($type) == $typef): ?>
    		<option value="<?=$typef;?>" selected><?=$typef;?></option>
    	<? else: ?>
    		<option value="<?=$typef;?>"><?=$typef;?></option>
    	<? endif; ?>
    <? endforeach; ?>
	</select>
    </td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['type_txt'];?></td>
  </tr>
</table>

<table cellspacing="0" cellpadding="0" border="0" class="tb_buttons">
  <tr>
    <td><input type="submit" value="<?=$lang['save'];?>" /></form></td>
    <td><form action="<?=$_SERVER['PHP_SELF'];?>" method="post"><input type="submit" value="<?=$lang['cancel'];?>" /></form></td>
  </tr>
</table>