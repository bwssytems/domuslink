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
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['addtrigger']); ?></th></tr>
<tr><td>

<!-- start center table -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
<td width="180px" align="center"><h6><?php echo ($lang['trig_cmd']);?>:</h6></td>
<td width="180px" align="center"><h6><?php echo ($lang['status']);?>:</h6></td>
</tr>
<tr>
<td align="center">
<!-- trigger command -->
<select name="command">
	<option value="on" selected><?php echo ($lang['on']);?></option>
	<option value="off"><?php echo ($lang['off']);?></option>
</select>
<!-- end trigger command -->
</td>
<td align="center">
<!-- status -->
<select name="status">
	<option value="" selected><?php echo ($lang['enabled']);?></option>
	<option value="#"><?php echo ($lang['disabled']);?></option>
</select>
<!-- end status -->
</td>
</tr>
<tr>
<td align="center"><h6><?php echo ($lang['trig_unit']);?>:</h6></td>
<td align="center"><h6><?php echo ($lang['execute']);?>:</h6></td>
</tr>
<tr>
<td align="center">
<!-- trigger unit -->
<select name="unit" size="9">
<?php foreach ($codelabels as $codelabel): ?>
	<?php list($code, $label) = split("@", $codelabel, 2); ?>
	<?php if (!is_multi_alias($code)): ?>
		<option value="<?php echo $label;?>"><?php echo label_parse($label, false);?></option>
	<?php endif; ?>
<?php endforeach; ?>
</select>
<!-- end trigger unit -->
</td>
<td align="center">
<!-- execute macro -->
<select name="macro" size="9">
<?php foreach ($cmacs as $cmac): ?>
	<?php list($alias, $code, $trans) = split("@", $cmac, 3); ?>
	<option value="<?php echo $alias;?>_<?php echo $code;?>"><?php echo label_parse($alias, false);?> <?php echo strtoupper($trans);?></option>
<?php endforeach; ?>
</select>
<!-- end execute macro -->
</td>
</tr>
</table>
<!-- end center table -->

</td></tr>
<tr><td align="center"><input type="submit" value="<?php echo ($lang['add']);?>" /></td></tr>
</table>

</form>
