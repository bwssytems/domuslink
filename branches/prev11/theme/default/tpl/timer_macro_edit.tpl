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
    <td>
    	<h6><?php echo ($lang['status']);?>:</h6>
    </td>
    <td>
    	<select name="status" disabled>
 			<option value="" <?php if ($theTimer->isEnabled()) echo "selected"; ?>><?php echo ($lang['enabled']);?></option>
 			<option value="#" <?php if (!$theTimer->isEnabled()) echo "selected"; ?>><?php echo ($lang['disabled']);?></option>
		</select>
    </td>
  </tr>


<!-- weekdays -->

  <tr>
    <td><h6><?php echo $lang['weekdays']; ?>:</h6></td>
    <td>
    	<?php echo weekdays($theTimer->getDaysOfWeek(), $lang, false, true); ?>
    </td>
  </tr>


<!-- date start -->

  <tr>
    <td><h6><?php echo $lang['startdate']; ?>:</h6></td>
    <td>
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


<!-- date end -->

  <tr>
    <td><h6><?php echo $lang['enddate']; ?>:</h6></td>
    <td>
		<select name='offday'>
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopDate()->getDay() == $value) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='offmonth'>
		<?php foreach ($months as $num => $value): ?>
			<option value="<?php echo $num; ?>" <?php if ($theTimer->getStopDate()->getMonth() == $num) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
    </td>
  </tr>


<!-- reminder expire date -->

  <tr>
    <td><h6><?php echo "Reminder"; ?>:</h6>
    </td>
  	<td>
  		<input type="checkbox" name='expiredatetype' value="expire" <?php if ($theTimer->getStartDate()->getExpire()) echo "checked"; ?> /><?php echo $lang['expire'];?>
		<select name='expiredays'>
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopDate()->getDay() == $value && $theTimer->getStartDate()->getExpire()) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
  	</td>
  </tr>


