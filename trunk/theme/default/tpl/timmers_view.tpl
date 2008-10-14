<table cellspacing="0" cellpadding="0" border="0" align="middle" class="content">
<tr><th><?php echo ($lang['timmers']); ?></th></tr>

<tr><td>


<table cellspacing="0" cellpadding="0" border="1" class="clear" align="middle">
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td colspan="2" align="center" style="border-bottom: 1px dotted #e5e5e5;"><h6><?php echo ($lang['daterange']);?></h6> (dd/mm)</td>
  <td></td>
  <td colspan="2" align="center" style="border-bottom: 1px dotted #e5e5e5;"><h6><?php echo ($lang['time']);?></h6> (24hrs)</td>
  <td></td>
</tr>
<tr>
  <td width="60"><h6><?php echo ($lang['status']);?></h6></td>
  <td width="120"><h6><?php echo ($lang['timmer']);?></h6></td>
  <td width="100" align="center"><h6><?php echo ($lang['weekdays']);?></h6></td>
  <td width="80" align="center"><h6><?php echo ucwords($lang['start']);?></h6></td>
  <td width="80" align="center"><h6><?php echo ($lang['end']);?></h6></td>
  <td width="20"></td>
  <td width="80" align="center"><h6><?php echo ($lang['on']);?></h6></td>
  <td width="80" align="center"><h6><?php echo ($lang['off']);?></h6></td>
  <td colspan="2" width="100px" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
</tr>

<?php
foreach ($timmers  as $timmerline):
	list($timmer, $line_num) = split("@", $timmerline, 2);
	list($lbl, $weekdays, $dateonoff, $ontime, $offtime, $onmacro, $offmacro) = split(" ", $timmer, 7); 
	list($dateon, $dateoff) = split("-", $dateonoff, 2);
	$enabled = (substr($lbl, 0, 1) == "#") ? false : true;
	$code = parse_macro($onmacro, $aliases);
?>
 
 <tr <?php if (!$enabled) echo "style='color: #cccccc'"; ?> class="row">
  <td>
  <?php if ($enabled): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=disable&line=<?php echo $line_num;?>"><?php echo ($lang['disable']);?></a></td>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=enable&line=<?php echo $line_num;?>"><?php echo ($lang['enable']);?></a></td>
  <?php endif; ?>
  <td><?php echo $code; ?></td>
  <td align="center"><?php echo weekdays($weekdays, $lang); ?></td>
  <td align="center"><?php echo $dateon; ?></td>
  <td align="center"><?php echo $dateoff; ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php echo $ontime; ?></td>
  <td align="center"><?php echo $offtime; ?></td>
  <td align="center" width="20px"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center" width="20px"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
</tr>
 
<?php endforeach; ?>
</table>

</td></tr>
</table>

<?php 
if (!empty($form)):
 echo($form);
endif; 
?>