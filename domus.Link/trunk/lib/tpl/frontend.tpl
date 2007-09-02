<h1><?php echo ($lang['frontendadmin']); ?></h1>

<form action="<?php echo ($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<!-- HeyuBase -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['heyubaseloc']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="heyu_base" value="<?php echo ($config['heyu_base']); ?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['heyubaseloc_txt']); ?></td>
  </tr>
</table>
<br />
<!-- HeyuConf -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['heyuconfile']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="heyuconf" value="<?php echo substr($config['heyuconf'], strlen($config['heyu_base'])); ?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['heyuconfile_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Heyu Exec -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['heyuexec']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="heyuexec" value="<?php echo ($config['heyuexec']); ?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['heyuexec_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Password -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['password']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="password" value="<?php echo ($config['password']); ?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['password_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Language -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
   <td colspan="3"><h2><?php echo ($lang['language']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
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
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['language_txt']); ?></td>
  </tr>
</table>
<br />
<!-- URL Path -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['urlpath']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="url_path" value="<?php echo ($config['url_path']); ?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['urlpath_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Theme -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['theme']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
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
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['theme_txt']); ?></td>
  </tr>
</table>
<br />
<!-- Images -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?php echo ($lang['imgs']); ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
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
    <td width="30px">&nbsp;</td>
    <td width="300px"><?php echo ($lang['imgs_txt']); ?></td>
  </tr>
</table>
<br />
<table cellspacing="0" cellpadding="0" border="0" class="tb_buttons">
  <tr>
    <td><input type="submit" value="<?php echo ($lang['save']); ?>" /></form></td>
    <td>
      <form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post">
      <input type="submit" value="<?php echo ($lang['cancel']); ?>" /></form>
    </td>
  </tr>
</table>