<!-- Time On -->

  <tr>
    <td><h6><?php echo $lang['ontime']; ?>:</h6></td>
  	<td>
  		<input type="radio" name='starttimetype' value="time" <?php if(!$theTimer->getStartTime()->isNow() && !$theTimer->getStartTime()->isDawnDusk()) echo "checked"; ?> /> <?php echo ($lang['time']);?>
  		<input type="radio" name='starttimetype' value="now" <?php if($theTimer->getStartTime()->isNow()) echo "checked"; ?> /> <?php echo $lang['now'];?> + 
    	<select name='startnowmins'>
			<?php foreach ($offsetmins as $value): ?>
				<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
				<option value="<?php echo $value; ?>" <?php if ($theTimer->getStartTime()->getOffsetMin() == $value && $theTimer->getStartTime()->isNow()) echo "selected"; ?>><?php echo $value; ?></option>
			<?php endforeach; ?>
    	</select>
  	</td>
  	<td>
  		<input type="radio" name='starttimetype' value="dawn" <?php if($theTimer->getStartTime()->getDawnDusk() == "dawn") echo "checked"; ?> /> <?php echo $lang['dawn'];?>
  		<input type="radio" name='starttimetype' value="dusk" <?php if($theTimer->getStartTime()->getDawnDusk() == "dusk") echo "checked"; ?> /> <?php echo $lang['dusk'];?>
  	</td>
  </tr>
  <tr>
    <td>
    </td>
    <td>
    <select name='onhour'>
	<?php foreach ($hours as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStartTime()->getHours() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='onmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStartTime()->getMins() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    	<?php echo $lang['security'];?>: <input type="checkbox" name='startsecurity' value="security" <?php if($theTimer->getStartTime()->getSecurity()) echo "checked"; ?> />
    </td>
    <td>
    	<select name='startdawnduskplus'>
    		<option value="" <?php if(!$theTimer->getStartTime()->isDawnDusk()) echo "selected"; ?>> </option>
    		<option value="+" <?php if($theTimer->getStartTime()->isDawnDusk() && $theTimer->getStartTime()->getPlusMinus()== "+") echo "selected"; ?>>+</option>
    		<option value="-" <?php if($theTimer->getStartTime()->isDawnDusk() && $theTimer->getStartTime()->getPlusMinus()== "-") echo "selected"; ?>>-</option>
    	</select>
    	<select name='startdawnduskmins'>
			<?php foreach ($offsetmins as $value): ?>
				<?php if($value != 0): ?>
					<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
					<option value="<?php echo $value; ?>"  <?php if($theTimer->getStartTime()->isDawnDusk() && $theTimer->getStartTime()->getOffsetMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
				<?php endif; ?>
			<?php endforeach; ?>
    	</select>
    </td>
  </tr>


<!-- Time Off -->

  <tr>
    <td><h6><?php echo $lang['offtime']; ?>:</h6></td>
  	<td>
  		<input type="radio" name='stoptimetype' value="time" <?php if(!$theTimer->getStopTime()->isNow() && !$theTimer->getStopTime()->isDawnDusk()) echo "checked"; ?> /> <?php echo ($lang['time']);?>
  		<input type="radio" name='stoptimetype' value="now" <?php if($theTimer->getStopTime()->isNow()) echo "checked"; ?> /> <?php echo $lang['now'];?> + 
    	<select name='stopnowmins'>
			<?php foreach ($offsetmins as $value): ?>
				<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
				<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopTime()->getOffsetMin() == $value && $theTimer->getStopTime()->isNow()) echo "selected"; ?>><?php echo $value; ?></option>
			<?php endforeach; ?>
    	</select>
  	</td>
  	<td>
  		<input type="radio" name='stoptimetype' value="dawn" <?php if($theTimer->getStopTime()->getDawnDusk() == "dawn") echo "checked"; ?> /> <?php echo $lang['dawn'];?>
  		<input type="radio" name='stoptimetype' value="dusk" <?php if($theTimer->getStopTime()->getDawnDusk() == "dusk") echo "checked"; ?> /> <?php echo $lang['dusk'];?>
  	</td>
  </tr>
  <tr>
    <td>
    </td>
    <td>
    <select name='offhour'>
	<?php foreach ($hours as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopTime()->getHours() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='offmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopTime()->getMins() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    <?php echo $lang['security'];?>: <input type="checkbox" name='stopsecurity' value="security" <?php if($theTimer->getStopTime()->getSecurity()) echo "checked"; ?> />
    </td>
    <td>
    	<select name='stopdawnduskplus'>
    		<option value="" <?php if(!$theTimer->getStopTime()->isDawnDusk()) echo "selected"; ?>> </option>
    		<option value="+" <?php if($theTimer->getStopTime()->isDawnDusk() && $theTimer->getStopTime()->getPlusMinus()== "+") echo "selected"; ?>>+</option>
    		<option value="-" <?php if($theTimer->getStopTime()->isDawnDusk() && $theTimer->getStopTime()->getPlusMinus()== "-") echo "selected"; ?>>-</option>
    	</select>
    	<select name='stopdawnduskmins'>
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
<td style="vertical-align:top;">

<!-- on Macros -->
<table  cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td><h6><?php echo $lang['macro_on']; ?>:</h6></td>
  </tr>
  <tr>
    <td><input type="checkbox" name="null_macro_on" <?php if ($theTimer->getStartMacro() == "null") echo "checked"; ?> /> <?php echo $lang['null']; ?></td>
  </tr>
  <tr>
    <td>
    <select name="macro_on" size="12">
	<?php foreach ($macros as $macro_on_line): ?>
		<?php list($macro_on_const, $label_on, $code_on) = explode(" ", $macro_on_line, 3); ?>
 		<option value="<?php echo trim($label_on);?>" <?php if (trim($theTimer->getStartMacro()) == $label_on) echo "selected"; ?>><?php echo label_parse($label_on, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
</td>

<td style="vertical-align:top;">

<!-- off Macros -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td><h6><?php echo $lang['macro_off']; ?>:</h6></td>
  </tr>
   <tr>
    <td><input type="checkbox" name="null_macro_off" <?php if (rtrim($theTimer->getStopMacro()) == "null") echo "checked"; ?> /> <?php echo $lang['null']; ?></td>
  </tr>
  <tr>
    <td>
    <select name="macro_off" size="12">
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
<td colspan=3>
<table border="0" class="clear">
<tr>
<td>
<h6><?php echo $lang['timeroptions'];?>:</h6>
</td>
</tr>
<tr>
<td>
<input type=checkbox name="timeroptionsdawnlt" value="dawnlt" <?php if($theTimer->getTimerOption("dawnlt")) echo "checked"; ?> /> <?php echo $lang['dawnlt'];?>
</td>
<td>
<input type=checkbox name="timeroptionsdawngt" value="dawngt" <?php if($theTimer->getTimerOption("dawngt")) echo "checked"; ?> /> <?php echo $lang['dawngt'];?>
</td>
<td>
<input type=checkbox name="timeroptionsdusklt" value="dusklt" <?php if($theTimer->getTimerOption("dusklt")) echo "checked"; ?> /> <?php echo $lang['dusklt'];?>
</td>
<td>
<input type=checkbox name="timeroptionsduskgt" value="duskgt" <?php if($theTimer->getTimerOption("duskgt")) echo "checked"; ?> /> <?php echo $lang['duskgt'];?>
</td>
</tr>
<tr>
<td>
    <select name='dawnlthour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dawnlt") && $theTimer->getTimerOption("dawnlt")->getOptionHour() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='dawnltmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dawnlt") && $theTimer->getTimerOption("dawnlt")->getOptionMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td>
    <select name='dawngthour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dawngt") && $theTimer->getTimerOption("dawngt")->getOptionHour() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='dawngtmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dawngt") && $theTimer->getTimerOption("dawngt")->getOptionMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td>
    <select name='dusklthour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dusklt") && $theTimer->getTimerOption("dusklt")->getOptionHour() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='duskltmin'>
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("dusklt") && $theTimer->getTimerOption("dusklt")->getOptionMin() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
</td>
<td>
    <select name='duskgthour'>
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getTimerOption("duskgt") && $theTimer->getTimerOption("duskgt")->getOptionHour() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='duskgtmin'>
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