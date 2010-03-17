<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.macro_on.value == "") {
		if (!(form.null_macro_on.checked)) {
			alert( "No ON macro has been selected, please try again." );
			form.macro_on.focus();
			return false ;
		}
	}

	if (form.macro_off.value == "") {
		if(!(form.null_macro_off.checked)) {
			alert( "No OFF macro has been selected, please try again." );
			form.macro_off.focus();
			return false ;
		}
	}
    return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['addmacrotimer']); ?></th></tr>

<tr><td>

<!-- center table start -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr><td>

<!-- status -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo ($lang['status']);?>:</h6></td>
    <td width="150px">
    <select name="status" style="width:75px;">
 		<option value="" selected><?php echo ($lang['enabled']);?></option>
 		<option value="#"><?php echo ($lang['disabled']);?></option>
	</select>
    </td>
  </tr>
</table>

<!-- weekdays -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['weekdays']; ?>:</h6></td>
    <td width="150px">
    	<?php echo weekdays(null, $lang, false, true); ?>
    </td>
  </tr>
</table>

<!-- date start -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['startdate']; ?>:</h6></td>
    <td width="150px">
		<select name='onday' style="width:45px;">
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='onmonth' style="width:85px;">
		<?php foreach ($months as $num => $value): ?>
			<option value="<?php echo $num; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
    </td>
  </tr>
</table>

<!-- date end -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['enddate']; ?>:</h6></td>
    <td width="150px">

		<select name='offday' style="width:45px;">
		<?php foreach (array_reverse($days) as $value): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='offmonth' style="width:85px;">
		<?php foreach (array_reverse($months) as $num => $value): ?>
			<option value="<?php echo 12-$num; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
    </td>
  </tr>
</table>

<!-- Time On -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['ontime']; ?>:</h6></td>
    <td width="150px">
    <select name='onhour' style="width:45px;">
	<?php foreach ($hours as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='onmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>

<!-- Time Off -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['offtime']; ?>:</h6></td>
    <td width="150px">
    <select name='offhour' style="width:45px;">
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='offmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>

</td>
<td>
<!-- on Macro -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td><h6><?php echo $lang["macro_on"]; ?>:</h6></td></tr>
  <tr>
    <td width="80px"><input type="checkbox" name="null_macro_on" value="yes"/> <?php echo $lang['null']; ?></td>
  </tr>
  <tr>
    <td width="100px">
    <select name="macro_on" size="9">
	<?php foreach ($macros as $macro_on): ?>
		<?php list($macro_on_const, $label_on, $code_on) = explode(" ", $macro_on, 3); ?>
 		<option value="<?php echo $label_on;?>"><?php echo label_parse($label_on, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
</td>
<td>
<!-- off Macro -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td><h6><?php echo $lang["macro_off"]; ?>:</h6></td></tr>
  <tr>
    <td width="80px"><input type="checkbox" name="null_macro_off" value="yes"/> <?php echo $lang['null']; ?></td>
  </tr>
  <tr>
    <td width="100px">
    <select name="macro_off" size="9">
	<?php foreach ($macros as $macro_off): ?>
		<?php list($macro_off_const, $label_off, $code_off) = explode(" ", $macro_off, 3); ?>
 		<option value="<?php echo $label_off;?>"><?php echo label_parse($label_off, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
</td></tr>
</table>
<!-- center table end -->

</td></tr>

<tr><td align="center"><input type="submit" value="<?php echo ($lang['add']);?>" /></td></tr>

</table>

</form>