<SCRIPT LANGUAGE="JavaScript">
InstantiateProgressBar('Heyu Restart Progress');
</script>

<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">

<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th colspan="3"><?php echo ($lang['heyuconf']);?></th></tr>

<tr>
<td colspan="3">

<!-- start -->

<table border="0" cellspacing="0" cellpadding="0" class="clear">
<tr>
  <td><h6><?php echo ($lang['directive']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['comment']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['value']);?></h6></td>
</tr>
<tr>
<td>
<?php $junk = 0; // alias, scene and usersyn counts for posts ?>
<?php foreach($settings as $setting):
  $compType = strtolower(trim($setting->getType()));
  if ($compType != COMMENT_D && $compType != ALIAS_D &&
  $compType != SCENE_D && $compType != USERSYN_D && $compType != SCRIPT_D && $compType != LAUNCHER_D):
  $elements = explode(" ", $setting, 2);
  $directivenf = $compType; ?>
  <?php if(count($elements) > 1) $value = trim($elements[1]); else $value = ""; ?>
  <?php $directive = str_replace("_", " ",  $setting->getType()); ?>
  </td>
</tr>
    <tr>
      <td>
        <h6><?php echo $directive; ?>:&nbsp;</h6>
      </td>
  		<td>&nbsp;</td>
      <td><input type="checkbox" name="<?php echo "comment_d@"; echo $setting->getLineNum(); ?>" <?php if(!($setting->isEnabled())) echo "checked"; ?>/></td>
		<td>&nbsp;</td>

    <?php if ($directivenf == SCRIPT_MODE_D): ?>
      <td>
        <select name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>">
        <?php if (strtoupper($value) == "SCRIPTS"): ?>
          <option selected value='SCRIPTS'>SCRIPTS</option>
          <option value='HEYUHELPER'>HEYUHELPER</option>
        <?php else: ?>
          <option value='SCRIPTS'>SCRIPTS</option>
          <option selected value='HEYUHELPER'>HEYUHELPER</option>
        <?php endif ?>
        </select>
      </td>
      <?php elseif ($directivenf == MODE_D): ?>
      <td>
        <select name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>">
          <?php if (strtoupper($value) == "COMPATIBLE"): ?>
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
      <td>
        <select name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>">
          <?php echo yesnoopt($value); ?>
        </select>
      </td>
      <?php elseif ($directivenf == DAWN_OPTION_D || $directivenf == DUSK_OPTION_D): ?>
      <td>
        <select name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>">
          <?php echo dawnduskopt($value); ?>
        </select>
      </td>
      <?php else: ?>
        <td>
          <input type="text" name="<?php echo($directivenf); echo "@"; echo $setting->getLineNum(); ?>" value="<?php echo($value); ?>" size="80" />
        </td>
      <?php endif; ?>
    </tr>
  <?php endif; // end if not alias, scene or usersyn or other multi types ?>
<?php endforeach; ?>
</table>

<!-- end -->

</td>
</tr>

<tr>
  	<td style="border-right:none;" align="left"><a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');">Help</a></td>
    <td style="border-left:none;" align="right">
    <input type="submit" value="<?php echo($lang['save']); ?>" onclick="CallJS('DisplayProgressBar()')" />
    <input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
    </td>
</table>
</form>