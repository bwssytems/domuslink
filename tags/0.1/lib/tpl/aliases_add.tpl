<h1><?=$lang['addalias'];?></h1>

<form action="<?=$_SERVER['PHP_SELF'];?>?action=add" method="post">
<!-- Code -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['code'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="code" value="" /></td>
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
    <td valign="top" width="150px"><input type="text" name="label" value="" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['label_txt'];?></td>
  </tr>
</table>
<!-- Modules -->
<table cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['module'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <select name="module">
	<? foreach (load_file(MODULE_FILE_LOCATION) as $modulenf): ?>
 	<? $modulef = rtrim($modulenf); ?>
 		<option value="<?=$modulef;?>"><?=$modulef;?></option>
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
		<option value="<?=$typef;?>"><?=$typef;?></option>
	<? endforeach; ?>
	</select>
    </td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['type_txt'];?></td>
  </tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" class="tb_buttons">
  <tr>
    <td><input type="submit" value="<?=$lang['add'];?>" /></td>
  </tr>
</table>

</form>