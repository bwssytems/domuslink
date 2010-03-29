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
<tr><th colspan="2"><?php echo ($lang['frontendadmin']); ?></th></tr>

<tr>
<td align="center" colspan="2">

<!-- Interface -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['pcinterface']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <select name="pc_interface" style="width:100px;">
		<?php $options = array('CM11A', 'CM17A'); ?>
		<?php foreach ($options as $key=>$opt): ?>
			<?php if ($opt == $config['pc_interface']): ?>
				<option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
			<?php else: ?>
				<option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
    </select>
    </td>
    <td width="350px"><?php echo ($lang['pcinterface_txt']); ?></td>
  </tr>
</table>
<br />
<!-- HeyuBase Usage-->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyubaseuse']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <!-- Heyu Base Usage dropdown -->
    <select name="heyu_base_use" style="width:50px;">
    <?php $options = array('NO', 'YES'); ?>
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
    <td width="350px"><?php echo ($lang['heyubaseuse_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Heyu Managment -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyumgmt']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <select name="heyu_subdir" style="width:75px;">
		<?php foreach ($subdirlist as $asubdir): ?>
			<?php if ($asubdir == $config['heyu_subdir']): ?>
				<option selected value="<?php echo $asubdir; ?>"><?php echo $asubdir; ?></option>
			<?php else: ?>
				<option value="<?php echo $asubdir; ?>"><?php echo $asubdir; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
    </select>
    </td>
    <td width="350px"><?php echo ($lang['heyumgmt_txt']); ?></td>
  </tr>
</table>
<!-- HeyuBase -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyubaseloc']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="heyu_base" value="<?php echo ($config['heyu_base']); ?>" /></td>
    <td width="350px"><?php echo ($lang['heyubaseloc_txt']); ?></td>
  </tr>
</table>
<br />
<!-- HeyuConf -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyuconfile']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="heyuconf" value="<?php echo $config['heyuconf']; ?>" /></td>
    <td width="350px"><?php echo ($lang['heyuconfile_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Heyu Exec -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyuexec']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="heyuexec" value="<?php echo ($config['heyuexec']); ?>" /></td>
    <td width="350px"><?php echo ($lang['heyuexec_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Security Level -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['seclevel']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <select name="seclevel" style="width:45px;">
		<?php $options = array('0', '1', '2'); ?>
		<?php foreach ($options as $key=>$opt): ?>
			<?php if ($opt == $config['seclevel']): ?>
				<option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
			<?php else: ?>
				<option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
    </select>
    </td>
    <td width="350px"><?php echo ($lang['seclevel_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Password -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['password']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="password" value="<?php echo ($config['password']); ?>" /></td>
    <td width="350px"><?php echo ($lang['password_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Language -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
   <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['language']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <!-- Language dropdown -->
    <?php $files = list_dir_content(LANG_FILE_LOCATION); $found = false; ?>
    <select name='lang' style="width:100px;">
    <?php foreach ($files as $file): ?>
     <?php $name = substr($file, 0, -4);  // remove file extension ?>
	 <?php if ($name == $config['lang']): ?>
	   <option selected value="<?php echo $name; ?>"><?php echo $name;?></option>
	   <?php $found = true; ?>
	 <?php else: ?>
	   <option value="<?php echo $name;?>"><?php echo $name;?></option>
	 <?php endif; ?>
    <?php endforeach; ?>
    <?php if (!$found): ?>
	  <option selected value="">auto</option>
	<?php else: ?>
	  <option value="">auto</option>
	<?php endif; ?>
    </select>
    <!-- End language dropdown -->
    </td>
    <td width="350px"><?php echo ($lang['language_txt']); ?></td>
  </tr>
</table>
<br />
<!-- URL Path -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['urlpath']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="url_path" value="<?php echo ($config['url_path']); ?>" /></td>
    <td width="350px"><?php echo ($lang['urlpath_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Theme -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['theme']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <!-- Theme dropdown -->
    <?php $subdir = list_dir_content(FULL_THEME_FILE_LOCATION); ?>
    <select name="theme" style="width:75px;">
    <?php foreach ($subdir as $dir): ?>
     <?php if ($dir == $config['theme']): ?>
       <option selected value="<?php echo $dir;?>"><?php echo $dir;?></option>
     <?php else: ?>
       <option value="<?php echo $dir;?>"><?php echo $dir;?></option>
     <?php endif; ?>
    <?php endforeach; ?>
    </select>
    <!-- End theme dropdown -->
    </td>
    <td width="350px"><?php echo ($lang['theme_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Images -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['imgs']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <!-- Images dropdown -->
    <select name="imgs" style="width:50px;">
    <?php $options = array('ON', 'OFF'); ?>
    <?php foreach ($options as $key=>$opt): ?>
     <?php if ($opt == $config['imgs']): ?>
       <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php else: ?>
       <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php endif; ?>
    <?php endforeach; ?>
    </select>
    <!-- End images dropdown -->
    </td>
    <td width="350px"><?php echo ($lang['imgs_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Codes -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['codes']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <!-- Codes dropdown -->
    <select name="codes" style="width:50px;">
    <?php $options = array('ON', 'OFF'); ?>
    <?php foreach ($options as $key=>$opt): ?>
     <?php if ($opt == $config['codes']): ?>
       <option selected value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php else: ?>
       <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
     <?php endif; ?>
    <?php endforeach; ?>
    </select>
    <!-- End Codes dropdown -->
    </td>
    <td width="350px"><?php echo ($lang['codes_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Refresh -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['refresh']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" size="10" name="refresh" value="<?php echo ($config['refresh']); ?>" /></td>
    <td width="350px"><?php echo ($lang['refresh_txt']); ?></td>
  </tr>
</table>

</td>
</tr>

<tr>
    <td style="border-right:none;" align="center">
    <input type="submit" value="<?php echo ($lang['save']); ?>" />
    <input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
    </td>
</tr>
</table>
</form>