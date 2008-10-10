<h1><?=$header;?></h1>

<?
$count = count($modules); // count num of modules
if($count%2): $result=$count+1; endif; // if odd add 1
$nlines = $count/2; // divide by two, which give number of lines in table
$nlinescount = 0; // initialize counter
$pos = 0; //initializize counter for array
?>

<table cellpadding="0" border="0" cellspacing="0" width="100%">

<? while ($nlinescount<$nlines): // start table line loop ?>

<tr><td colspan="2">&nbsp;</td></tr>
<tr>
  <td align="center" width="50%"><!-- Start Col 1 -->
  <? list($code, $label) = split(" ", $modules[$pos], 2); $pos++; ?>

    <? if (on_state($code, $config['heyuexec'])): // if ON ?>

	<!-- Start ON Table -->
    <table cellspacing="0" cellpadding="0" border="0">
	<tr>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_left.gif" /></td>
	  <td colspan="4" width="225px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_lights_label_on"  /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_right.gif" /></td>
    </tr>
    <tr><td colspan="6"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/1px.gif" height="2px" /></td></tr>
    <tr>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_light_on.gif" /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>

	  <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif">
	  <!-- Start Dimmer Table -->
	  <table cellspacing="0" cellpaddin="0" border="0" class="dimmer">
	   <tr>
	    <td>
	    <? if (dim_level($code, $config['heyuexec']) == "6"): $val = 1; elseif (dim_level($code, $config['heyuexec']) == "5"): $val = 2; else: $val = 3; endif; ?>
	    <a href="<?=$_SERVER['PHP_SELF'];?>?action=dim&device=<?=$code;?>&value=<?=$val;?>&page=<?=$page;?>">
	    <img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_dim.gif" border="0" /></a>
	    </td>
	    <? $dimpercent = dim_level($code, $config['heyuexec']);
	    if ($dimpercent == "100"):
	      $level = 12;
	    elseif ($dimpercent == "0"):
	      $level = floor($dimpercent/12) + 1;
	    elseif ($dimpercent == "2"):
	      $level = floor($dimpercent/12) + 2;
	    elseif ($dimpercent == "5"):
	      $level = floor($dimpercent/12) + 3;
	    else:
	      $level = floor($dimpercent/12) + 4;
	    endif;

	    for ($i = 1; $i < $level; $i++): ?>
	    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_level_<?=$i;?>_on.gif" border="0" /></a></td>
	    <? endfor;
	    for ($i = $level; $i < 12; $i++): ?>
	    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_level_<?=$i;?>_off.gif" /></td>
		<? endfor; ?>
		<? if (dim_level($code, $config['heyuexec']) == "6"): $val = 3; elseif (dim_level($code, $config['heyuexec']) == "5"): $val = 1; elseif (dim_level($code, $config['heyuexec']) == "2"): $val = 2; else: $val = 3; endif; ?>
		<td><a href="<?=$_SERVER['PHP_SELF'];?>?action=bright&device=<?=$code;?>&value=<?=$val;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_bright.gif" border="0" /></a></td>
	   </tr>
	  </table>
	  <!-- End Dimmer Table -->
	  </td>

	  <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_on.gif" border="0" /></a></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
    </tr>
    </table>
    <!-- End ON Table -->

    <? else: // if OFF ?>

	<!-- Start OFF Table -->
	<table cellspacing="0" cellpadding="0" border="0">
	<tr>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_left.gif" /></td>
	  <td colspan="4" width="225px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_lights_label_off"  /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_right.gif" /></td>
    </tr>
    <tr><td colspan="6"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/1px.gif" height="2px" /></td></tr>
    <tr>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_light_off.gif" /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>

	  <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif">
	  <!-- Start Dimmer Table -->
	  <table cellspacing="0" cellpaddin="0" border="0" class="dimmer">
	   <tr>
	    <td>
	    <a href="<?=$_SERVER['PHP_SELF'];?>?action=dim&device=<?=$code;?>&value=3&page=<?=$page;?>">
	    <img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_dim.gif" border="0" /></a>
	    </td>
	    <? for ($i = 1; $i < 12; $i++): ?>
	    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_level_<?=$i;?>_off.gif" /></td>
	    <? endfor; ?>
		<td><a href="<?=$_SERVER['PHP_SELF'];?>?action=bright&device=<?=$code;?>&value=3&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_bright.gif" border="0" /></a></td>
	   </tr>
	  </table>
	  <!-- End Dimmer Table -->
	  </td>

	  <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_off.gif" border="0" /></a></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
	 </tr>

	</table>
	<!-- End OFF Table -->

	<? endif; // end if ON or OFF ?>

  </td>
  <!-- End Col 1 -->



  <!-- Start Col 2 -->
  <td align="center" width="50%">
  <?
  if ($pos != $count):
  list($code, $label) = split(" ", $modules[$pos], 2); $pos++; ?>
    <? if (on_state($code, $config['heyuexec'])): // if ON ?>

	<!-- Start ON Table -->
    <table cellspacing="0" cellpadding="0" border="0">
	<tr>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_left.gif" /></td>
	  <td colspan="4" width="225px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_lights_label_on"  /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_right.gif" /></td>
    </tr>
    <tr><td colspan="6"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/1px.gif" height="2px" /></td></tr>
    <tr>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_light_on.gif" /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>

	  <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif">
	  <!-- Start Dimmer Table -->
	  <table cellspacing="0" cellpaddin="0" border="0" class="dimmer">
	   <tr>
	    <td>
	    <? if (dim_level($code, $config['heyuexec']) == "6"): $val = 1; elseif (dim_level($code, $config['heyuexec']) == "5"): $val = 2; else: $val = 3; endif; ?>
	    <a href="<?=$_SERVER['PHP_SELF'];?>?action=dim&device=<?=$code;?>&value=<?=$val;?>&page=<?=$page;?>">
	    <img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_dim.gif" border="0" /></a>
	    </td>
	    <? $dimpercent = dim_level($code, $config['heyuexec']);
	    if ($dimpercent == "100"):
	      $level = 12;
	    elseif ($dimpercent == "0"):
	      $level = floor($dimpercent/12) + 1;
	    elseif ($dimpercent == "2"):
	      $level = floor($dimpercent/12) + 2;
	    elseif ($dimpercent == "5"):
	      $level = floor($dimpercent/12) + 3;
	    else:
	      $level = floor($dimpercent/12) + 4;
	    endif;

	    for ($i = 1; $i < $level; $i++): ?>
	    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_level_<?=$i;?>_on.gif" border="0" /></a></td>
	    <? endfor;
	    for ($i = $level; $i < 12; $i++): ?>
	    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_level_<?=$i;?>_off.gif" /></td>
		<? endfor; ?>
		<? if (dim_level($code, $config['heyuexec']) == "6"): $val = 3; elseif (dim_level($code, $config['heyuexec']) == "5"): $val = 1; elseif (dim_level($code, $config['heyuexec']) == "2"): $val = 2; else: $val = 3; endif; ?>
		<td><a href="<?=$_SERVER['PHP_SELF'];?>?action=bright&device=<?=$code;?>&value=<?=$val;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_bright.gif" border="0" /></a></td>
	   </tr>
	  </table>
	  <!-- End Dimmer Table -->
	  </td>

	  <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_on.gif" border="0" /></a></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
    </tr>
    </table>
    <!-- End ON Table -->

    <? else: // if OFF ?>

	<!-- Start OFF Table -->
	<table cellspacing="0" cellpadding="0" border="0">
	<tr>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_left.gif" /></td>
	  <td colspan="4" width="225px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_lights_label_off"  /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_lightsheader_right.gif" /></td>
    </tr>
    <tr><td colspan="6"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/1px.gif" height="2px" /></td></tr>
    <tr>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_light_off.gif" /></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>

	  <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif">
	  <!-- Start Dimmer Table -->
	  <table cellspacing="0" cellpaddin="0" border="0" class="dimmer">
	   <tr>
	    <td>
	    <a href="<?=$_SERVER['PHP_SELF'];?>?action=dim&device=<?=$code;?>&value=3&page=<?=$page;?>">
	    <img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_dim.gif" border="0" /></a>
	    </td>
	    <? for ($i = 1; $i < 12; $i++): ?>
	    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_level_<?=$i;?>_off.gif" /></td>
	    <? endfor; ?>
		<td><a href="<?=$_SERVER['PHP_SELF'];?>?action=bright&device=<?=$code;?>&value=3&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/lights_bright.gif" border="0" /></a></td>
	   </tr>
	  </table>
	  <!-- End Dimmer Table -->
	  </td>

	  <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_off.gif" border="0" /></a></td>
	  <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
	 </tr>

	</table>
	<!-- End OFF Table -->

	<? endif; // end if ON or OFF ?>
  <? endif; // if for col count ?>
  </td>
  <!-- End Col 2 -->

</tr>

<? $nlinescount++; endwhile; // end table line loop ?>

</table>
