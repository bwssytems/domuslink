<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $theTimer->getLineNum(); ?>" / >
<input type="hidden" name="macro_on" value="<?php echo $theTimer->getStartMacro();?>" / >
<input type="hidden" name="macro_off" value="<?php echo $theTimer->getStopMacro();?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editmacrotimer']); ?></th></tr>

<tr>
<td colspan="2">

<!-- center table start -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
<td>

<!-- status -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px">
    	<h6><?php echo ($lang['status']);?>:</h6>
    </td>
    <td width="150px">
    	<select name="status"  style="width:75px;" disabled>
 			<option value="" <?php if ($theTimer->isEnabled()) echo "selected"; ?>><?php echo ($lang['enabled']);?></option>
 			<option value="#" <?php if (!$theTimer->isEnabled()) echo "selected"; ?>><?php echo ($lang['disabled']);?></option>
		</select>
    </td>
  </tr>
</table>

<!-- weekdays -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['weekdays']; ?>:</h6></td>
    <td width="150px">
    	<?php echo weekdays($theTimer->getDaysOfWeek(), $lang, false, true); ?>
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
			<option value="<?php echo $value; ?>" <?php if ($theTimer->getStartDate()->getDay() == $value) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='onmonth' style="width:85px;">
		<?php foreach ($months as $num => $value): ?>
			<option value="<?php echo $num; ?>" <?php if ($theTimer->getStartDate()->getMonth() == $num) echo "selected"; ?>><?php echo $value; ?></option>
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
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopDate()->getDay() == $value) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='offmonth' style="width:85px;">
		<?php foreach ($months as $num => $value): ?>
			<option value="<?php echo $num; ?>" <?php if ($theTimer->getStopDate()->getMonth() == $num) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
    </td>
  </tr>
</table>

<!-- reminder expire date -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo "Reminder"; ?>:</h6>
    </td>
  	<td>
  		<input type="checkbox" name='expiredatetype' value="expire" <?php if ($theTimer->getStartDate()->getExpire()) echo "checked"; ?> /><?php echo $lang['expire'];?>
  		</td>
  		<td>
		<select name='expiredays' style="width:45px;">
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopDate()->getDay() == $value && $theTimer->getStartDate()->getExpire()) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		</td>
  	</td>
  </tr>
</table>

