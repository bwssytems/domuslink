<h1><?=$lang['frontendadmin'];?></h1>

<form action="<?=$_SERVER['PHP_SELF'];?>?action=save" method="post">
<!-- HeyuConf -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['heyuconfile'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="heyuconf" value="<?=$config['heyuconf'];?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['heyuconfile_txt'];?></td>
  </tr>
</table>
<br />
<!-- Heyu Exec -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['heyuexec'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="heyuexec" value="<?=$config['heyuexec'];?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['heyuexec_txt'];?></td>
  </tr>
</table>
<br />
<!-- Password -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['password'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="password" value="<?=$config['password'];?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['password_txt'];?></td>
  </tr>
</table>
<br />
<!-- Language -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
   <td colspan="3"><h2><?=$lang['language'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <!-- Language dropdown -->
    <? $files = list_dir_content(LANG_FILE_LOCATION); $found = false; ?>
    <select name='lang'>
    <? foreach ($files as $file): ?>
     <? $name = substr($file, 0, -4);  // remove file extension ?>
	 <? if ($name == $config['lang']): ?>
	   <option selected value="<?=$name;?>"><?=$name;?></option>
	   <? $found = true; ?>
	 <? else: ?>
	   <option value="<?=$name;?>"><?=$name;?></option>
	 <? endif; ?>
    <? endforeach; ?>
    <? if (!$found): ?>
	  <option selected value="">auto</option>
	<? else: ?>
	  <option value="">auto</option>
	<? endif; ?>
    </select>
    <!-- End language dropdown -->
    </td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['language_txt'];?></td>
  </tr>
</table>
<br />
<!-- URL Path -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['urlpath'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px"><input type="text" name="url_path" value="<?=$config['url_path'];?>" /></td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['urlpath_txt'];?></td>
  </tr>
</table>
<br />
<!-- Theme -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['theme'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <!-- Theme dropdown -->
    <? $subdir = list_dir_content(FULL_THEME_FILE_LOCATION); ?>
    <select name="theme">
    <? foreach ($subdir as $dir): ?>
     <? if ($dir == $config['theme']): ?>
       <option selected value="<?=$dir;?>"><?=$dir;?></option>
     <? else: ?>
       <option value="<?=$dir;?>"><?=$dir;?></option>
     <? endif; ?>
    <? endforeach; ?>
    </select>
    <!-- End theme dropdown -->
    </td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['theme_txt'];?></td>
  </tr>
</table>
<br />
<!-- Images -->
<table cellspacing="4" cellpadding="4" border="0">
  <tr>
    <td colspan="3"><h2><?=$lang['imgs'];?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="150px">
    <!-- Images dropdown -->
    <select name="imgs">
    <? $options = array('ON', 'OFF'); ?>
    <? foreach ($options as $key=>$opt): ?>
     <? if ($opt == $config['imgs']): ?>
       <option selected value="<?=$opt;?>"><?=$opt;?></option>
     <? else: ?>
       <option value="<?=$opt;?>"><?=$opt;?></option>
     <? endif; ?>
    <? endforeach; ?>
    </select>
    <!-- End images dropdown -->
    </td>
    <td width="30px">&nbsp;</td>
    <td width="300px"><?=$lang['imgs_txt'];?></td>
  </tr>
</table>
<br />
<table cellspacing="0" cellpadding="0" border="0" class="tb_buttons">
  <tr>
    <td><input type="submit" value="<?=$lang['save'];?>" /></form></td>
    <td>
      <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
      <input type="submit" value="<?=$lang['cancel'];?>" /></form>
    </td>
  </tr>
</table>