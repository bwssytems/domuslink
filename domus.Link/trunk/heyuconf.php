<?php

if (!isset($_COOKIE["dluser"]))
	header("Location: login.php");
else
{
	include ('functions.php');
	include ('header.php');
	include ('menu.php');

	// start <div id=content>
	echo "<h1>$l_hconf</h1>";

	if ($_GET) {
		$action = $_GET["action"];
		if ($action == "save") {
			$i = 0;
			foreach ($_POST as $key => $value) {
				if (substr($key, 0, 5) == "ALIAS")
					$newcontent[$i] = substr($key, 0, 5)." ".$value."\n";
				elseif (substr($key, 0, 5) == "SCENE")
					$newcontent[$i] = substr($key, 0, 5)." ".$value."\n";
				elseif (substr($key, 0, 7) == "USERSYN")
					$newcontent[$i] = substr($key, 0, 7)." ".$value."\n";
				else
					$newcontent[$i] = $key." ".$value."\n";
				$i++;
			}
			writefile($newcontent, $heyuconf);
		}
		if ($action == "edit") {
			edit(getfile($heyuconf));
		}
	}
	else {
		display(getfile($heyuconf));
	}
	// end <div id=content>

	include ('footer.php');
}

function display($content) {
	echo "<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n";
	foreach ($content as $line_num => $line) {
		if (substr($line, 0, 1) != "#" && $line != "\n" && substr($line, 0, 5) != "ALIAS" &&
		substr($line, 0, 5) != "SCENE" && substr($line, 0, 7) != "USERSYN" && $line != " \n") {
			list($directivenf, $valuenf) = split(" ", $line, 2);
			$value = rtrim($valuenf, "\n");
			echo "<tr>\n";
			$directive = str_replace("_", " ", $directivenf); //removes "_"
			echo "<td width='200' class='td_right'><b>".$directive." :&nbsp;</b></td>\n";
			echo "<td width='100'>".$value."</td>\n";
			echo "</tr>\n";
		}
	}

	echo "<tr><td colspan='3'>\n";
	echo "<form action='".$_SERVER['PHP_SELF']."?action=edit' method='post'>\n";
	echo "<input type='submit' value='Edit' class='formbtn' /></form>\n";
	echo "</td></tr>\n";
	echo "</table>\n";
}

function edit($content) {
	echo "<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>";
	echo "<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n";

	$act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts

	foreach ($content as $line_num => $line) {
		list($directivenf, $valuenf) = split(" ", $line, 2);
		$value = rtrim($valuenf, "\n");

		$directive = str_replace("_", " ", $directivenf); //removes "_"
		if ($directive == "ALIAS") {
			echo "<input type='hidden' name='$directivenf$act' value='$value' />\n";
			$act++;
		}
		elseif ($directive == "SCENE") {
			echo "<input type='hidden' name='$directivenf$sct' value='$value' />\n";
			$sct++;
		}
		elseif ($directive == "USERSYN") {
			echo "<input type='hidden' name='$directivenf$usct' value='$value' />\n";
			$usct++;
		}
		else {
			echo "<tr>\n<td width='200' class='td_right'><b>".$directive." :&nbsp;</b></td>\n";

			switch ($directivenf) {
				case "SCRIPT_MODE":
					echo "<td><select name='$directivenf'>\n";
					if ($value == "SCRIPTS") {
						echo "<option selected value='SCRIPTS'>SCRIPTS</option>\n";
						echo "<option value='HEYUHELPER'>HEYUHELPER</option>\n";
					} else {
						echo "<option value='SCRIPTS'>SCRIPTS</option>\n";
						echo "<option selected value='HEYUHELPER'>HEYUHELPER</option>\n";
					}
					echo "</select></td>\n";
					break;

				case "MODE":
					echo "<td><select name='$directivenf'>\n";
					if ($value == "COMPATIBLE") {
						echo "<option selected value='COMPATIBLE'>COMPATIBLE</option>\n";
						echo "<option value='HEYU'>HEYU</option>\n";
					} else {
						echo "<option value='COMPATIBLE'>COMPATIBLE</option>\n";
						echo "<option selected value='HEYU'>HEYU</option>\n";
					}
					echo "</select></td>\n";
					break;

				case "COMBINE_EVENTS":
				case "COMPRESS_MACROS":
				case "REPL_DELAYED_MACROS":;
				case "WRITE_CHECK_FILES":
				case "ACK_HAILS":
				case "AUTOFETCH":
					echo "<td><select name='$directivenf'>\n";
					echo yesnoopt($value);
					echo "</select></td>\n";
					break;

				case "DAWN_OPTION":
				case "DUSK_OPTION":
					echo "<td><select name='$directivenf'>\n";
					echo dawnduskopt($value);
					echo "</select></td>\n";
					break;

				default:
					echo "<td><input type='text' name='$directivenf' value='$value' /></td>\n";
			} // end switch

			echo "</tr>\n";
		} // end else if
	} // end foreach loop

	echo "<tr><td><input type='submit' value='Save Changes' class='formbtn' /></form></td>\n";
	echo "<td><form action='".$_SERVER['PHP_SELF']."' method='post'>\n";
	echo "<input type='submit' value='Cancel' class='formbtn' /></form></td>\n";
	echo "</tr></table>\n";
}

function yesnoopt($value) {
	if ($value == "YES") {
		return "<option selected value='YES'>YES</option>\n" .
				"<option value='NO'>NO</option>\n";
	} else {
		return "<option value='YES'>YES</option>\n" .
				"<option selected value='NO'>NO</option>\n";
	}
}

function dawnduskopt($value) {
	if ($value == "FIRST") {
		return "<option selected value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif ($value == "EARLIEST") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option selected value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif ($value == "LATEST") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option selected value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif ($value == "AVERAGE") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option selected value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif ($value == "MEDIAN") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value=LATEST>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option selected value='MEDIAN'>MEDIAN</option>\n";
	}
}

?>