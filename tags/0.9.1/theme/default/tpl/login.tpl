<form name="form" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>">

<table cellspacing="0" cellpadding="0" border="0" width="450px" align="middle" class="content">
<tr><th><?php echo ($lang['login']); ?></th></tr>

<tr><td align="center">
<?php if ($_GET['failed'] == "true"): ?><font color="#CB7B7A"><?php echo ($lang['error_wrong_pass']); ?></font><br><?php endif; ?>
<?php if (!isset($_POST['password'])): ?><?php echo ($lang['enter_password']); ?><?php endif; ?>
<br /><br />
<?php echo($lang['password']);?>:<br><input type="hidden" name="from" value="<?php if ($_GET) echo ($_GET['from']); ?>" />
<input type="password" name="password" />
</td></tr>

<tr><td align="center">
<input type="submit" name="Submit" value="<?php echo($lang['login']);?>" />
</td></tr>
</table>
</form>