<table cellspacing="0" cellpadding="0" border="0" width="100%" align="middle" class="content">
	<tr>
		<th colspan="3"><?php echo($lang['heyuconf']); ?></th>
	</tr>
	<tr>
        <td align="center" colspan="2">
            <table border="0" cellspacing="0" cellpadding="0" class="clear">
				<?php  foreach($settings as $setting):
 			 		if ($setting->getType() != COMMENT_D && $setting->getType() != ALIAS_D &&
  					$setting->getType() != SCENE_D && $setting->getType() != USERSYN_D && $setting->getType() != SCRIPT_D):
    				list($directivenf, $valuenf) = split(" ", $setting, 2); ?>
                    <tr>
                      <td width="30%"><?php echo(str_replace("_", " ", $setting->getType())); ?>:&nbsp;</td>
				      <td width="15%"><input type="checkbox" disabled name="<?php echo "comment_d@"; echo $setting->getLineNum(); ?>" <?php if(!($setting->isEnabled())) echo "checked"; ?>/></td>
                      <td width="55%"><?php echo(rtrim($valuenf)); ?></td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
	    </td>
    </tr>
    
    <tr>
      <td style="border-right:none;" align="left"><a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');">Help</a></div></td>
      <td style="border-left:none;">
        <form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=edit" method="post">
        <input type="submit" value="<?php echo ($lang['edit']);?>" /></form>
      </td>
    </tr>
</table>