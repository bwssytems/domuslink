<?php

require('config.inc.php');

include ('header.php');
include ('menu.php');

if ($_POST['txtPassword'] != $password) {

	// Start div id=content
	echo "<h1>Login</h1>";

	if ($_POST['txtPassword'] == "" ) {
		echo "<br>Please enter password in text box and click on login!<br><br>\n";
	}
	elseif ($_POST['txtPassword'] != "" ) {
		echo "<br>Wrong password, please try again!<br><br>\n";
	}

	?>

	<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p><label for="txtpassword">Password:</label>
		<br /><input type="password" title="Enter your password" name="txtPassword" /></p>
		<p><input type="submit" name="Submit" value="Login" /></p>
	</form>

	<?php

	include ('footer.php');
	// End div id=content
}
else {
	setcookie("dluser", "admin", 0);
	header("Location: index.php");
}

?>
