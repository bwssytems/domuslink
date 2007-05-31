<h1><?=$lang['heyuconf'];?></h1>
<table border="0" cellspacing="2" cellpadding="2">
<form action="<?=$_SERVER['PHP_SELF'];?>?action=save" method="post">

<? $act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts ?>
<? foreach($settings as $setting): ?>
  <? list($directivenf, $valuenf) = split(" ", $setting, 2);
  $value = rtrim($valuenf, "\n");
  $directive = str_replace("_", " ", $directivenf); ?>

  <? if ($directive == "ALIAS"): ?>
  <input type="hidden" name="<?=$directivenf;?><?=$act;?>" value="<?=$value;?>" />
  <? $act++; ?>
  <? elseif ($directive == "SCENE"): ?>
    <input type="hidden" name="<?=$directivenf;?><?=$act;?>" value="<?=$value;?>" />
    <? $sct++; ?>
  <? elseif ($directive == "USERSYN"): ?>
    <input type="hidden" name="<?=$directivenf;?><?=$act;?>" value="<?=$value;?>" />
    <? $usct++; ?>
  <? else: // if not alias, scene or usersyn ?>
    <tr>
      <td width="200">
        <b><?=$directive;?> :&nbsp;</b>
      </td>

    <? if ($directivenf == "SCRIPT_MODE"): ?>
      <td>
        <select name="<?=$directivenf;?>">
        <? if ($value == "SCRIPTS"): ?>
          <option selected value='SCRIPTS'>SCRIPTS</option>
          <option value='HEYUHELPER'>HEYUHELPER</option>
        <? else: ?>
          <option value='SCRIPTS'>SCRIPTS</option>
          <option selected value='HEYUHELPER'>HEYUHELPER</option>
        <? endif ?>
        </select>
      </td>
      <? elseif ($directivenf == "MODE"): ?>
      <td>
        <select name="<?=$directivenf;?>">
          <? if ($value == "COMPATIBLE"): ?>
            <option selected value="COMPATIBLE">COMPATIBLE</option>
            <option value="HEYU">HEYU</option>
          <? else: ?>
            <option value="COMPATIBLE">COMPATIBLE</option>
            <option selected value="HEYU">HEYU</option>
          <? endif ?>
        </select>
      </td>
      <? elseif ($directivenf == "COMBINE_EVENTS" || $directivenf == "COMPRESS_MACROS" || $directivenf == "REPL_DELAYED_MACROS" ||
      $directivenf == "WRITE_CHECK_FILES" || $directivenf == "ACK_HAILS" || $directivenf == "AUTOFETCH"): ?>
      <td>
        <select name="<?=$directivenf;?>">
          <? echo yesnoopt($value); ?>
        </select>
      </td>
      <? elseif ($directivenf == "DAWN_OPTION" || $directivenf == "DUSK_OPTION"): ?>
      <td>
        <select name="<?=$directivenf;?>">
          <? echo dawnduskopt($value); ?>
        </select>
      </td>
      <? else: ?>
        <td>
          <input type="text" name="<?=$directivenf;?>" value="<?=$value;?>" />
        </td>
      <? endif; ?>
    </tr>
  <? endif; // end if not alias, scene or usersyn ?>
<? endforeach; ?>

</table>

<table cellspacing="0" cellpadding="0" border="0" class="tb_buttons">
  <tr>
  	<td align="left"><div id="help"><a href="#" onclick="javascript:window.open('../doc/heyuconf.htm','','scrollbars=yes,menubar=no,width=700,height=500,resizable=yes,toolbar=no,location=no,status=no');"><img src="../theme/<?=$config['theme'];?>/images/icon_help.gif" border="0" alt="Help" /></a></div></td>
    <td><input type="submit" value="<?=$lang['save'];?>" /></form></td>
    <td><form action="<?=$_SERVER['PHP_SELF'];?>" method="post"><input type="submit" value="<?=$lang['cancel'];?>" /></form></td>
  </tr>
</table>