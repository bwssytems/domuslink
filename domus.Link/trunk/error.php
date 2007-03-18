<?php
include ('functions.php');
// includes have to be in this order due to start and end of div id content
include ('header.php');
include ('menu.php');

$file = $_GET["file"];
$msg = $_GET["msg"];

// start <div id=content>
echo "<div id='head1'>Error</div>";
echo "<div id='centered'>";
if ($msg == "nread") {
	echo "<b>$file dosen't seem to exist!</b><br>";
	echo "Check config.inc.php if path is correct.";
}
if ($msg == "nwrite") {
	echo "<b>$file is not writable!</b><br><br>";
	echo "Check that all files within db/ directory are chmod 755.";
}
echo "</div>";
// end <div id=content>

include ('footer.php');
?>
