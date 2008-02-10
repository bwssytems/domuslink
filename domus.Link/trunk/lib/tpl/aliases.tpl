<table cellspacing="0" cellpadding="0" border="0" width="600px" align="middle" class="content">
<tr><th><?php echo ($lang['aliases']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
  <td width="80px"><h6><?php echo ($lang['code']);?></h6></td>
  <td width="160px"><h6><?php echo ($lang['label']);?></h6></td>
  <td width="70px"><h6><?php echo ($lang['module']);?></h6></td>
  <td width="80px"><h6><?php echo ($lang['type']);?></h6></td>
  <td width="110px"><h6><?php echo ($lang['location']);?></h6></td>
  <td colspan="2" width="100px" align="center"><h6><?php echo ($lang['actions']);?></h6></td>
</tr>

<?php 
foreach($aliases as $line_num => $alias):
  if (substr($alias, 0, 5) == "ALIAS"):
   list($alias, $label, $code, $module_type) = split(" ", $alias, 4);
   list($module, $typenloc) = split(" # ", $module_type, 2);
   list($type, $loc) = split(",", $typenloc, 2); ?>
<tr>
  <td><?php echo $code;?></td>
  <td><?php echo $label;?></td>
  <td><?php echo $module;?></td>
  <td><?php echo rtrim($type);?></td>
  <td><?php echo rtrim($loc);?></td>
  <td class="cell_center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><?php echo ($lang['edit']);?></a></td>
  <td class="cell_center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
</tr>
  <?php endif; ?>
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