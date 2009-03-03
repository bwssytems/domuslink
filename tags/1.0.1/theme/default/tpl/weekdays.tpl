<table cellspacing='0' cellpadding='0' border='0'>
<tr <?php if (!$enabled) echo "style='color: #cccccc'"; ?> >
  <?php for ($i = 0; $i < 7 ; $i++): ?>
  <td align=center><?php echo $wdayt[$i]; ?></td>
  <?php endfor; ?>
</tr>

<tr>
<?php for ($i = 0; $i < 7 ; $i++): ?>
<?php if ($weekdays) $char = mb_substr($weekdays, $i, 1); ?>
  <td><input type='checkbox' name='<?php echo $i.$wdayo[$i]; ?>' value='<?php echo $wdayo[$i]; ?>'<?php if ($weekdays && $char != ".") echo " checked='yes'"; ?> <?php if ($list) echo "disabled"; ?> /></td>
<?php endfor; ?>
</tr>

</table>	
