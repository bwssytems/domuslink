<h1><?=$header;?></h1>

<table cellpadding="3" border="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td bgcolor="#F0F0F0">Label</td>
    <td bgcolor="#F0F0F0" colspan="2">Actions</td>
  </tr>

  <?php foreach($modules as $module): ?>
  <?php list($code, $label) = split(" ", $module, 2); ?>
  <tr>
    <td bgcolor="#FFFFFF"><?=$label;?></td>
    <td bgcolor="#FFFFFF"><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>">ON</a></td>
    <td bgcolor="#FFFFFF"><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>">OFF</a></td>
  </tr>
  <?php endforeach; ?>
</table>