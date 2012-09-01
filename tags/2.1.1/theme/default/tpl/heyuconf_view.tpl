<table cellspacing="0" cellpadding="0" border="0" width="600px" align="center" class="content">
<tr><th colspan="3"><?php echo($lang['heyuconf']); ?></th></tr>

<tr>
<td colspan="3">
<table border="0" cellspacing="0" cellpadding="0" class="clear">
<tr>
  <td><h6><?php echo ($lang['directive']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['comment']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['value']);?></h6></td>
</tr>
<?php  foreach($settings as $setting):
$compType = strtolower(trim($setting->getType()));
  if ($compType != COMMENT_D && $compType != ALIAS_D &&
  $compType != SCENE_D && $compType != USERSYN_D && $compType != SCRIPT_D && $compType != LAUNCHER_D):
    $elements = explode(" ", $setting, 2); ?>
	<?php $directivenf = $elements[0]; ?>
	<?php if(count($elements) > 1) $valuenf = $elements[1]; else $valuenf = ""; ?>
    <tr>
      <td><h6><?php echo(str_replace("_", " ", $setting->getType())); ?>:&nbsp;</h6></td>
  		<td>&nbsp;</td>
      <td><input type="checkbox" disabled name="<?php echo "comment_d@"; echo $setting->getLineNum(); ?>" <?php if(!($setting->isEnabled())) echo "checked"; ?>/></td>
		<td>&nbsp;</td>
      <td><?php echo(trim($valuenf)); ?></td>
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

<?php 
if (!empty($form)):
 echo($form);
endif; 
?>