<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $linenum; ?>" / >
<input type="hidden" name="macro_on" value="<?php echo $selcode_on;?>" / >
<input type="hidden" name="macro_off" value="<?php echo $selcode_off;?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editmacrotimer']); ?></th></tr>

<tr><td colspan="2">

<!-- center table start -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr><td>

<!-- status -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo ($lang['status']);?>:</h6></td>
    <td width="150px">
    <select name="status" disabled>
 		<option value="" <?php if ($enabled) echo "selected"; ?>><?php echo ($lang['enabled']);?></option>
 		<option value="#" <?php if (!$enabled) echo "selected"; ?>><?php echo ($lang['disabled']);?></option>
	</select>
    </td>
  </tr>
</table>

<!-- weekdays -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['weekdays']; ?>:</h6></td>
    <td width="150px">
    	<?php echo weekdays($weekdays, $lang, false, true); ?>
    </td>
  </tr>
</table>

<!-- date start -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['startdate']; ?>:</h6></td>
    <td width="150px">
		<select name='onday' style="width:35px;">
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>" <?php if ($onday == $value) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='onmonth'>
		<?php foreach ($months as $num => $value): ?>
			<option value="<?php echo $num; ?>" <?php if ($onmonth == $num) echo "selected"; ?>><?php echo $value; ?></option>
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
		<select name='offday' style="width:35px;">
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>" <?php if ($offday == $value) echo "selected"; ?>><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='offmonth'>
		<?php foreach ($months as $num => $value): ?>
			<option value="<?php echo $num; ?>" <?php if ($offmonth == $num) echo "selected"; ?>><?php echo $value; ?></option>
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
    <select name='onhour' style="width:35px;">
	<?php foreach ($hours as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($onhour == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='onmin' style="width:35px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($onmin == $value) echo "selected"; ?>><?php echo $value; ?></option>
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
    <select name='offhour' style="width:35px;">
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($offhour == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='offmin' style="width:35px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>" <?php if ($offmin == $value) echo "selected"; ?>><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>

</td><td>

<!-- on Macros -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo $lang['macro_on']; ?>:</h6></td>
  </tr>
  <tr>
    <td width="100px">
    <select name="macro_on" size="9" disabled>
	<?php foreach ($macros as $macro_on_line): ?>
		<?php list($macro_on_const, $label_on, $code_on) = explode(" ", $macro_on_line, 3); ?>
 		<option value="<?php echo trim($label_on);?>" <?php if (trim($selcode_on) == $label_on) echo "selected"; ?>><?php echo label_parse($label_on, false);?></option>
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
    <td width="100px">
    <select name="macro_off" size="9" disabled>
	<?php foreach ($macros as $macro_off_line): ?>
		<?php list($macro_off_const, $label_off, $code_off) = explode(" ", $macro_off_line, 3); ?>
 		<option value="<?php echo trim($label_off);?>" <?php if (trim($selcode_off) == $label_off) echo "selected"; ?>><?php echo label_parse($label_off, false);?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>
</td></tr>
</table>

</td></tr>

<tr>
<td style="border-right: none;" align="center"><input type="submit" value="<?php echo ($lang['save']); ?>" /></td>
</tr>
</table>
</form>