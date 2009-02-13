<table cellspacing="0" cellpadding="0" border="0" align="middle" class="content">
<tr><th><?php echo ($lang['timers']); ?></th></tr>

<tr><td>


<table cellspacing="0" cellpadding="0" border="0" class="clear" align="middle">
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td colspan="2" align="center" style="border-bottom: 1px dotted #e5e5e5;"><h6><?php echo ($lang['daterange']);?></h6> (mm/dd)</td>
  <td></td>
  <td colspan="2" align="center" style="border-bottom: 1px dotted #e5e5e5;"><h6><?php echo ($lang['time']);?></h6> (24hrs)</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td width="50"><h6><?php echo ($lang['status']);?></h6></td>
  <td width="120"><h6><?php echo ($lang['timer']);?></h6></td>
  <td align="center"><h6><?php echo ($lang['weekdays']);?></h6></td>
  <td width="10"></td>
  <td width="50" align="center"><h6><?php echo ucwords($lang['start']);?></h6></td>
  <td width="50" align="center"><h6><?php echo ($lang['end']);?></h6></td>
  <td width="10"></td>
  <td width="50" align="center"><h6><?php echo ($lang['on']);?></h6></td>
  <td width="50" align="center"><h6><?php echo ($lang['off']);?></h6></td>
  <td width="10"></td>
  <td colspan="2" width="100px" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
foreach ($timers as $timerline):
	list($timer, $line_num) = split("@", $timerline, 2);
	list($lbl, $weekdays, $dateonoff, $ontime, $offtime, $onmacro, $offmacro) = split(" ", $timer, 7); 
	list($dateon, $dateoff) = split("-", $dateonoff, 2);
	$enabled = (substr($lbl, 0, 1) == "#") ? false : true;
	//$code = parse_macro($onmacro);
	$code = label_parse(strip_code($onmacro),false);
?>
 
 <tr <?php if (!$enabled) echo "style='color: #cccccc'"; ?> class="row">
  <td>
  <?php if ($enabled): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=disable&line=<?php echo $line_num;?>&onm=<?php echo $onmacro;?>&ofm=<?php echo $offmacro;?>"><?php echo ($lang['disable']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=enable&line=<?php echo $line_num;?>&onm=<?php echo $onmacro;?>&ofm=<?php echo $offmacro;?>"><?php echo ($lang['enable']);?></a>
  <?php endif; ?>
  </td>
  <td><?php echo $code; ?></td>
  <td align="center">
  <?php echo weekdays($weekdays, $lang, true, $enabled); ?>
  </td>
  <td>&nbsp;</td>
  <td align="center"><?php echo $dateon; ?></td>
  <td align="center"><?php echo $dateoff; ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php echo $ontime; ?></td>
  <td align="center"><?php echo $offtime; ?></td>
  <td>&nbsp;</td>
  <td align="center" width="20px"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center" width="20px"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>&onm=<?php echo $onmacro;?>&ofm=<?php echo $offmacro;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td width="18px"><?php if ($line_num != $first_line): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $line_num;?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td width="18px"><?php if ($line_num != $last_line): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $line_num;?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
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