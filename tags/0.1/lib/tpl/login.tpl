<h1>Login</h1>
<? if (!isset($_POST['txtPassword'])): ?>
	Please enter your password below.<br><br>
<? elseif ($_POST['txtPassword'] != "" ): ?>
	Your password does not match, please try again.<br><br>
<? endif; ?>

<form name="form" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<p><label for="txtpassword">Password:</label>
<input type="hidden" name="from" value="<?=$_GET['from'];?>" />
<input type="password" name="txtPassword" />
<input type="submit" name="Submit" value="Login" /></p>
</form>