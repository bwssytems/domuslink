<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['scenes']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
  <td><h6><?php echo ($lang['label']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['commands']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['location']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['group']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['seclevel']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="4" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
$arrayEnd = count($scenes) - 1;
foreach($scenes as $scene):
?>
<tr <?php if (!$scene->isEnabled()) echo "style='color: #cccccc'"; ?> class="row">
  <td><?php echo label_parse($scene->getLabel());?></td>
  <td>&nbsp;</td>
  <td><?php echo $scene->getCommands();?></td>
  <td>&nbsp;</td>
  <td><?php echo label_parse($scene->getAliasMap()->getFloorPlanLabel());?></td>
  <td>&nbsp;</td>
  <td><?php echo $scene->getAliasMap()->getGroup();?></td>
  <td>&nbsp;</td>
  <td><?php echo strval($scene->getAliasMap()->getAccessLevel());?></td>
  <td>&nbsp;</td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $scene->getLineNum();?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $scene->getLineNum();?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td>
  <?php if ($scene->isEnabled()): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=disable&line=<?php echo $scene->getLineNum();?>"><?php echo ($lang['disable']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=enable&line=<?php echo $scene->getLineNum();?>"><?php echo ($lang['enable']);?></a>
  <?php endif; ?>
  </td>
  <td>
  <?php if ($scene->getAliasMap()->isHiddenFromHome()): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=show&line=<?php echo $scene->getLineNum();?>"><?php echo ($lang['show']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=hide&line=<?php echo $scene->getLineNum();?>"><?php echo ($lang['hide']);?></a>
  <?php endif; ?>
  </td>
  <td>&nbsp;</td>
  <td><?php if ($scene->getArrayNum() != 0): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $scene->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td><?php if ($scene->getArrayNum() != $arrayEnd): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $scene->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
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