<h1>ALIASES</h1>

<table border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
    <td width="70">CODE</td>
    <td width="280">LABEL</td>
    <td width="70">MODULE</td>
    <td width="70">TYPE</td>
    <td colspan="2" width="100">ACTIONS</td>
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
        <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=edit&line=<?=$line_num;?>">EDIT</a></td>
        <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=del&line=<?=$line_num;?>" onclick="return confirm('ARE YOU SURE?')">DELETE</a></td>
      </tr>
	<? endif; ?>
  <?php endforeach; ?>
</table>

<?=$form;?>