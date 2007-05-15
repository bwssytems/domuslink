<h2>ADD ALIAS</h2>

<form action="<?=$_SERVER['PHP_SELF'];?>?action=add" method="post">
CODE: <input type="text" name="code" value="" /><br />
LABEL: <input type="text" name="label" value="" /><br />
MODULE: <select name="module">
<?php foreach (load_file(MODULE_FILE_LOCATION) as $modulenf): ?>
  <?php $modulef = rtrim($modulenf); ?>
  <option value="<?=$modulef;?>"><?=$modulef;?></option>
<? endforeach; ?>
</select><br />
TYPE: <select name="type">
<?php foreach (load_file(TYPE_FILE_LOCATION) as $typenf): ?>
  <?php $typef = rtrim($typenf); ?>
  <option value="<?=$typef;?>"><?=$typef;?></option>
<? endforeach; ?>
</select><br />
<input type="submit" value="ADD" />
</form>