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
		if ($action == "add") { addalias($heyuconf); }
		if ($action == "save") { editalias($heyuconf); }
	}

	// start device list
	echo "<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n";
	echo "<tr><td class='td_header' width='70'>$l_code</td>\n";
	echo "<td class='td_header' width='280'>$l_label</td>\n";
	echo "<td class='td_header' width='70'>$l_module</td>\n";
	echo "<td class='td_header' width='70'>$l_type</td>\n";
	echo "<td class='td_header' colspan='2' width='100'>$l_actions</td></tr>\n";
	foreach (getfile($heyuconf) as $line_num => $line) {
		if (substr($line, 0, 5) == "ALIAS") {
			list($alias, $label, $code, $module_type) = split(" ", $line, 4);
			list($module, $type) = split(" # ", $module_type, 2);
			echo "<tr>\n<td class='td_center'>".$code."</td>\n";
			echo "<td>".$label."</td>\n";
			echo "<td class='td_center'>".$module."</td>\n";
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
		$contents = getfile($heyuconf);
		list($alias, $label, $code, $module_type) = split(" ", $contents[$editline], 4);
		list($module, $type) = split(" # ", $module_type, 2);
		echo "<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>";
		echo "<input type='hidden' name='line' value='$editline' / >";
	}
	else { // if not, add "add" form header
		echo "<h1>$l_head_aladd</h1>\n\n";
		$code = null; $label = null; $type = null; $comment = null;
		echo "<form action='".$_SERVER['PHP_SELF']."?action=add' method='post'>";
	}

	// display text fields, empty or with values if editing
	echo "$l_code: <input type='text' name='code' value='$code' /><br />\n";
	echo "$l_label: <input type='text' name='label' value='$label' /><br />\n";
	echo "$l_module: <select name='module'>\n";
	foreach (getfile($modulefile) as $modulenf) {
		$modulef = rtrim($modulenf);
		if ($module == $modulef) {
			echo "<option selected value='$modulef'>$modulef</option>\n";
		} else {
			echo "<option value='$modulef'>$modulef</option>\n";
		}
	}
	echo "</select><br />\n";
	echo "Type: <select name='type'>\n";
	foreach (getfile($typefile) as $typenf) {
		$typef = rtrim($typenf);
		if (rtrim($type) == $typef) {
			echo "<option selected value='$typef'>$typef</option>\n";
		} else {
			echo "<option value='$typef'>$typef</option>\n";
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