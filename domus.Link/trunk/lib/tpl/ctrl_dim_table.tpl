<h1><?=$header;?></h1>

<table cellpadding="3" cellspacing="1" border="1">
  <tr>
    <td>Label</td>
    <td colspan="3">Actions</td>
  </tr>

  <?
  foreach($modules as $module):
  list($code, $label) = split(" ", $module, 2);
  if (state_check($code, "/usr/local/bin/heyu") == "1"): $AA = "1"; else: $AA = "0"; endif;
  //$x = "2";
  //if($x%2): $AAb = "odd"; else: $AAb ="even"; endif;
  ?>
  <tr>
    <td><?=$AA;?><?=$label;?></td>
    <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>">ON</a></td>
    <td>
      <table cellspacing="0" cellpadding="0" border="1">
       <tr>
        <?
        /*
        #say dimvalue = 12 50%
        $dimvalue = get_dim_level($code, "/usr/local/bin/heyu");
        #if even do nothin if odd add one
        if($dimvalue%2): $dimvalue++; endif;
        $level = $dimvalue/2; #so if $dimlevel initially 12, now $level is 6 (half way)
        #now two for loops, one that goes up to 6 (inclusive) for ON status ($action=dim)
        #and the other from 7-11 OFF status ($action=bright)
        for ($i = 0; $i = $level; $i++):
        ...html...
        endfor;
        for ($i = $level; $i = 11; $i++):
        ...html...
        endfor;
        */
        ?>
        <td class="dim_on"><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>">&nbsp;</a></td>
        <td class="dim_off">2</td>
        <td class="dim_off">3</td>
        <td class="dim_off">4</td>
        <td class="dim_off">5</td>
        <td class="dim_off">6</td>
        <td class="dim_off">7</td>
        <td class="dim_off">8</td>
        <td class="dim_off">9</td>
        <td class="dim_off">10</td>
        <td class="dim_off">11</td>
       </tr>
      </table>
    </td>
    <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>">OFF</a></td>
  </tr>
  <? endforeach; ?>
</table>