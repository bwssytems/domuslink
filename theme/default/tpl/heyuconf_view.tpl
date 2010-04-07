<table cellspacing="0" cellpadding="0" border="0" width="600px" align="center" class="content">
<tr><th colspan="2"><?php echo($lang['heyuconf']); ?></th></tr>

<tr>
<td colspan="2">

<table border="0" cellspacing="0" cellpadding="0" class="clear">
<?php  foreach($settings as $setting):
  if (substr($setting, 0, 1) != "#" && $setting != "\n" && substr($setting, 0, 5) != "ALIAS" &&
  substr($setting, 0, 5) != "SCENE" && substr($setting, 0, 7) != "USERSYN" && $setting != " \n"):
    list($directivenf, $valuenf) = split(" ", $setting, 2); ?>
    <tr>
      <td><h6><?php echo(str_replace("_", " ", $directivenf)); ?>:&nbsp;</h6></td>
      <td><?php echo(rtrim($valuenf, "\n")); ?></td>
    </tr>
    <?php endif; ?>
<?php endforeach; ?>
</table>

</td>
</tr>

<tr>
  <td style="border-right:none;" align="left"><a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');">Help</a></td>
  <td style="border-left:none;">
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=edit" method="post">
    <input type="submit" value="<?php echo ($lang['edit']);?>" /></form>
  </td>
</tr>
</table>