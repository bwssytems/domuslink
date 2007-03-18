<?php

if (!isset($_COOKIE["dluser"])) {
	header("Location: login.php");
}
else
{
	include('header.php');
	include('menu.php');
	// start <div id=content>
	echo "<div id='head1'>$l_head_ctrlp</div>";

	// end <div id=content>
	include('footer.php');
}

?>