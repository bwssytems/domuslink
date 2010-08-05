<script language="JavaScript" type="text/javascript">
window.onload=toggle;
function toggle() {
var supportopt=document.getElementById("rcs_support").value
   if (supportopt=="OFF") {
      document.getElementById("rcs_housecode").disabled=true;
      document.getElementById("rcs_decode").disabled=true;
   }
   if (supportopt=="ON") {
      document.getElementById("rcs_housecode").disabled=false;
      document.getElementById("rcs_decode").disabled=false;
   }
}
</script>
<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">

<table cellspacing="0" cellpadding="0" border="0" width="550px" align="center" class="content">
<tr><th><?php echo ($lang['modconfigadmin']); ?></th></tr>
<!-- RCS Config Options -->
<tr>
<td align="center">

<!-- RCS Support -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['rcs_support']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <select name="rcs_support" id="rcs_support" onchange="toggle()">
		<?php $options = array('ON', 'OFF'); ?>
		<?php foreach ($options as $key=>$opt): ?>
			<?php if ($opt == $config['rcs_support']): ?>
				<option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
			<?php else: ?>
				<option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
    </select>
    </td>
    <td><?php echo ($lang['rcs_support_txt']); ?></td>
  </tr>

<!-- RCS Default House Code -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['rcs_housecode']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <!-- RCS Default House Code Dropdown -->
    <select name="rcs_housecode" id="rcs_housecode">
    <?php $options = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'); ?>
    <?php foreach ($options as $key=>$opt): ?>
     <?php if ($opt == $config['rcs_housecode']): ?>
       <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php else: ?>
       <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php endif; ?>
    <?php endforeach; ?>
    </select>
    <!-- End dropdown -->
    </td>
    <td><?php echo ($lang['rcs_housecode_txt']); ?></td>
  </tr>

<!-- RCS Decode Table -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['rcs_decode']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <select name="rcs_decode" id="rcs_decode">
<?php $options = array('P', 'B', 'L'); ?>
    <?php foreach ($options as $key=>$opt): ?>
     <?php if ($opt == $config['rcs_decode']): ?>
       <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php else: ?>
       <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php endif; ?>
    <?php endforeach; ?>
    </select>
    </td>
    <td><?php echo ($lang['rcs_decode_txt']); ?></td>
  </tr>
</table>

</td>
</tr>
<!-- End RCS Config Options -->
<tr>
    <td align="center">
    <input type="submit" value="<?php echo ($lang['save']); ?>" />
    <input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
    </td>
</tr>
</table>
</form>
