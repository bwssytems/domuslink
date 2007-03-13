<?php

if (!isset($_COOKIE["dluser"])) {
	header("Location: login.php");
}
else
{
	include('header.php');
	include('menu.php');
	// Start content
	// End content
	include('footer.php');
}

?>