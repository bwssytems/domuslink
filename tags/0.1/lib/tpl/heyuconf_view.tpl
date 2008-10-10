<h1><?=$lang['heyuconf'];?></h1>
<table border="0" cellspacing="2" cellpadding="2">
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

</table>

<table cellspacing="0" cellpadding="0" border="0" class="tb_buttons">
  <tr>
  	<td align="left"><div id="help"><a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');"><img src="../theme/<?=$config['theme'];?>/images/icon_help.gif" border="0" alt="Help" /></a></div></td>
    <td>
    <form action="<?=$_SERVER['PHP_SELF'];?>?action=edit" method="post">
    <input type="submit" value="<?=$lang['edit'];?>" /></form>
    </td>
  </tr>
</table>