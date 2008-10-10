<h1><?php echo $header; ?></h1>

<?php
$count = count($modules); // count num of modules
if($count%2): $result=$count+1; endif; // if odd add 1
$nlines = $count/2; // divide by two, which give number of lines in table
$nlinescount = 0; // initialize counter
$i = 0; //initializize counter for array
?>

<table cellpadding="0" border="0" cellspacing="0" width="100%">

<?php while ($nlinescount<$nlines): ?>
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
 <td align="center" width="50%">
  <?php list($code, $label) = split(" ", $modules[$i], 2); $i++; ?>
  <table cellspacing="0" cellpadding="0" border="0">
   <tr>
     <?php if (on_state($code, $config['heyuexec'])): ?>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_left.gif" /></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_irrig_on.gif" /></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_icon_sep.gif" /></td>
       <td width="132px" background="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?php echo label_parse($label, false);?>" class="ctrlbox_label_on"  /></td>
       <td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=off&device=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_switch_on.gif" border="0" /></a></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_right.gif" /></td>
     <?php else: ?>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_left.gif" /></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_irrig_off.gif" /></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_icon_sep.gif" /></td>
       <td width="132px" background="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?php echo label_parse($label, false);?>" class="ctrlbox_label_off"  /></td>
       <td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=on&device=<?php echo $code;?>&page=<?php echo $page; ?>"><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_switch_off.gif" border="0" /></a></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_right.gif" /></td>
     <?php endif; ?>
   </tr>
  </table>
 </td>

 <td align="center" width="50%">
  <?php
  if ($i != $count):
  list($code, $label) = split(" ", $modules[$i], 2); $i++; ?>
  <table cellspacing="0" cellpadding="0" border="0">
   <tr>
     <?php if (on_state($code, $config['heyuexec'])): ?>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_left.gif" /></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_irrig_on.gif" /></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_icon_sep.gif" /></td>
       <td width="132px" background="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?php echo label_parse($label, false);?>" class="ctrlbox_label_on"  /></td>
       <td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=off&device=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_switch_on.gif" border="0" /></a></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_right.gif" /></td>
     <?php else: ?>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_left.gif" /></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_irrig_off.gif" /></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_icon_sep.gif" /></td>
       <td width="132px" background="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="<?php echo label_parse($label, false);?>" class="ctrlbox_label_off"  /></td>
       <td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=on&device=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_switch_off.gif" border="0" /></a></td>
       <td><img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/ctrlbox_right.gif" /></td>
     <?php endif; ?>
   </tr>
  </table>
  <?php endif; ?>
 </td>
</tr>

<?php $nlinescount++; endwhile; ?>

</table>