<?php
include ('functions.php');
// includes have to be in this order due to start and end of div id content
include ('header.php');
include ('menu.php');

// start <div id=content>
echo "<h1>Error</h1>";
echo "<div id='centered'>";
echo "<b>".stripslashes($_GET["msg"])."</b>";
echo "</div>";
// end <div id=content>

include ('footer.php');
?>
