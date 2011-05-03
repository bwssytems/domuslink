<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if(form.null_macro_on.checked && form.null_macro_off.checked) {
		alert("Only one null macro selection can be used. Please uncheck one.");
		form.null_macro_on.focus();
		return false;
	}

	if (form.module.value == "") {
		alert( "No module has been selected, please try again." );
		form.module.focus();
		return false ;
	}

	return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['addtimer']); ?></th></tr>

<tr><td>

<!-- center table start -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr><td>

<!-- status -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td><h6><?php echo ($lang['status']);?>:</h6></td>
    <td>
    <select name="status">
 		<option value="" selected><?php echo ($lang['enabled']);?></option>
 		<option value="#"><?php echo ($lang['disabled']);?></option>
	</select>
    </td>
  </tr>

<!-- weekdays -->

  <tr>
    <td><h6><?php echo $lang['weekdays']; ?>:</h6></td>
    <td>
    	<?php echo weekdays(null, $lang, false, true); ?>
    </td>
  </tr>


<!-- date start -->

  <tr>
    <td><h6><?php echo $lang['startdate']; ?>:</h6></td>
    <td>
		<select name='onday'>
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='onmonth'>
		<?php foreach ($months as $num => $value): ?>
			<option value="<?php echo $num; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
    </td>
  </tr>


<!-- date end -->

  <tr>
    <td><h6><?php echo $lang['enddate']; ?>:</h6></td>
    <td>

		<select name='offday'>
		<?php foreach (array_reverse($days) as $value): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='offmonth'>
		<?php foreach (array_reverse($months) as $num => $value): ?>
			<option value="<?php echo 12-$num; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
    </td>
  </tr>


<!-- Time On -->

  <tr>
    <td><h6><?php echo $lang['ontime']; ?>:</h6></td>
  	<td>
  		<input type="radio" name='starttimetype' value="time"/> <?php echo ($lang['time']);?>
  		<input type="radio" name='starttimetype' value="dawn"/> <?php echo ($lang['dawn']);?>
  		<input type="radio" name='starttimetype' value="dusk"/> <?php echo ($lang['dusk']);?>
  	</td>
  </tr>
  <tr>
    <td>
    </td>
    <td>
    <select name='onhour'>
	<?php foreach ($hours as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='onmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>


<!-- Time Off -->

  <tr>
    <td><h6><?php echo $lang['offtime']; ?>:</h6></td>
  	<td>
  		<input type="radio" name='stoptimetype' value="time"/> <?php echo ($lang['time']);?>
  		<input type="radio" name='stoptimetype' value="dawn"/> <?php echo ($lang['dawn']);?>
  		<input type="radio" name='stoptimetype' value="dusk"/> <?php echo ($lang['dusk']);?>
  	</td>
  </tr>
  <tr>
    <td>
    </td>
    <td>
    <select name='offhour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='offmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>

</td>
<td style="vertical-align: top;">
<!-- labels -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td><h6><?php echo $lang["unit"]; ?>:</h6></td></tr>
  <tr>
  	<td><?php echo $lang["null"]; ?>: <?php echo $lang["on"]; ?> <input type="checkbox" name="null_macro_on" value=true/> <?php echo $lang["off"]; ?> <input type="checkbox" name="null_macro_off" value=true/></td>
  </tr>
  <tr>
    <td>
    <select name="module" size="12">
	<?php foreach ($aliases as $alias): ?>
 		<option value="<?php echo $alias->getLabel();?>"><?php echo label_parse($alias->getLabel(), false);?></option>
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