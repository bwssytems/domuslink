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
<h2><?php echo ($lang['addalias']); ?></h2>
<div class="white">
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" class="panel" method="post"  onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" width="99%" border="0" class="content">
<tr>
<td>

<!-- Code -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td valign="top"><h6><?php echo ($lang['code']); ?>:</h6></td>
    <td valign="top"><input type="text" name="code" value="" size="10" /></td>
  </tr>


<!-- Label -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['label']);?>:</h6></td>
    <td valign="top"><input type="text" name="label" value="" size="20" /></td>
  </tr>


<!-- Modules -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['module']);?>:</h6></td>
    <td valign="top">
    <select name="module">
	<?php foreach ($modlist as $modulenf): ?>
 	<?php $modulef = rtrim($modulenf); ?>
 		<option value="<?php echo $modulef;?>"><?php echo $modulef;?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>


<!-- Module Options -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['option']);?>:</h6></td>
    <td valign="top"><input type="text" name="moduleopts" value="" size="20" /></td>
  </tr>

<!-- Type -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['type']);?>:</h6></td>
    <td valign="top">
    <select name="type">
	<?php foreach ($modtypes as $key => $typenf): ?>
	<?php $typef = rtrim($typenf); ?>
		<option value="<?php echo $typef;?>"><?php echo $typef;?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>


<!-- Location -->

  <tr>
    <td valign="top"><h6><?php echo ($lang['location']);?>:</h6></td>
    <td valign="top">
    <select name="loc" onClick="beginEditing(this);" onBlur="finishEditing();">
	<?php foreach ($floorplan as $locnf): ?>
	<?php $locf = rtrim($locnf); ?>
		<option value="<?php echo $locf;?>"><?php echo $locf;?></option>
	<?php endforeach; ?>
		<option value=""></option>
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
</div>