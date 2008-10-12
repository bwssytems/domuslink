<table cellspacing='0' cellpadding='0' border='0'>
  <tr>
    <td align=center><?php echo $week[0]; ?></td>
    <td align=center><?php echo $week[1]; ?></td>
    <td align=center><?php echo $week[2]; ?></td>
    <td align=center><?php echo $week[3]; ?></td>
    <td align=center><?php echo $week[4]; ?></td>
    <td align=center><?php echo $week[5]; ?></td>
    <td align=center><?php echo $week[6]; ?></td>
  </tr>
<tr>

<?php if ($weekdays): ?>

	<?php $j = mb_strlen($weekdays); ?>
	
	<?php for ($k = 0; $k < $j; $k++): ?>
		<?php $char = mb_substr($weekdays, $k, 1); ?>
		<?php if ($char == "."): ?>
			<td><input type='checkbox' name='weekdays' value='<?php echo $week[$k]; ?>' disabled /></td>
		<?php else: ?>
			<td><input type='checkbox' name='weekdays' value='<?php echo $week[$k]; ?>' checked='yes' disabled /></td>
		<?php endif; ?>
	<?php endfor; ?>
	
<?php else: ?>

	<?php for ($i = 0; $i <= 6 ; $i++): ?>
		<td><input type='checkbox' name='weekdays' value='<?php echo $week[$i]; ?>' /></td>
	<?php endfor; ?>
	
<?php endif; ?>

</tr></table>	