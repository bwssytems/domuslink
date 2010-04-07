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
<tr><th><?php echo ($lang['frontendadmin']); ?></th></tr>

<tr>
<td align="center">

<!-- Interface -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['pcinterface']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <select name="pc_interface">
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
    <td><?php echo ($lang['pcinterface_txt']); ?></td>
  </tr>

<!-- HeyuBase Usage-->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyubaseuse']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <!-- Heyu Base Usage dropdown -->
    <select name="heyu_base_use">
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
    <td><?php echo ($lang['heyubaseuse_txt']); ?></td>
  </tr>

<!-- Heyu Managment -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyumgmt']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <select name="heyu_subdir">
		<?php foreach ($subdirlist as $asubdir): ?>
			<?php if ($asubdir == $config['heyu_subdir']): ?>
				<option selected value="<?php echo $asubdir; ?>"><?php echo $asubdir; ?></option>
			<?php else: ?>
				<option value="<?php echo $asubdir; ?>"><?php echo $asubdir; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
    </select>
    </td>
    <td><?php echo ($lang['heyumgmt_txt']); ?></td>
  </tr>

<!-- HeyuBase -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyubaseloc']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top"><input type="text" name="heyu_base" value="<?php echo ($config['heyu_base']); ?>" /></td>
    <td><?php echo ($lang['heyubaseloc_txt']); ?></td>
  </tr>

<!-- HeyuConf -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyuconfile']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top"><input type="text" name="heyuconf" value="<?php echo $config['heyuconf']; ?>" /></td>
    <td><?php echo ($lang['heyuconfile_txt']); ?></td>
  </tr>

<!-- Heyu Exec -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['heyuexec']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top"><input type="text" name="heyuexec" value="<?php echo ($config['heyuexec']); ?>" /></td>
    <td><?php echo ($lang['heyuexec_txt']); ?></td>
  </tr>

<!-- Security Level -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['seclevel']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <select name="seclevel">
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
    <td><?php echo ($lang['seclevel_txt']); ?></td>
  </tr>

<!-- Password -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['password']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top"><input type="text" name="password" value="<?php echo ($config['password']); ?>" /></td>
    <td><?php echo ($lang['password_txt']); ?></td>
  </tr>

<!-- Language -->
<tr><td></td></tr>
  <tr>
   <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['language']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <!-- Language dropdown -->
    <?php $files = list_dir_content(LANG_FILE_LOCATION); $found = false; ?>
    <select name='lang'>
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
    <td><?php echo ($lang['language_txt']); ?></td>
  </tr>

<!-- URL Path -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['urlpath']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top"><input type="text" name="url_path" value="<?php echo ($config['url_path']); ?>" /></td>
    <td><?php echo ($lang['urlpath_txt']); ?></td>
  </tr>

<!-- Theme -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['theme']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <!-- Theme dropdown -->
    <?php $subdir = list_dir_content(FULL_THEME_FILE_LOCATION); ?>
    <select name="theme">
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
    <td><?php echo ($lang['theme_txt']); ?></td>
  </tr>

<!-- Images -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['imgs']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <!-- Images dropdown -->
    <select name="imgs">
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
    <td><?php echo ($lang['imgs_txt']); ?></td>
  </tr>

<!-- Codes -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['codes']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top">
    <!-- Codes dropdown -->
    <select name="codes">
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
    <td><?php echo ($lang['codes_txt']); ?></td>
  </tr>

<!-- Refresh -->
<tr><td></td></tr>
  <tr>
    <td colspan="2" style="border-bottom:1px dotted #ccc;"><h6><?php echo ($lang['refresh']); ?></h6></td>
  </tr>
  <tr>
    <td valign="top"><input type="text" size="10" name="refresh" value="<?php echo ($config['refresh']); ?>" /></td>
    <td><?php echo ($lang['refresh_txt']); ?></td>
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