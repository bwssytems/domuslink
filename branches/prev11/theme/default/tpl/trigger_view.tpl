<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['triggers']); ?></th></tr>

<tr><td>


<table cellspacing="0" cellpadding="0" border="1" class="clear" align="center">
<tr>
  <td colspan="2" align="center" style="border-bottom: 1px dotted #e5e5e5;"><h6><?php echo ($lang['trigger']); ?></h6></td>
  <td></td>
  <td colspan="2" align="center" style="border-bottom: 1px dotted #e5e5e5;"><h6><?php echo ($lang['execute']); ?></h6></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><h6><?php echo ($lang['unit']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['command']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['macro']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="3" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
$arrayEnd = count($triggers) - 1;
foreach ($triggers as $triggerline):
	$line_num = $triggerline->getLineNum();
	$arrayNum = $triggerline->getArrayNum();
	$enabled = $triggerline->isEnabled();
	list($lbl, $tunit, $command, $macro) = explode(" ", $triggerline->getElementLine(), 4); 
?>
 
 <tr <?php if (!$enabled) echo "style='color: #cccccc'"; ?> class="row">
  <td><?php echo label_parse($tunit, false); ?></td>
  <td>&nbsp;</td>
  <td><?php echo strtoupper($command); ?></td>
  <td>&nbsp;</td>
  <td><?php echo label_parse($macro, false); ?></td>
  <td>&nbsp;</td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td>
  <?php if ($enabled): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=disable&line=<?php echo $line_num;?>"><?php echo ($lang['disable']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=enable&line=<?php echo $line_num;?>"><?php echo ($lang['enable']);?></a>
  <?php endif; ?>
  </td>
  <td>&nbsp;</td>
  <td><?php if ($arrayNum != 0): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $line_num;?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td><?php if ($arrayNum != $arrayEnd): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $line_num;?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
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