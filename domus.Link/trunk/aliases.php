<?php

if (!isset($_COOKIE["dluser"]))
	header("Location: login.php");
else
{
	include ('functions.php');

	// includes have to be in this order due to start and end of div id content
	include ('header.php');
	include ('menu.php');
	// start <div id=content>
	echo "<h1>$l_head_al</h1>\n\n";

	if ($_GET) { // if postback
		$deline = $_GET["del"];
		$editline = $_GET["edit"];
		$action = $_GET["action"];

		// actions
		if ($deline != "") { deleteline($deline, $heyuconf); }
		if ($action == "add") { adddevice($heyuconf); }
		if ($action == "save") { editdevice($heyuconf); }
	}

	// start device list
	echo "<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n";
	echo "<tr><td class='td_header' width='70'>$l_device</td>\n";
	echo "<td class='td_header' width='300'>$l_description</td>\n";
	echo "<td class='td_header' width='70'>$l_type</td>\n";
	echo "<td class='td_header' colspan='2' width='100'>$l_actions</td></tr>\n";
	foreach (getfile($heyuconf) as $line_num => $line) {
		if (substr($line, 0, 5) == "ALIAS") {
			list($n, $desc, $code, $typecomment) = split(" ", $line, 4);
			list($type, $comment) = split(" # ", $typecomment, 2);
			echo "<tr>\n<td class='td_center'>".$code."</td>\n";
			echo "<td>".$desc."</td>\n";
			echo "<td class='td_center'>".$type."</td>\n";
			echo "<td class='td_link'><a href='".$_SERVER['PHP_SELF']."?edit=$line_num'>$l_edit</a></td>\n";
			echo "<td class='td_link'><a href='".$_SERVER['PHP_SELF']."?del=$line_num' onclick=\"return confirm('$l_delete_yn')\">$l_delete</a></td>\n</tr>\n";
		}
	}
	echo "</table>\n";
	// end device list

	// start add/edit device
	if ($editline != "") { // if editline has value get values & change form header
		echo "<h1>$l_head_aledit</h1>\n\n";
		$devices = getfile($heyuconf);
		list($n, $desc, $code, $typecomment) = split(" ", $devices[$editline], 4);
		list($type, $comment) = split(" # ", $typecomment, 2);
		echo "<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>";
		echo "<input type='hidden' name='line' value='$editline' / >";
	}
	else { // if not, add "add" form header
		echo "<h1>$l_head_aladd</h1>\n\n";
		$code = null; $desc = null; $type = null; $comment = null;
		echo "<form action='".$_SERVER['PHP_SELF']."?action=add' method='post'>";
	}

	// display text fields, empty or with values if editing
	echo "$l_device: <input type='text' name='device' value='$code' /><br />\n";
	echo "$l_description: <input type='text' name='description' value='$desc' /><br />\n";
	echo "$l_type: <select name='type'>\n";
	foreach (getfile($typefile) as $typenf) {
		$typef = rtrim($typenf);
		if ($type == $typef) {
			echo "<option selected value='$typef'>$typef</option>\n";
		} else {
			echo "<option value='$typef'>$typef</option>\n";
		}
	}
	echo "</select><br />\n";
	echo "Unit: <select name='unit'>\n";
	foreach (getfile($unitfile) as $unitnf) {
		$unit = rtrim($unitnf);
		if (rtrim($comment) == $unit) {
			echo "<option selected value='$unit'>$unit</option>\n";
		} else {
			echo "<option value='$unit'>$unit</option>\n";
		}
	}
	echo "</select><br />\n";

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