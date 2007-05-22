<h1><?=$header;?></h1>

<?
$count = count($modules); // count num of modules
if($count%2): $result=$count+1; endif; // if odd add 1
$nlines = $count/2; // divide by two, which give number of lines in table
$nlinescount = 0; // initialize counter
$i = 0; //initializize counter for array
?>

<table cellpadding="5" border="0" cellspacing="10" width="100%">

<? while ($nlinescount<$nlines): ?>

<tr>
 <td align="center" width="50%">
  <? list($code, $label) = split(" ", $modules[$i], 2); $i++; ?>
  <table cellspacing="0" cellpadding="0" border="0">
   <tr>
    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
    <td><? if (on_state($code, $config['heyuexec'])): ?><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_app_on.gif" /><? else: ?><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_app_off.gif" /><? endif; ?></td>
    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>
    <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_label"  /></td>
    <td><? if (on_state($code, $config['heyuexec'])): ?><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_on.gif" border="0" /></a><? else: ?><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_off.gif" border="0" /></a><? endif; ?></td>
    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
   </tr>
  </table>
 </td>

 <td align="center" width="50%">
  <?
  if ($i != $count):
  list($code, $label) = split(" ", $modules[$i], 2); $i++; ?>
  <table cellspacing="0" cellpadding="0" border="0">
   <tr>
    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_left.gif" /></td>
    <td><? if (on_state($code, $config['heyuexec'])): ?><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_app_on.gif" /><? else: ?><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_app_off.gif" /><? endif; ?></td>
    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_icon_sep.gif" /></td>
    <td width="132px" background="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?=label_parse($label, false);?>" class="ctrlbox_label"  /></td>
    <td><? if (on_state($code, $config['heyuexec'])): ?><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_on.gif" border="0" /></a><? else: ?><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_switch_off.gif" border="0" /></a><? endif; ?></td>
    <td><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/ctrlbox_right.gif" /></td>
   </tr>
  </table>
  <? endif; ?>
 </td>
</tr>

<? $nlinescount++; endwhile; ?>

</table>