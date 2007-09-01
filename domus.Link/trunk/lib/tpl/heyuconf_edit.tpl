<h1><?php echo ($lang['heyuconf']);?></h1>
<table border="0" cellspacing="2" cellpadding="2">
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">

<?php $act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts ?>
<?php foreach($settings as $setting): ?>
  <?php list($directivenf, $valuenf) = split(" ", $setting, 2);
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
        <b><?php echo $directive; ?> :&nbsp;</b>
      </td>

    <?php if ($directivenf == "SCRIPT_MODE"): ?>
      <td>
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
      <td>
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
      <td>
        <select name="<?php echo($directivenf); ?>">
          <?php echo yesnoopt($value); ?>
        </select>
      </td>
      <?php elseif ($directivenf == "DAWN_OPTION" || $directivenf == "DUSK_OPTION"): ?>
      <td>
        <select name="<?php echo($directivenf); ?>">
          <?php echo dawnduskopt($value); ?>
        </select>
      </td>
      <?php else: ?>
        <td>
          <input type="text" name="<?php echo($directivenf); ?>" value="<?php echo($value); ?>" />
        </td>
      <?php endif; ?>
    </tr>
  <?php endif; // end if not alias, scene or usersyn ?>
<?php endforeach; ?>

</table>

<table cellspacing="0" cellpadding="0" border="0" class="tb_buttons">
  <tr>
  	<td align="left"><div id="help"><a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');"><img src="../theme/<?php echo($config['theme']); ?>/images/icon_help.gif" border="0" alt="Help" /></a></div></td>
    <td><input type="submit" value="<?php echo($lang['save']); ?>" /></form></td>
    <td><form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"><input type="submit" value="<?php echo($lang['cancel']); ?>" /></form></td>
  </tr>
</table>