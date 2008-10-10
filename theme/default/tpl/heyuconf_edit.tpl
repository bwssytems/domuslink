<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">

<table cellspacing="0" cellpadding="0" border="0" width="400px" align="middle" class="content">
<tr><th colspan="3"><?php echo ($lang['heyuconf']);?></th></tr>

<tr>
<td align="center" colspan="3">

<!-- start -->

<table border="0" cellspacing="0" cellpadding="0" class="clear">
<?php $act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts ?>
<?php foreach($settings as $setting):
  list($directivenf, $valuenf) = split(" ", $setting, 2);
  $value = rtrim($valuenf, "\n");
  $directive = str_replace("_", " ", $directivenf); ?>

  <?php if ($directive == "ALIAS"): ?>
  <input type="hidden" name="<?php echo $directivenf; echo $act; ?>" value="<?php echo $value; ?>" />
  <?php $act++; ?>
  <?php elseif ($directive == "SCENE"): ?>
    <input type="hidden" name="<?php echo $directivenf; echo $act; ?>" value="<?php echo $value; ?>" />
    <?php $sct++; ?>
  <?php elseif ($directive == "USERSYN"): ?>
    <input type="hidden" name="<?php echo $directivenf; echo $act; ?>" value="<?php echo $value; ?>" />
    <?php $usct++; ?>
  <?php else: // if not alias, scene or usersyn ?>
    <tr>
      <td width="200">
        <h6><?php echo $directive; ?>:&nbsp;</h6>
      </td>

    <?php if ($directivenf == "SCRIPT_MODE"): ?>
      <td width="120">
        <select name="<?php echo($directivenf); ?>">
        <?php if ($value == "SCRIPTS"): ?>
          <option selected value='SCRIPTS'>SCRIPTS</option>
          <option value='HEYUHELPER'>HEYUHELPER</option>
        <?php else: ?>
          <option value='SCRIPTS'>SCRIPTS</option>
          <option selected value='HEYUHELPER'>HEYUHELPER</option>
        <?php endif ?>
        </select>
      </td>
      <?php elseif ($directivenf == "MODE"): ?>
      <td width="120">
        <select name="<?php echo($directivenf); ?>">
          <?php if ($value == "COMPATIBLE"): ?>
            <option selected value="COMPATIBLE">COMPATIBLE</option>
            <option value="HEYU">HEYU</option>
          <?php else: ?>
            <option value="COMPATIBLE">COMPATIBLE</option>
            <option selected value="HEYU">HEYU</option>
          <?php endif ?>
        </select>
      </td>
      <?php elseif ($directivenf == "COMBINE_EVENTS" || $directivenf == "COMPRESS_MACROS" || $directivenf == "REPL_DELAYED_MACROS" ||
      $directivenf == "WRITE_CHECK_FILES" || $directivenf == "ACK_HAILS" || $directivenf == "AUTOFETCH"): ?>
      <td width="120">
        <select name="<?php echo($directivenf); ?>">
          <?php echo yesnoopt($value); ?>
        </select>
      </td>
      <?php elseif ($directivenf == "DAWN_OPTION" || $directivenf == "DUSK_OPTION"): ?>
      <td width="120">
        <select name="<?php echo($directivenf); ?>">
          <?php echo dawnduskopt($value); ?>
        </select>
      </td>
      <?php else: ?>
        <td width="120">
          <input type="text" name="<?php echo($directivenf); ?>" value="<?php echo($value); ?>" size="15" />
        </td>
      <?php endif; ?>
    </tr>
  <?php endif; // end if not alias, scene or usersyn ?>
<?php endforeach; ?>
</table>

<!-- end -->

</td>
</tr>

<tr>
  	<td style="border-right:none;" align="left" width="20px"><a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');">Help</a></div></td>
    <td style="border-left:none;border-right:none;" align="right"><input type="submit" value="<?php echo($lang['save']); ?>" /></form></td>
    <td style="border-left:none;"><form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"><input type="submit" value="<?php echo($lang['cancel']); ?>" /></form></td>
</tr>
</table>