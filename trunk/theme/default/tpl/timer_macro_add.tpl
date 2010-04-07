<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if(form.null_macro_on.checked && form.null_macro_off.checked) {
		alert("Only one null macro selection can be used. Please uncheck one.");
		form.null_macro_on.focus();
		return false;
	}

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


<!-- reminder expire date -->

  <tr>
    <td><h6><?php echo $lang['reminder']; ?>:</h6></td>
  	<td>
  		<input type="checkbox" name='expiredatetype' value="expire"/> <?php echo $lang['expire'];?>
			<select name='expiredays'>
				<?php foreach ($days as $value): ?>
					<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
				<?php endforeach; ?>
			</select>
  	</td>
  </tr>


<!-- Time On -->

  <tr>
    <td><h6><?php echo $lang['ontime']; ?>:</h6></td>
  	<td>
  		<input type="radio" name='starttimetype' value="time"/> <?php echo ($lang['time']);?>
  		<input type="radio" name='starttimetype' value="now"/> <?php echo ($lang['now']);?> + 
    	<select name='startnowmins'>
			<?php foreach ($offsetmins as $value): ?>
				<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
				<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
			<?php endforeach; ?>
    	</select>
  	</td>
  	<td>
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
    	<?php echo ($lang['security']);?>: <input type="checkbox" name='startsecurity' value="security"/>
    </td>
    <td>
    	<select name='startdawnduskplus'>
    		<option value=""> </option>
    		<option value="+">+</option>
    		<option value="-">-</option>
    	</select>
    	<select name='startdawnduskmins'>
			<?php foreach ($offsetmins as $value): ?>
				<?php if($value != 0): ?>
					<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
					<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
    	</select>
    </td>
  </tr>


<!-- Time Off -->

  <tr>
    <td><h6><?php echo $lang['offtime']; ?>:</h6></td>
  	<td>
  		<input type="radio" name='stoptimetype' value="time"/> <?php echo ($lang['time']);?>
  		<input type="radio" name='stoptimetype' value="now"/> <?php echo ($lang['now']);?> + 
    	<select name='stopnowmins'>
			<?php foreach ($offsetmins as $value): ?>
				<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
				<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
			<?php endforeach; ?>
    	</select>
  	</td>
  	<td>
  		<input type="radio" name='stoptimetype' value="dawn"/> <?php echo ($lang['dawn']);?>
  		<input type="radio" name='stoptimetype' value="dusk"/> <?php echo ($lang['dusk']);?>
  	</td>
  </tr>
  <tr>
    <td>
    </td>
    <td>
    <select name='offhour'>
	<?php foreach ($hours as $value): ?>
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
    	<?php echo ($lang['security']);?>: <input type="checkbox" name='stopsecurity' value="security"/>
    </td>
    <td>
    	<select name='stopdawnduskplus'>
    		<option value=""> </option>
    		<option value="+">+</option>
    		<option value="-">-</option>
    	</select>
    	<select name='stopdawnduskmins'>
			<?php foreach ($offsetmins as $value): ?>
				<?php if($value != 0): ?>
					<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
					<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
    	</select>
    </td>
  </tr>
</table>

</td>
<td style="vertical-align:top;">

<!-- on Macro -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td><h6><?php echo $lang["macro_on"]; ?>:</h6></td></tr>
  <tr>
    <td><input type="checkbox" name="null_macro_on" value="yes"/> <?php echo $lang['null']; ?></td>
  </tr>
  <tr>
    <td>
    <select name="macro_on" size="12">
	<?php foreach ($macros as $macro_on): ?>
		<?php list($macro_on_const, $label_on, $code_on) = explode(" ", $macro_on, 3); ?>
 		<option value="<?php echo $label_on;?>"><?php echo label_parse($label_on, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
</td>

<td style="vertical-align:top;">

<!-- off Macro -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td><h6><?php echo $lang["macro_off"]; ?>:</h6></td></tr>
  <tr>
    <td><input type="checkbox" name="null_macro_off" value="yes"/> <?php echo $lang['null']; ?></td>
  </tr>
  <tr>
    <td>
    <select name="macro_off" size="12">
	<?php foreach ($macros as $macro_off): ?>
		<?php list($macro_off_const, $label_off, $code_off) = explode(" ", $macro_off, 3); ?>
 		<option value="<?php echo $label_off;?>"><?php echo label_parse($label_off, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
</td>
</tr>
<tr colspan="3">
<td colspan="3">
<table border="0" class="clear">
<tr>
<td>
<h6><?php echo $lang['timeroptions'];?>:</h6>
</td>
</tr>
<tr>
<td style="width:25%;">
<input type=checkbox name="timeroptionsdawnlt" value="dawnlt"/> <?php echo $lang['dawnlt'];?>
</td>
<td style="width:25%;">
<input type=checkbox name="timeroptionsdawngt" value="dawngt"/> <?php echo $lang['dawngt'];?>
</td>
<td style="width:25%;">
<input type=checkbox name="timeroptionsdusklt" value="dusklt"/> <?php echo $lang['dusklt'];?>
</td>
<td style="width:25%;">
<input type=checkbox name="timeroptionsduskgt" value="duskgt"/> <?php echo $lang['duskgt'];?>
</td>
</tr>
<tr>
<td>
    <select name='dawnlthour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='dawnltmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td>
    <select name='dawngthour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='dawngtmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td>
    <select name='dusklthour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='duskltmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td>
    <select name='duskgthour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='duskgtmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
</tr>
</table>
</td>
</tr>
</table>
<!-- center table end -->

</td></tr>

<tr><td align="center"><input type="submit" value="<?php echo ($lang['add']);?>" /></td></tr>

</table>

</form>