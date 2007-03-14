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
	echo "<table border=0 cellspacing=2 cellpadding=2 align=center>\n";
	echo "<tr><td>$l_device</td><td>$l_description</td><td>$l_type</td><td>$l_actions</td></tr>";
	foreach (getfile($devicefile) as $line_num => $line) {
		list($code, $desc, $type) = split("##", $line, 3);
		$typeformated = substr($type, 0, -3);
		echo "<tr>\n";
		echo "<td>".$code."</td>\n";
		echo "<td>".$desc."</td>\n";
		echo "<td>".$typeformated."</td>\n";
		echo "<td><a href='".$_SERVER['PHP_SELF']."?edit=$line_num'>$l_edit</a> | <a href='".$_SERVER['PHP_SELF']."?del=$line_num'>$l_delete</a> </td>\n";
		echo "</tr>\n";
	}
	echo "</table>\n";
	// end device list

	// start add/edit device
	if ($editline != "") { // if editline has value get values & change form header
		echo "<h1>$l_head_devedit</h1>";
		$devices = getfile($devicefile);
		list($code, $desc, $type) = split("##", $devices[$editline], 3);
		$typeformated = substr($type, 0, -3); // removes end of line char
		echo "<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>";
		echo "<input type=hidden name=line value='$editline' / >";
	}
	else { // if not, add "add" form header
		echo "<h1>$l_head_devadd</h1>";
		$code = null;
		$desc = null;
		$typeformated = null;
		echo "<form action='".$_SERVER['PHP_SELF']."?action=add' method='post'>";
	}

	// display text fields, empty or with values if editing
	echo "$l_device: <input type=text name=device value='$code' / ><br />\n";
	echo "$l_description: <input type=text name=description value='$desc' /><br />\n";
	echo "$l_type: <input type=text name=type value='$typeformated' / ><br />\n";

	if ($editline != "") { // if editline has value change form buttos to "save" & "cancel"
		echo "<input type='submit' value='$l_save' />\n";
		echo "</form>";
		echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>\n";
		echo "<input type='submit' value='$l_cancel' />\n";
		echo "</form>\n";
	}
	else { // if not normal "add" button
		echo "<input type='submit' value='$l_add' />\n";
		echo "</form>\n";
	}

	// end <div id=content>
	include ('footer.php');

}

?>