<?php

if (!isset($_COOKIE["dluser"]))
	header("Location: login.php");
else
{
	//require ('config.inc.php');
	include ('functions.php');

	// includes have to be in this order due to start and end of div id content
	include ('header.php');
	include ('menu.php');
	// start <div id=content>
	echo "<div id='head1'>$l_head_dev</div>";

	if ($_GET) { // if postback
		$deline = $_GET["del"];
		$editline = $_GET["edit"];
		$action = $_GET["action"];

		// actions
		if ($deline != "") { deleteline($deline, $devicefile); }
		if ($action == "add") { adddevice($devicefile); }
		if ($action == "save") { editdevice($devicefile); }
	}

	// start device list
	echo "<table border='0' cellspacing='2' cellpadding='2' align='center'>\n";
	echo "<tr><td class='td_header' width='70'>$l_device</td>\n";
	echo "<td class='td_header' width='300'>$l_description</td>\n";
	echo "<td class='td_header' width='70'>$l_type</td>\n";
	echo "<td class='td_header' colspan='2' width='100'>$l_actions</td></tr>\n";
	foreach (getfile($devicefile) as $line_num => $line) {
		list($code, $desc, $type) = split("##", $line, 3);
		$typeformated = substr($type, 0, -3);
		echo "<tr>\n";
		echo "<td class='td_center'>".$code."</td>\n";
		echo "<td>".$desc."</td>\n";
		echo "<td class='td_center'>".$typeformated."</td>\n";
		echo "<td class='td_link'><a href='".$_SERVER['PHP_SELF']."?edit=$line_num'>$l_edit</a></td>\n";
		echo "<td class='td_link'><a href='".$_SERVER['PHP_SELF']."?del=$line_num'>$l_delete</a></td>\n";
		echo "</tr>\n";
	}
	echo "</table>\n";
	// end device list

	// start add/edit device
	if ($editline != "") { // if editline has value get values & change form header
		echo "<div id='head1'>$l_head_devedit</div>";
		$devices = getfile($devicefile);
		list($code, $desc, $type) = split("##", $devices[$editline], 3);
		$typeformated = substr($type, 0, -3); // removes end of line char
		echo "<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>";
		echo "<input type='hidden' name='line' value='$editline' / >";
	}
	else { // if not, add "add" form header
		echo "<div id='head1'>$l_head_devadd</div>";
		$code = null;
		$desc = null;
		$typeformated = null;
		echo "<form action='".$_SERVER['PHP_SELF']."?action=add' method='post'>";
	}

	// display text fields, empty or with values if editing
	echo "$l_device: <input type='text' name='device' value='$code' /><br />\n";
	echo "$l_description: <input type='text' name='description' value='$desc' /><br />\n";
	echo "$l_type: <input type='text' name='type' value='$typeformated' /><br />\n";

	if ($editline != "") { // if editline has value change form buttos to "save" & "cancel"
		echo "<input type='submit' value='$l_save' /></form>\n";
		echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>\n";
		echo "<input type='submit' value='$l_cancel' /></form>\n";
	}
	else { // if not normal "add" button
		echo "<input type='submit' value='$l_add' /></form>\n";
	}

	// end <div id=content>
	include ('footer.php');

}

?>