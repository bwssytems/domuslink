<h2>EDIT ALIAS</h2>

<?php list($alias, $label, $code, $module_type) = split(" ", $alias, 4); ?>
<?php list($module, $type) = split(" # ", $module_type, 2); ?>
<form action="<?=$_SERVER['PHP_SELF'];?>?action=save" method="post">
<input type="hidden" name="line" value="<?=$linenum;?>" / >

CODE: <input type="text" name="code" value="<?=$code;?>" /><br />
LABEL: <input type="text" name="label" value="<?=$label;?>" /><br />
MODULE: <select name="module">
<?php foreach (load_file(MODULE_FILE_LOCATION) as $modulenf): ?>
  <?php $modulef = rtrim($modulenf); ?>
  <?php if ($module == $modulef): ?>
    <option value="<?=$modulef;?>" selected><?=$modulef;?></option>
  <? else: ?>
    <option value="<?=$modulef;?>"><?=$modulef;?></option>
  <? endif; ?>
<? endforeach; ?>
</select><br />
TYPE: <select name="type">
<?php foreach (load_file(TYPE_FILE_LOCATION) as $typenf): ?>
  <?php $typef = rtrim($typenf); ?>
  <?php if (rtrim($type) == $typef): ?>
    <option value="<?=$typef;?>" selected><?=$typef;?></option>
  <? else: ?>
    <option value="<?=$typef;?>"><?=$typef;?></option>
  <? endif; ?>
<? endforeach; ?>
</select><br />
<input type="submit" value="SAVE" />
</form>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
<input type="submit" value="CANCEL" /></form>