<table cellspacing="0" cellpadding="0" border="0" width="600px" align="middle" class="content">
<tr><th><?php echo ($lang['aliases']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
  <td width="60px"><h6><?php echo ($lang['code']);?></h6></td>
  <td width="144px"><h6><?php echo ($lang['label']);?></h6></td>
  <td width="70px"><h6><?php echo ($lang['module']);?></h6></td>
  <td width="80px"><h6><?php echo ($lang['type']);?></h6></td>
  <td width="110px"><h6><?php echo ($lang['location']);?></h6></td>
  <td colspan="2" width="100px" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
  <td colspan="2" align="center"><h6><?php echo ($lang['move']);?></h6></td>
</tr>

<?php
list($temp, $first_line) = split("@", $aliases[0], 2);
list($temp, $last_line) = split("@", $aliases[$size-1], 2);

foreach($aliases as $alias_num):
	list($alias, $line_num) = split("@", $alias_num, 2);
	list($alias, $label, $code, $module_type) = split(" ", $alias, 4);
	list($module, $typenloc) = split(" # ", $module_type, 2);
	list($type, $loc) = split(",", $typenloc, 2); ?>
<tr>
  <td><?php echo $code;?></td>
  <td><?php echo $label;?></td>
  <td><?php echo $module;?></td>
  <td><?php echo rtrim($type);?></td>
  <td><?php echo rtrim($loc);?></td>
  <td align="center" width="20px"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><?php echo ($lang['edit']);?></a></td>
  <td align="center" width="20px"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
  <td width="18px"><?php if ($line_num != $first_line): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $line_num;?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-u.gif" border="0" /></a><?php endif; ?></td>
  <td width="18px"><?php if ($line_num != $last_line): ?><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $line_num;?>"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/arrow-d.gif" border="0" /></a><?php endif; ?></td>
</tr>
<?php endforeach; ?>
</table>

<td></tr>
</table>

<?php 
if (!empty($form)): ?>
 <br />
<?php 
 echo($form);
 endif; 
?>