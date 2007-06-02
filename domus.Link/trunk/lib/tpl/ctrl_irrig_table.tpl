<h1><?=$header;?></h1>

<?
$count = count($modules); // count num of modules
if($count%2): $result=$count+1; endif; // if odd add 1
$nlines = $count/2; // divide by two, which give number of lines in table
$nlinescount = 0; // initialize counter
$i = 0; //initializize counter for array
?>

<table cellpadding="0" border="0" cellspacing="0" width="100%">

<? while ($nlinescount<$nlines): ?>
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
 <td align="center" width="50%">
  <? list($code, $label) = split(" ", $modules[$i], 2); $i++; ?>
  <table cellspacing="0" cellpadding="0" border="0">
   <tr>
     <? if (on_state($code, $config['heyuexec'])): ?>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_irrig_on.gif" /></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>
       <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_label_on"  /></td>
       <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_on.gif" border="0" /></a></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
     <? else: ?>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_irrig_off.gif" /></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>
       <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_label_off"  /></td>
       <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_off.gif" border="0" /></a></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
     <? endif; ?>
   </tr>
  </table>
 </td>

 <td align="center" width="50%">
  <?
  if ($i != $count):
  list($code, $label) = split(" ", $modules[$i], 2); $i++; ?>
  <table cellspacing="0" cellpadding="0" border="0">
   <tr>
     <? if (on_state($code, $config['heyuexec'])): ?>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_irrig_on.gif" /></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>
       <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_label_on"  /></td>
       <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_on.gif" border="0" /></a></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
     <? else: ?>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_irrig_off.gif" /></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>
       <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_label_off"  /></td>
       <td><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_off.gif" border="0" /></a></td>
       <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
     <? endif; ?>
   </tr>
  </table>
  <? endif; ?>
 </td>
</tr>

<? $nlinescount++; endwhile; ?>

</table>