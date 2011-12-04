<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['timers_macro']); ?></th></tr>

<tr><td>


<table cellspacing="0" cellpadding="0" border="0" class="clear" align="center">
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
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><h6><?php echo ($lang['timer']);?></h6></td>
  <td width="10"></td>
  <td align="center"><h6><?php echo ($lang['weekdays']);?></h6></td>
  <td width="10"></td>
  <td width="50" align="center"><h6><?php echo ucwords($lang['start']);?></h6></td>
  <td width="50" align="center"><h6><?php echo ($lang['end']);?></h6></td>
  <td width="10"></td>
  <td width="50" align="center"><h6><?php echo ($lang['on']);?></h6></td>
  <td width="50" align="center"><h6><?php echo ($lang['off']);?></h6></td>
  <td width="10"></td>
  <td width="10" align="center"><h6><?php echo ($lang['option']);?></h6></td>
  <td width="10"></td>
  <td colspan="3" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td width="10"></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
$arrayEnd = count($timers) - 1;
foreach ($timers as $timerObj):

?>
 
 <tr <?php if (!$timerObj->isEnabled()) echo "style='color: #cccccc'"; ?> class="row">
  <td><?php echo label_parse($timerObj->getStartMacro(),false)."-".label_parse($timerObj->getStopMacro(),false); ?></td>
  <td>&nbsp;</td>
  <td align="center">
  <?php echo weekdays($timerObj->getDaysOfWeek(), $lang, true, $timerObj->isEnabled()); ?>
  </td>
  <td>&nbsp;</td>
  <td align="center"><?php echo $timerObj->getStartDate(); ?></td>
  <td align="center"><?php echo $timerObj->getStopDate(); ?></td>
  <td>&nbsp;</td>
  <td align="center"><?php echo $timerObj->getStartTime(); ?></td>
  <td align="center"><?php echo $timerObj->getStopTime(); ?></td>
  <td>&nbsp;</td>
  <td align="center">
   	<a href="">
  	<?php if(count($timerObj->getTimerOptions()) == 0): ?>
  		<?php echo ""; ?>
  	<?php else: ?>
  		<?php
  			$aPupStr = "";
			foreach($timerObj->getTimerOptions() as $aTimerOption)
				$aPupStr = $aPupStr.$aTimerOption." ";
			$imgTag = "<img src=".$config['url_path']."/theme/".$config['theme']."/images/magnifier.png border=0 title=";
			$imgTag = $imgTag."\"".$aPupStr."\""." />";
			echo $imgTag;
		?>
  	<?php endif; ?>
  	</a>
  </td>
  <td>&nbsp;</td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $timerObj->getLineNum();?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $timerObj->getLineNum();?>&onm=<?php echo $timerObj->getStartMacro();?>&ofm=<?php echo $timerObj->getStopMacro();?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td>
  <?php if ($timerObj->isEnabled()): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=disable&line=<?php echo $timerObj->getLineNum();?>&onm=<?php echo $timerObj->getStartMacro();?>&ofm=<?php echo $timerObj->getStopMacro();?>"><?php echo ($lang['disable']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=enable&line=<?php echo $timerObj->getLineNum();?>&onm=<?php echo $timerObj->getStartMacro();?>&ofm=<?php echo $timerObj->getStopMacro();?>"><?php echo ($lang['enable']);?></a>
  <?php endif; ?>
  </td>
  <td>&nbsp;</td>
  <td><?php if ($timerObj->getArrayNum() != 0): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $timerObj->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td><?php if ($timerObj->getArrayNum() != $arrayEnd): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $timerObj->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
</tr>
 
<?php endforeach; ?>
</table>

</td></tr>
</table>
<br>
<div id="timers"><u><h6><a href="<?php echo ($config['url_path']);?>/events/timers.php"><?php echo ($lang['simple_timers']); ?></a></h6></u></div>

<?php 
if (!empty($form)):
 echo($form);
endif; 
?>