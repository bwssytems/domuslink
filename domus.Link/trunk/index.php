<?php

if (!isset($_COOKIE["dluser"])) {
	header("Location: login.php");
}
else
{
	include('header.php');
	include('menu.php');
	// start <div id=content>
	echo "<h1>$l_head_ctrlp</h1>";

	// end <div id=content>
	include('footer.php');
}

?>