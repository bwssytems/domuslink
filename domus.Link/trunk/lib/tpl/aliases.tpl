<h1><?=$lang['aliases'];?></h1>

<table border="0" cellspacing="0" cellpadding="0" class="aliases">
  <tr>
    <td width="70"><h2><?=$lang['code'];?></h2></td>
    <td width="280"><h2><?=$lang['label'];?></h2></td>
    <td width="70"><h2><?=$lang['module'];?></h2></td>
    <td width="70"><h2><?=$lang['type'];?></h2></td>
    <td colspan="2" width="100" align="center"><h2><?=$lang['actions'];?></h2></td>
  </tr>
  <?php foreach($aliases as $line_num => $alias): ?>
    <?php if (substr($alias, 0, 5) == "ALIAS"): ?>
      <?php list($alias, $label, $code, $module_type) = split(" ", $alias, 4); ?>
      <?php list($module, $typenf) = split(" # ", $module_type, 2); ?>
	  <?php $type = rtrim($typenf); ?>
      <tr>
        <td><?=$code;?></td>
        <td><?=$label;?></td>
        <td><?=$module;?></td>
        <td><?=$type;?></td>
        <td class="cell_center"><a href="<?=$_SERVER['PHP_SELF'];?>?action=edit&line=<?=$line_num;?>"><?=$lang['edit'];?></a></td>
        <td class="cell_center"><a href="<?=$_SERVER['PHP_SELF'];?>?action=del&line=<?=$line_num;?>" onclick="return confirm('<?=$lang['deleteconfirm'];?>')"><?=$lang['delete'];?></a></td>
      </tr>
	<? endif; ?>
  <?php endforeach; ?>
</table>

<?=$form;?>