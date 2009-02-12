<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.module.value == "") {
		alert( "No module has been selected, please try again." );
		form.module.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['addtimer']); ?></th></tr>
<tr><td>

<!-- start center table -->
<table cellspacing="0" cellpadding="0" border="1">
<tr>
<td>Trigger Command</td>
<td>Status</td>
</tr>
<tr>
<td>
<!-- trigger command -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo ($lang['status']);?>:</h6></td>
    <td width="150px">
    <select name="command">
 		<option value="on" selected><?php echo ($lang['on']);?></option>
 		<option value="off"><?php echo ($lang['off']);?></option>
	</select>
    </td>
  </tr>
</table>
<!-- end trigger command -->
</td>
<td>
<!-- status -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo ($lang['status']);?>:</h6></td>
    <td width="150px">
    <select name="status">
 		<option value="" selected><?php echo ($lang['enabled']);?></option>
 		<option value="#"><?php echo ($lang['disabled']);?></option>
	</select>
    </td>
  </tr>
</table>
<!-- end status -->
</td>
</tr>
<tr>
<td>Trigger Unit</td>
<td>Macro</td>
</tr>
<tr>
<td>
<!-- trigger unit -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="100px">
    <select name="unit" size="9">
	<?php foreach ($codelabels as $codelabel): ?>
		<?php list($code, $label) = split("@", $codelabel, 2); ?>
 		<option value="<?php echo $code;?>"><?php echo label_parse($label, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
<!-- end trigger unit -->
</td>
<td>
<!-- execute macro -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="100px">
    <select name="macro" size="9">
	<?php foreach ($macros as $macro): ?>
		<?php list($code, $label) = split("@", $codelabel, 2); ?>
 		<option value="<?php echo $label;?>"><?php echo label_parse($label, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
<!-- end execute macro -->
</td>
</tr>
</table>
<!-- end center table -->

</td></tr>
<tr><td align="center"><input type="submit" value="<?php echo ($lang['add']);?>" /></td></tr>
</table>

</form>