<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['users']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
  <td><h6><?php echo ($lang['type']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['username']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['password']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['seclevel']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['secleveltype']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="3" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td style="width:10px;"></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
$arrayEnd = count($users) - 1;
foreach($users as $user):
?>
<tr <?php if (!$user->isEnabled()) echo "style='color: #cccccc'"; ?> class="row">
  <td><?php echo $user->getType();?></td>
  <td>&nbsp;</td>
  <td><?php echo $user->getUserName();?></td>
  <td>&nbsp;</td>
  <td>************</td>
  <td>&nbsp;</td>
  <td><?php echo strval($user->getSecurityLevel());?></td>
  <td>&nbsp;</td>
  <td><?php echo $user->getSecurityLevelType();?></td>
  <td>&nbsp;</td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $user->getLineNum();?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $user->getLineNum();?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td>
  <?php if ($user->isEnabled()): ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=disable&line=<?php echo $user->getLineNum();?>"><?php echo ($lang['disable']);?></a>
  <?php else: ?>
  	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=enable&line=<?php echo $user->getLineNum();?>"><?php echo ($lang['enable']);?></a>
  <?php endif; ?>
  </td>
  <td>&nbsp;</td>
  <td><?php if ($user->getArrayNum() != 0): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $user->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td><?php if ($user->getArrayNum() != $arrayEnd): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $user->getLineNum();?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
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