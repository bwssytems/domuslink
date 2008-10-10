<h1><?php echo ($lang['aliases']); ?></h1>

<table border="0" cellspacing="0" cellpadding="0" class="aliases">
  <tr>
    <td width="70"><h2><?php echo ($lang['code']);?></h2></td>
    <td width="280"><h2><?php echo ($lang['label']);?></h2></td>
    <td width="70"><h2><?php echo ($lang['module']);?></h2></td>
    <td width="70"><h2><?php echo ($lang['type']);?></h2></td>
    <td colspan="2" width="100" align="center"><h2><?php echo ($lang['actions']);?></h2></td>
  </tr>
  <?php foreach($aliases as $line_num => $alias):
          if (substr($alias, 0, 5) == "ALIAS"):
           list($alias, $label, $code, $module_type) = split(" ", $alias, 4);
           list($module, $typenf) = split(" # ", $module_type, 2);
	       $type = rtrim($typenf); ?>
      <tr>
        <td><?php echo $code;?></td>
        <td><?php echo $label;?></td>
        <td><?php echo $module;?></td>
        <td><?php echo $type;?></td>
        <td class="cell_center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><?php echo ($lang['edit']);?></a></td>
        <td class="cell_center"><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><?php echo ($lang['delete']);?></a></td>
      </tr>
	<?php endif; ?>
  <?php endforeach; ?>
</table>

<?php if (!empty($form)) echo($form); ?>