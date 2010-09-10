<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">
    <table cellspacing="0" cellpadding="0" border="0" width="100%" align="middle" class="content">
        <tr>
            <th colspan="3"><?php echo($lang['heyuconf']); ?></th>
        </tr>
        
        <tr>
            <td align="center" colspan="3" valign="top">
        
                <table border="0" cellspacing="0" cellpadding="0" class="clear">
                <?php $act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts ?>
                <?php foreach($settings as $setting):
                  list($directivenf, $valuenf) = explode(" ", $setting, 2);
  					$directivenf = $setting->getType();
                  $value = rtrim($valuenf, "\n");
                  $directive = str_replace("_", " ", $directivenf); ?>
                
                  <?php if ($directivenf == ALIAS_D): ?>
                  <?php $act++; ?>
                  <?php elseif ($directivenf == SCENE_D): ?>
                    <?php $sct++; ?>
                  <?php elseif ($directivenf == USERSYN_D): ?>
                    <?php $usct++; ?>
				  <?php elseif ($directivenf == SCRIPT_D): ?>
				    <?php $usct++; ?>
				  <?php elseif ($directivenf == LAUNCHER_D): ?>
				    <?php $usct++; ?>
				  <?php elseif ($directivenf == COMMENT_D): ?>
				    <?php $usct++; ?>
                  <?php else: // if not alias, scene or usersyn ?>
                    <tr>
                      <td width="40%">
                        <h6 style="padding-top:20px"><?php echo $directive; ?>:&nbsp;</h6>
                      </td>
  					<td>&nbsp;</td>
     				<td><input type="checkbox" name="<?php echo "comment_d@"; echo $setting->getLineNum(); ?>" <?php if(!($setting->isEnabled())) echo "checked"; ?>/></td>
					<td>&nbsp;</td>
                
                    <?php if ($directivenf == SCRIPT_MODE_D): ?>
                    <td width="60%" valign='top'>
                        <select name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>">
                        <?php if ($value == "SCRIPTS"): ?>
                          <option selected value='SCRIPTS'>SCRIPTS</option>
                          <option value='HEYUHELPER'>HEYUHELPER</option>
                        <?php else: ?>
                          <option value='SCRIPTS'>SCRIPTS</option>
                          <option selected value='HEYUHELPER'>HEYUHELPER</option>
                        <?php endif ?>
                        </select>
                      </td>
                      <?php elseif ($directivenf == MODE_D): ?>
                      <td width="60%" valign='top'>
                        <select name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>">
                          <?php if ($value == "COMPATIBLE"): ?>
                            <option selected value="COMPATIBLE">COMPATIBLE</option>
                            <option value="HEYU">HEYU</option>
                          <?php else: ?>
                            <option value="COMPATIBLE">COMPATIBLE</option>
                            <option selected value="HEYU">HEYU</option>
                          <?php endif ?>
                        </select>
                      </td>
                      <?php elseif ($directivenf == COMBINE_EVENTS_D || $directivenf == COMPRESS_MACROS_D || $directivenf == REPL_DELAYED_MACROS_D ||
      $directivenf == WRITE_CHECK_FILES_D || $directivenf == ACK_HAILS_D || $directivenf == AUTOFETCH_D): ?>
                      <td width="60%" valign='top'>
                        <select name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>">
                          <?php echo yesnoopt($value); ?>
                        </select>
                      </td>
                      <?php elseif ($directivenf == DAWN_OPTION_D || $directivenf == DUSK_OPTION_D): ?>
                      <td width="60%" valign='top'>
                        <select name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>">
                          <?php echo dawnduskopt($value); ?>
                        </select>
                      </td>
                      <?php else: ?>
                      <td width="60%" valign='top'>
                          <input type="text" name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>" value="<?php echo($value); ?>" size="15" />
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php endif; // end if not alias, scene or usersyn ?>
                <?php endforeach; ?>
                </table>
                
                <!-- end -->
            </td>
        </tr>
    </table>
    <input type="submit" value="<?php echo($lang['save']); ?>" />
</form>
            
<a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');">Help</a></div>