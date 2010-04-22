<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['aliases']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
  <td><h6><?php echo ($lang['code']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['label']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['module']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['type']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['location']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['home']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
$arrayEnd = count($aliases) - 1;
foreach($aliases as $alias):
	$line_num = $alias->getLineNum();
	$arrayNum = $alias->getArrayNum();
	$enabled = $alias->isEnabled(); ?>
<tr class="row">
  <td><?php echo $alias->getHouseDevice();?></td>
  <td>&nbsp;</td>
  <td><?php echo label_parse($alias->getLabel());?></td>
  <td>&nbsp;</td>
  <td><?php echo $alias->getModuleType();?></td>
  <td>&nbsp;</td>
  <td><?php echo rtrim($alias->getAliasMap()->getType());?></td>
  <td>&nbsp;</td>
  <td><?php echo rtrim($alias->getAliasMap()->getFloorPlanLabel());?></td>
  <td>&nbsp;</td>
  <td><?php echo $alias->getAliasMap()->getHiddenFromHome();?></td>
  <td>&nbsp;</td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
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