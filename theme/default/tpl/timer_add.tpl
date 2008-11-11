<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['addtimmer']); ?></th></tr>

<tr><td>

<!-- status -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo ($lang['status']);?>:</h6></td>
    <td width="150px">
    <select name="module">
 		<option value="enabled" selected><?php echo ($lang['enabled']);?></option>
 		<option value="disabled"><?php echo ($lang['disabled']);?></option>
	</select>
    </td>
  </tr>
</table>

<!-- labels -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td width="80px"><h6><?php echo ($lang['module']);?>:</h6></td>
    <td width="150px">
    <select name="module">
	<?php foreach ($codelabels as $codelabel): ?>
		<?php list($code, $label) = split("@", $codelabel, 2); ?>
 		<option value="<?php echo $code;?>"><?php echo label_parse($label, false);?></option>
	<?php endforeach; ?>
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
		<select name='onday' style="width:35px;">
		<?php foreach ($days as $value): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='onmonth'>
		<?php foreach ($months as $value): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
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
		<?php foreach (array_reverse($days) as $value): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>
		</select>
		<select name='offmonth'>
		<?php foreach (array_reverse($months) as $value): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
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
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='onmin' style="width:35px;">
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
    <select name='offhour' style="width:35px;">
	<?php foreach (array_reverse($hours) as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
	<select name='offmin' style="width:35px;">
	<?php foreach ($mins as $value): ?>
		<?php if (strlen($value) == 1): $value = "0".$value; endif; ?>
		<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
  </tr>
</table>

</td></tr>

<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['add']);?>" />
</td>
</tr>
</table>

</form>