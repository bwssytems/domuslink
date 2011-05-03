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
  <td><h6><?php echo ($lang['option']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['type']);?></h6></td>
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
$arrayEnd = count($aliases) - 1;
foreach($aliases as $alias):
?>
<tr <?php if (!$alias->isEnabled()) echo "style='color: #cccccc'"; ?> class="row">
  <td><?php echo $alias->getHouseDevice();?></td>
  <td>&nbsp;</td>
  <td><?php echo label_parse($alias->getLabel());?></td>
  <td>&nbsp;</td>
  <td><?php echo $alias->getModuleType();?></td>
  <td>&nbsp;</td>
  <td align="center"><a onmouseover="popup('<?php echo $alias->getModuleOptions(); ?>')" onmouseout="kill()" title="" onfocus="this.blur()" href=""><?php if($alias->getModuleOptions() == "") echo ""; else echo "<img src=".($config['url_path'])."/theme/".($config['theme'])."/images/magnifier.png border=0 />"; ?></a></td>
  <td>&nbsp;</td>
  <td><?php echo $alias->getAliasMap()->getType();?></td>
  <td>&nbsp;</td>
  <td><?php echo label_parse($alias->getAliasMap()->getFloorPlanLabel());?></td>
  <td>&nbsp;</td>
  <td><?php echo $alias->getAliasMap()->getGroup();?></td>
  <td>&nbsp;</td>
  <td><?php echo strval($alias->getAliasMap()->getAccessLevel());?></td>
  <td>&nbsp;</td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $alias->getLineNum();?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $alias->getLineNum();?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td>
  <?php if ($alias->isEnabled()): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=disable&line=<?php echo $alias->getLineNum();?>"><?php echo ($lang['disable']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=enable&line=<?php echo $alias->getLineNum();?>"><?php echo ($lang['enable']);?></a>
  <?php endif; ?>
  </td>
  <td>
  <?php if ($alias->getAliasMap()->isHiddenFromHome()): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=show&line=<?php echo $alias->getLineNum();?>"><?php echo ($lang['show']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=hide&line=<?php echo $alias->getLineNum();?>"><?php echo ($lang['hide']);?></a>
  <?php endif; ?>
  </td>
  <td>&nbsp;</td>
  <td><?php if ($alias->getArrayNum() != 0): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $alias->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td><?php if ($alias->getArrayNum() != $arrayEnd): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $alias->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
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