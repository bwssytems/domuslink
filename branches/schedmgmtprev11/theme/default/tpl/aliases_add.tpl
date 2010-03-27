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
    <td valign="top" width="60px"><h6><?php echo ($lang['code']); ?>:</h6></td>
    <td valign="top" width="150px"><input type="text" name="code" value="" size="10" /></td>
  </tr>
</table>

<!-- Label -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top" width="60px"><h6><?php echo ($lang['label']);?>:</h6></td>
    <td valign="top" width="150px"><input type="text" name="label" value="" size="20" /></td>
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
 		<option value="<?php echo $modulef;?>"><?php echo $modulef;?></option>
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
		<option value="<?php echo $typef;?>"><?php echo $typef;?></option>
	<?php endforeach; ?>
	</select>
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
		<option value="<?php echo $locf;?>"><?php echo $locf;?></option>
	<?php endforeach; ?>
	</select>
    </td>
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