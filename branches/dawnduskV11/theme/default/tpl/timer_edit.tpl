<?php
$buttonaction = $_POST["buttonaction"];
?>
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
    <td width="80px"><h6><?php echo ($lang['status']);?>:</h6></td>
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

<!-- Time On -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['ontime']; ?>:</h6></td>
    <td width="150px">
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
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopTime()->getHours() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='offmin' style="width:45px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($theTimer->getStopTime()->getMins() == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>

</td><td>

<!-- labels -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td><h6><?php echo $lang["unit"]; ?>:</h6></td></tr>
  <tr>
  	<td><?php echo $lang["null"]; ?>: <?php echo $lang["on"]; ?> <input type="checkbox" name="null_macro_on" <?php if ($theTimer->getStartMacro() == "null") echo " checked='yes'"; ?>/> <?php echo $lang["off"]; ?> <input type="checkbox" name="null_macro_off" <?php if (rtrim($theTimer->getStopMacro()) == "null") echo " checked='yes'"; ?>/></td>
  </tr>
  <tr>
    <td width="100px">
    <select name="module" size="9" disabled>
	<?php foreach ($codelabels as $codelabel): ?>
		<?php list($code, $label) = split("@", $codelabel, 2); ?>
 		<option value="<?php echo $label;?>" <?php if ($selcode == $label) echo "selected"; ?>><?php echo label_parse($label, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>

</td></tr>
</table>

</td></tr>

<tr>
<td style="border-right: none;" align="center">
<input type="submit" value="<?php echo ($lang['save']); ?>" />
<input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
</td>
</tr>
</table>
</form>