<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	alert( "After changing Heyu Configuration Select, YOU MUST STOP AND START HEYU.");

  return true ;
}
//-->
</script>
<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" width="550px" align="center" class="content">
<tr><th><?php echo ($lang['modconfigadmin']); ?></th></tr>

<tr>
<td align="center">

<!-- Interface -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['hvacsupport']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <select name="hvacsupport">
		<?php $options = array('ON', 'OFF'); ?>
		<?php foreach ($options as $key=>$opt): ?>
			<?php if ($opt == $config['pc_interface']): ?>
				<option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
			<?php else: ?>
				<option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
    </select>
    </td>
    <td><?php echo ($lang['hvacsupport_txt']); ?></td>
  </tr>

<!-- HeyuBase Usage-->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['hvacdefcode']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <!-- Heyu Base Usage dropdown -->
    <select name="heyu_base_use">
    <?php $options = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'); ?>
    <?php foreach ($options as $key=>$opt): ?>
     <?php if ($opt == $config['heyu_base_use']): ?>
       <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php else: ?>
       <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php endif; ?>
    <?php endforeach; ?>
    </select>
    <!-- End dropdown -->
    </td>
    <td><?php echo ($lang['hvacdefcode_txt']); ?></td>
  </tr>

<!-- Heyu Managment -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['hvacdecode']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <select name="rcs_decode">
<?php $options = array('P', 'B', 'L'); ?>
    <?php foreach ($options as $key=>$opt): ?>
     <?php if ($opt == $config['heyu_base_use']): ?>
       <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php else: ?>
       <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php endif; ?>
    <?php endforeach; ?>
    </select>
    </td>
    <td><?php echo ($lang['hvacdecode_txt']); ?></td>
  </tr>
</table>

</td>
</tr>

<tr>
    <td align="center">
    <input type="submit" value="<?php echo ($lang['save']); ?>" />
    <input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
    </td>
</tr>
</table>
</form>