<!-- Time On -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['ontime']; ?>:</h6></td>
  	<td width="180px">
  		<input type="radio" name='starttimetype' value="time" <?php if(!$theTimer->getStartTime()->isNow() && !$theTimer->getStartTime()->isDawnDusk()) echo "checked"; ?> /> <?php echo ($lang['time']);?>
  		<input type="radio" name='starttimetype' value="now" <?php if($theTimer->getStartTime()->isNow()) echo "checked"; ?> /> <?php echo $lang['now'];?> + 
    	<select name='startnowmins' style="width:55px;">
			<?php foreach ($offsetmins as $value): ?>
				<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
				<option value="<?php echo $value; ?>" <?php if ($theTimer->getStartTime()->getOffsetMin() == $value && $theTimer->getStartTime()->isNow()) echo "selected"; ?>><?php echo $value; ?></option>
			<?php endforeach; ?>
    	</select>
  	</td>
  	<td width="180px">
  		<input type="radio" name='starttimetype' value="dawn" <?php if($theTimer->getStartTime()->getDawnDusk() == "dawn") echo "checked"; ?> /> <?php echo $lang['dawn'];?>
  		<input type="radio" name='starttimetype' value="dusk" <?php if($theTimer->getStartTime()->getDawnDusk() == "dusk") echo "checked"; ?> /> <?php echo $lang['dusk'];?>
  	</td>
  </tr>
  <tr>
    <td width="80px">
    </td>
    <td width="180px">
    <select name='onhour' style="width:45px;">
	<?php foreach ($hours as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStartTime()->getHours() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='onmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStartTime()->getMins() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    	<?php echo $lang['security'];?>: <input type="checkbox" name='startsecurity' value="security" <?php if($theTimer->getStartTime()->getSecurity()) echo "checked"; ?> />
    </td>
    <td width="180px">
    	<select name='startdawnduskplus' style="width:45px;">
    		<option value="" <?php if(!$theTimer->getStartTime()->isDawnDusk()) echo "selected"; ?>> </option>
    		<option value="+" <?php if($theTimer->getStartTime()->isDawnDusk() && $theTimer->getStartTime()->getPlusMinus()== "+") echo "selected"; ?>>+</option>
    		<option value="-" <?php if($theTimer->getStartTime()->isDawnDusk() && $theTimer->getStartTime()->getPlusMinus()== "-") echo "selected"; ?>>-</option>
    	</select>
    	<select name='startdawnduskmins' style="width:55px;">
			<?php foreach ($offsetmins as $value): ?>
				<?php if($value != 0): ?>
					<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
					<option value="<?php echo $value; ?>"  <?php if($theTimer->getStartTime()->isDawnDusk() && $theTimer->getStartTime()->getOffsetMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
    	</select>
    </td>
  </tr>
</table>

<!-- Time Off -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['offtime']; ?>:</h6></td>
  	<td width="180px">
  		<input type="radio" name='stoptimetype' value="time" <?php if(!$theTimer->getStopTime()->isNow() && !$theTimer->getStopTime()->isDawnDusk()) echo "checked"; ?> /> <?php echo ($lang['time']);?>
  		<input type="radio" name='stoptimetype' value="now" <?php if($theTimer->getStopTime()->isNow()) echo "checked"; ?> /> <?php echo $lang['now'];?> + 
    	<select name='stopnowmins' style="width:55px;">
			<?php foreach ($offsetmins as $value): ?>
				<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
				<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopTime()->getOffsetMin() == $value && $theTimer->getStopTime()->isNow()) echo "selected"; ?>><?php echo $value; ?></option>
			<?php endforeach; ?>
    	</select>
  	</td>
  	<td width="180px">
  		<input type="radio" name='stoptimetype' value="dawn" <?php if($theTimer->getStopTime()->getDawnDusk() == "dawn") echo "checked"; ?> /> <?php echo $lang['dawn'];?>
  		<input type="radio" name='stoptimetype' value="dusk" <?php if($theTimer->getStopTime()->getDawnDusk() == "dusk") echo "checked"; ?> /> <?php echo $lang['dusk'];?>
  	</td>
  </tr>
  <tr>
    <td width="80px">
    </td>
    <td width="180px">
    <select name='offhour' style="width:45px;">
	<?php foreach ($hours as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopTime()->getHours() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='offmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopTime()->getMins() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    <?php echo $lang['security'];?>: <input type="checkbox" name='stopsecurity' value="security" <?php if($theTimer->getStopTime()->getSecurity()) echo "checked"; ?> />
    </td>
    <td width="180px">
    	<select name='stopdawnduskplus' style="width:45px;">
    		<option value="" <?php if(!$theTimer->getStopTime()->isDawnDusk()) echo "selected"; ?>> </option>
    		<option value="+" <?php if($theTimer->getStopTime()->isDawnDusk() && $theTimer->getStopTime()->getPlusMinus()== "+") echo "selected"; ?>>+</option>
    		<option value="-" <?php if($theTimer->getStopTime()->isDawnDusk() && $theTimer->getStopTime()->getPlusMinus()== "-") echo "selected"; ?>>-</option>
    	</select>
    	<select name='stopdawnduskmins' style="width:55px;">
			<?php foreach ($offsetmins as $value): ?>
				<?php if($value != 0): ?>
					<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
					<option value="<?php echo $value; ?>"  <?php if($theTimer->getStopTime()->isDawnDusk() && $theTimer->getStopTime()->getOffsetMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
    	</select>
    </td>
  </tr>
</table>

</td>
<td>

<!-- on Macros -->
<table  cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['macro_on']; ?>:</h6></td>
  </tr>
  <tr>
    <td width="80px"><input type="checkbox" name="null_macro_on" <?php if ($theTimer->getStartMacro() == "null") echo "checked"; ?> /> <?php echo $lang['null']; ?></td>
  </tr>
  <tr>
    <td width="100px">
    <select name="macro_on" size="9">
	<?php foreach ($macros as $macro_on_line): ?>
		<?php list($macro_on_const, $label_on, $code_on) = explode(" ", $macro_on_line, 3); ?>
 		<option value="<?php echo trim($label_on);?>" <?php if (trim($theTimer->getStartMacro()) == $label_on) echo "selected"; ?>><?php echo label_parse($label_on, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
</td>

<td>

<!-- off Macros -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['macro_off']; ?>:</h6></td>
  </tr>
   <tr>
    <td width="80px"><input type="checkbox" name="null_macro_off" <?php if (rtrim($theTimer->getStopMacro()) == "null") echo "checked"; ?> /> <?php echo $lang['null']; ?></td>
  </tr>
  <tr>
    <td width="100px">
    <select name="macro_off" size="9">
	<?php foreach ($macros as $macro_off_line): ?>
		<?php list($macro_off_const, $label_off, $code_off) = explode(" ", $macro_off_line, 3); ?>
 		<option value="<?php echo trim($label_off);?>" <?php if (trim($theTimer->getStopMacro()) == $label_off) echo "selected"; ?>><?php echo label_parse($label_off, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
</td>
</tr>
<tr>
<td colspan=4>
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
<td>
<h6><?php echo $lang['timeroptions'];?>:</h6>
</td>
</tr>
<tr>
<td style="width: 145px">
<input type=checkbox name="timeroptionsdawnlt" value="dawnlt" <?php if($theTimer->getTimerOption("dawnlt")) echo "checked"; ?> /> <?php echo $lang['dawnlt'];?>
</td>
<td style="width: 145px">
<input type=checkbox name="timeroptionsdawngt" value="dawngt" <?php if($theTimer->getTimerOption("dawngt")) echo "checked"; ?> /> <?php echo $lang['dawngt'];?>
</td>
<td style="width: 145px">
<input type=checkbox name="timeroptionsdusklt" value="dusklt" <?php if($theTimer->getTimerOption("dusklt")) echo "checked"; ?> /> <?php echo $lang['dusklt'];?>
</td>
<td style="width: 145px">
<input type=checkbox name="timeroptionsduskgt" value="duskgt" <?php if($theTimer->getTimerOption("duskgt")) echo "checked"; ?> /> <?php echo $lang['duskgt'];?>
</td>
</tr>
<tr>
<td style="width: 145px">
    <select name='dawnlthour' style="width:45px;">
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dawnlt") && $theTimer->getTimerOption("dawnlt")->getOptionHour() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='dawnltmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dawnlt") && $theTimer->getTimerOption("dawnlt")->getOptionMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td style="width: 145px">
    <select name='dawngthour' style="width:45px;">
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dawngt") && $theTimer->getTimerOption("dawngt")->getOptionHour() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='dawngtmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dawngt") && $theTimer->getTimerOption("dawngt")->getOptionMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td style="width: 145px">
    <select name='dusklthour' style="width:45px;">
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dusklt") && $theTimer->getTimerOption("dusklt")->getOptionHour() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='duskltmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dusklt") && $theTimer->getTimerOption("dusklt")->getOptionMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td style="width: 145px">
    <select name='duskgthour' style="width:45px;">
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("duskgt") && $theTimer->getTimerOption("duskgt")->getOptionHour() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='duskgtmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("duskgt") && $theTimer->getTimerOption("duskgt")->getOptionMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
</tr>
</table>
</td>
</tr>
</table>

</td>
</tr>


<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['save']); ?>" />
<input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
</td>
</tr>
</table>
</form>