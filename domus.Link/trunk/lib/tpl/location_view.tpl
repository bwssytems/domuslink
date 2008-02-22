<table cellspacing="0" cellpadding="0" border="0" width="330px" align="middle" class="content">
<tr><th><?php echo ($lang['floorplan']); ?></th></tr>

<tr><td align="center">

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
  <td width="160px"><h6><?php echo ($lang['location']);?></h6></td>
  <td colspan="2" width="100px" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
foreach($locations as $line_num => $loc):
  $locf = rtrim($locnf); ?>
<tr>
  <td><?php echo $loc;?></td>
  <td align="center" width="20px"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center" width="20px"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td width="18px"><?php if ($line_num != 0): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $line_num;?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td width="18px"><?php if ($line_num != $locsize-1): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $line_num;?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
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