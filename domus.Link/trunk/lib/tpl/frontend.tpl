<h1>Frontend Administration</h1>

<form action="<?=$_SERVER['PHP_SELF'];?>?action=save" method="post">
heyuconf: <input type="text" name="heyuconf" value="<?=$heyuconf;?>" /><br />
heyuexec: <input type="text" name="heyuexec" value="<?=$heyuexec;?>" /><br />
pass: <input type="text" name="password" value="<?=$password;?>" /><br />

<!-- Language dropdown -->
<? $files = list_dir_content(LANG_FILE_LOCATION); $found = false; ?>
lang: <select name='lang'>
<? foreach ($files as $file): ?>
	<? $name = substr($file, 0, -4);  // remove file extension ?>
	<? if ($name == $lang): ?>
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
<br />
<!-- Theme dropdown -->
<? $subdir = list_dir_content(FULL_THEME_FILE_LOCATION); ?>
theme: <select name="theme">
<? foreach ($subdir as $dir): ?>
	<? if ($dir == $theme): ?>
		<option selected value="<?=$dir;?>"><?=$dir;?></option>
	<? else: ?>
		<option value="<?=$dir;?>"><?=$dir;?></option>
	<? endif; ?>
<? endforeach; ?>
</select>
<!-- End theme dropdown -->
<br />

url_path: <input type="text" name="url_path" value="<?=$url_path;?>" /><br />
<input type='submit' value='Save' />
</form>

<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
<input type="submit" value="Cancel" /></form>