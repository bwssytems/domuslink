<?php
include ('header.php');
include ('menu.php');

if ($_POST['txtPassword'] != $password) {

	// Start div id=content
	echo "<h1>$l_login</h1>";
	echo "<div id='centered'>";

	if ($_POST['txtPassword'] == "" ) {
		echo "$l_logintxt<br><br>\n";
	}
	elseif ($_POST['txtPassword'] != "" ) {
		echo "$l_wrongpass<br><br>\n";
	}

?>
	<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p><label for="txtpassword"><?php echo $l_password ?></label>
		<input type="password" name="txtPassword" />
		<input type="submit" name="Submit" value="<?php echo $l_login ?>" /></p>
	</form>
</div>
<?php

	include ('footer.php');
	// End div id=content
}
else {
	setcookie("dluser", "admin", 0);
	header("Location: index.php");
}

?>