<h1>Heyu Configuration</h1>
<table border="0" cellspacing="2" cellpadding="2" align="center">
<?php foreach($settings as $setting):
  if (substr($setting, 0, 1) != "#" && $setting != "\n" && substr($setting, 0, 5) != "ALIAS" &&
  substr($setting, 0, 5) != "SCENE" && substr($setting, 0, 7) != "USERSYN" && $setting != " \n"):
    list($directivenf, $valuenf) = split(" ", $setting, 2);
    $value = rtrim($valuenf, "\n");
    $directive = str_replace("_", " ", $directivenf); ?>
    <tr>
      <td width="200"><b><?=$directive;?> :&nbsp;</b></td>
      <td width="100"><?=$value;?></td>
    </tr>
    <? endif; ?>
<?php endforeach; ?>

  <tr>
    <td colspan="3">
      <form action="<?=$_SERVER['PHP_SELF'];?>?action=edit" method="post">
      <input type="submit" value="Edit" /></form>
    </td>
  </tr>
</table>