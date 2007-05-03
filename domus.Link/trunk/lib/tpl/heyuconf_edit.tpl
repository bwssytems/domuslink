<h1>Heyu Configuration</h1>
<table border="0" cellspacing="2" cellpadding="2" align="center">
<form action="<?=$_SERVER['PHP_SELF'];?>?action=save" method="post">

<?php $act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts ?>
<?php foreach($settings as $setting): ?>
  <? list($directivenf, $valuenf) = split(" ", $setting, 2);
  $value = rtrim($valuenf, "\n");
  $directive = str_replace("_", " ", $directivenf); ?>

  <?php if ($directive == "ALIAS"): ?>
  <input type="hidden" name="<?=$directivenf;?><?=$act;?>" value="<?=$value;?>" />
  <?php $act++; ?>
  <?php elseif ($directive == "SCENE"): ?>
    <input type="hidden" name="<?=$directivenf;?><?=$act;?>" value="<?=$value;?>" />
    <?php $sct++; ?>
  <?php elseif ($directive == "USERSYN"): ?>
    <input type="hidden" name="<?=$directivenf;?><?=$act;?>" value="<?=$value;?>" />
    <?php $usct++; ?>
  <? else: // if not alias, scene or usersyn ?>
    <tr>
      <td width="200">
        <b><?=$directive;?> :&nbsp;</b>
      </td>

    <?php if ($directivenf == "SCRIPT_MODE"): ?>
      <td>
        <select name="<?=$directivenf;?>">
        <?php if ($value == "SCRIPTS"): ?>
          <option selected value='SCRIPTS'>SCRIPTS</option>
          <option value='HEYUHELPER'>HEYUHELPER</option>
        <? else: ?>
          <option value='SCRIPTS'>SCRIPTS</option>
          <option selected value='HEYUHELPER'>HEYUHELPER</option>
        <? endif ?>
        </select>
      </td>
      <?php elseif ($directivenf == "MODE"): ?>
      <td>
        <select name="<?=$directivenf;?>">
          <?php if ($value == "COMPATIBLE"): ?>
            <option selected value="COMPATIBLE">COMPATIBLE</option>
            <option value="HEYU">HEYU</option>
          <? else: ?>
            <option value="COMPATIBLE">COMPATIBLE</option>
            <option selected value="HEYU">HEYU</option>
          <? endif ?>
        </select>
      </td>
      <?php elseif ($directivenf == "COMBINE_EVENTS" || $directivenf == "COMPRESS_MACROS" || $directivenf == "REPL_DELAYED_MACROS" ||
      $directivenf == "WRITE_CHECK_FILES" || $directivenf == "ACK_HAILS" || $directivenf == "AUTOFETCH"): ?>
      <td>
        <select name="<?=$directivenf;?>">
          <?php echo yesnoopt($value); ?>
        </select>
      </td>
      <?php elseif ($directivenf == "DAWN_OPTION" || $directivenf == "DUSK_OPTION"): ?>
      <td>
        <select name="<?=$directivenf;?>">
          <?php echo dawnduskopt($value); ?>
        </select>
      </td>
      <?php else: ?>
        <td>
          <input type="text" name="<?=$directivenf;?>" value="<?=$value;?>" />
        </td>
      <?php endif; ?>
    </tr>
  <? endif; // end if not alias, scene or usersyn ?>
<?php endforeach; ?>

  <tr>
    <td>
      <input type="submit" value="Save Changes" /></form>
    </td>
    <td>
      <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
      <input type="submit" value="Cancel" /></form>
    </td>
  </tr>
</table>