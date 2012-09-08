<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $theTimer->getlineNum(); ?>" / >
<input type="hidden" name="module" value="<?php echo $selcode;?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['edittimer']); ?></th></tr>

<tr><td colspan="2">

<!-- center table start -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr><td>

<!-- status -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td><h6><?php echo ($lang['status']);?>:</h6></td>
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
		<select name='onday'>
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>" <?php if ($theTimer->getStartDate()->getDay() == $value) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='onmonth'>
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


<!-- Time On -->

  <tr>
    <td><h6><?php echo $lang['ontime']; ?>:</h6></td>
  	<td>
  		<input type="radio" name='starttimetype' value="time" <?php if(!$theTimer->getStartTime()->isNow() && !$theTimer->getStartTime()->isDawnDusk()) echo "checked"; ?> /> <?php echo ($lang['time']);?>
  		<input type="radio" name='starttimetype' value="dawn" <?php if($theTimer->getStartTime()->getDawnDusk() == "dawn") echo "checked"; ?> /> <?php echo ($lang['dawn']);?>
  		<input type="radio" name='starttimetype' value="dusk" <?php if($theTimer->getStartTime()->getDawnDusk() == "dusk") echo "checked"; ?> /> <?php echo ($lang['dusk']);?>
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
    </td>
  </tr>


<!-- Time Off -->

  <tr>
    <td><h6><?php echo $lang['offtime']; ?>:</h6></td>
  	<td>
  		<input type="radio" name='stoptimetype' value="time" <?php if(!$theTimer->getStopTime()->isNow() && !$theTimer->getStopTime()->isDawnDusk()) echo "checked"; ?> /> <?php echo ($lang['time']);?>
  		<input type="radio" name='stoptimetype' value="dawn" <?php if($theTimer->getStopTime()->getDawnDusk() == "dawn") echo "checked"; ?> /> <?php echo ($lang['dawn']);?>
  		<input type="radio" name='stoptimetype' value="dusk" <?php if($theTimer->getStopTime()->getDawnDusk() == "dusk") echo "checked"; ?> /> <?php echo ($lang['dusk']);?>
  	</td>
  </tr>
  <tr>
    <td>
    </td>
    <td>
    <select name='offhour'>
	<?php foreach (array_reverse($hours) as $value): ?>
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
    </td>
  </tr>
</table>

</td>
<td style="vertical-align: top;">

<!-- labels -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td><h6><?php echo $lang["unit"]; ?>:</h6></td></tr>
  <tr>
  	<td><?php echo $lang["null"]; ?>: <?php echo $lang["on"]; ?> <input disabled type="checkbox" name="null_macro_on" <?php if ($theTimer->getStartMacro() == "null") echo "checked"; ?>/> <?php echo $lang["off"]; ?> <input disabled type="checkbox" name="null_macro_off" <?php if (rtrim($theTimer->getStopMacro()) == "null") echo "checked"; ?>/></td>
  </tr>
  <tr>
    <td>
    <select name="module" size="12" disabled>
	<?php foreach ($aliases as $alias): ?>
 		<option value="<?php echo $alias->getLabel();?>" <?php if ($selcode == $alias->getLabel()) echo "selected"; ?>><?php echo label_parse($alias->getLabel(), false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>

</td></tr>
</table>

</td></tr>

<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['save']); ?>" />
<input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
</td>
</tr>
</table>
</form>