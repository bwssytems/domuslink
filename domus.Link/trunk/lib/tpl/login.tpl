<h1>Login</h1>
<?php if (!isset($_POST['txtPassword'])): ?>
	Please enter your password below.<br><br>
<?php elseif ($_POST['txtPassword'] != "" ): ?>
	Your password does not match, please try again.<br><br>
<?php endif; ?>

<form name="form" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>">
<p><label for="txtpassword">Password:</label>
<input type="hidden" name="from" value="<?php $_GET['from'];?>" />
<input type="password" name="txtPassword" />
<input type="submit" name="Submit" value="Login" /></p>
</form>