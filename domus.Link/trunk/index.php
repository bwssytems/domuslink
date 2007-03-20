<?php

if (!isset($_COOKIE["dluser"])) {
	header("Location: login.php");
}
else
{
	include ('functions.php');
	include ('header.php');
	include ('menu.php');
	// start <div id=content>
	echo "<h1>$l_head_ctrlp</h1>";

	if ($_GET) { // if postback
		execheyucmd($heyuexec);
	}

	// start device list
	echo "<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n";
	echo "<tr><td class='td_header' width='70'>$l_device</td>\n";
	echo "<td class='td_header' width='300'>$l_description</td>\n";
	echo "<td class='td_header' width='70'>$l_type</td>\n";
	echo "<td class='td_header' colspan='2' width='100'>$l_actions</td></tr>\n";
	foreach (getfile($devicefile) as $line_num => $line) {
		list($code, $desc, $type) = split("##", $line, 3);
		//$typeformated = rtrim($type, "\n");
		$typeformated = substr($type, 0, -3);
		echo "<tr>\n";
		echo "<td class='td_center'>".$code."</td>\n";
		echo "<td>".$desc."</td>\n";
		echo "<td class='td_center'>".$typeformated."</td>\n";
		if (checkonstate($code, $heyuexec) == "1") {
			echo "<td class='td_linkACTIVE'>ON</td>\n";
			echo "<td class='td_link'><a href='".$_SERVER['PHP_SELF']."?action=off&device=$code'>OFF</a></td>\n";
		}
		else {
			echo "<td class='td_link'><a href='".$_SERVER['PHP_SELF']."?action=on&device=$code'>ON</a></td>\n";
			echo "<td class='td_linkACTIVE'><a href='".$_SERVER['PHP_SELF']."?action=off&device=$code'>OFF</a></td>\n";
		}
		echo "</tr>\n";
	}
	echo "</table>\n";
	// end device list

	// end <div id=content>
	include ('footer.php');
}

?>