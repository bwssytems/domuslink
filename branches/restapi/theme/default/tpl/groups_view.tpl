<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['groups']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
  <td><h6><?php echo ($lang['label']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['imagename']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="4" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
$arrayEnd = count($groups) - 1;
foreach($groups as $theGroup):
?>
<tr <?php if (!$theGroup->isEnabled()) echo "style='color: #cccccc'"; ?> class="row">
  <td><?php echo label_parse($theGroup->getType());?></td>
  <td>&nbsp;</td>
  <td><?php echo $theGroup->getGroupImage();?></td>
  <td>&nbsp;</td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $theGroup->getLineNum();?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $theGroup->getLineNum();?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td>
  <?php if ($theGroup->isEnabled()): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=disable&line=<?php echo $theGroup->getLineNum();?>"><?php echo ($lang['disable']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=enable&line=<?php echo $theGroup->getLineNum();?>"><?php echo ($lang['enable']);?></a>
  <?php endif; ?>
  </td>
  <td>
  <?php if ($theGroup->getVisible()): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=hide&line=<?php echo $theGroup->getLineNum();?>"><?php echo ($lang['hide']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=show&line=<?php echo $theGroup->getLineNum();?>"><?php echo ($lang['show']);?></a>
  <?php endif; ?>
  </td>
  <td>&nbsp;</td>
  <td><?php if ($theGroup->getArrayNum() != 0): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $theGroup->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td><?php if ($theGroup->getArrayNum() != $arrayEnd): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $theGroup->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
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