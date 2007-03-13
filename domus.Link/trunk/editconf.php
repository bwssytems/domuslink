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
	if ($_GET) {
		$action = $_GET["action"];
		if ($action=="save") {
			$newcontent = array(
				'TTY '.$_POST["TTY"]."\n",
				'HOUSECODE '.$_POST["HOUSECODE"]."\n",
				'SCRIPT_MODE '.$_POST["SCRIPT_MODE"]."\n",
				'SCHEDULE_FILE '.$_POST["SCHEDULE_FILE"]."\n",
				'MODE '.$_POST["MODE"]."\n",
				'PROGRAM_DAYS '.$_POST["PROGRAM_DAYS"]."\n",
				'COMBINE_EVENTS '.$_POST["COMBINE_EVENTS"]."\n",
				'COMPRESS_MACROS '.$_POST["COMPRESS_MACROS"]."\n",
				'LONGITUDE '.$_POST["LONGITUDE"]."\n",
				'LATITUDE '.$_POST["LATITUDE"]."\n",
				'DAWN_OPTION '.$_POST["DAWN_OPTION"]."\n",
				'DUSK_OPTION '.$_POST["DUSK_OPTION"]."\n",
				'MIN_DAWN '.$_POST["MIN_DAWN"]."\n",
				'MAX_DAWN '.$_POST["MAX_DAWN"]."\n",
				'MIN_DUSK '.$_POST["MIN_DUSK"]."\n",
				'MAX_DUSK '.$_POST["MAX_DUSK"]."\n",
				'REPL_DELAYED_MACROS '.$_POST["REPL_DELAYED_MACROS"]."\n",
				'WRITE_CHECK_FILES '.$_POST["WRITE_CHECK_FILES"]."\n"
			);
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

	// heyu.conf settings list
	echo "<table border=0 cellspacing=0 cellpadding=0>\n";
	foreach ($content as $line_num => $line) {
		list($directive, $valuenf) = split(" ", $line, 2);
		$value = substr($valuenf, 0, -1); // removes end of line char
		echo "<tr>\n";
		echo "<td><b>".$directive."</b></td>\n";
		echo "<td>&nbsp;</td>";
		echo "<td>".$value."</td>\n";
		echo "</tr>\n";
		//echo "<tr><td height=5 colspan=3></td></tr>\n";
		//echo "<tr><td height=1 bgcolor=#000000 colspan=3></td></tr>\n";
		//echo "<tr><td height=5 colspan=3></td></tr>\n";
	}
	echo "</table>\n";

	echo "<form action='".$_SERVER['PHP_SELF']."?action=edit' method='post'>\n";
	echo "<input type='submit' value='Edit' />\n";
	echo "</form>";
}

function edit($content) {
	echo "<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>";
	echo "<table border=0 cellspacing=0 cellpadding=0>\n";

	foreach ($content as $line_num => $line) {
		list($directive, $valuenf) = split(" ", $line, 2);
		$value = substr($valuenf, 0, -1); // removes end of line char
		echo "<tr>\n";
		echo "<td><b>".$directive."</b></td>\n";
		echo "<td>&nbsp;</td>\n";

		switch ($directive) {
			case "SCRIPT_MODE":
				echo "<td><select name=".$directive.">\n";
				if ($value == "SCRIPTS") {
					echo "<option selected value=SCRIPTS>SCRIPTS</option>\n";
					echo "<option value=HEYUHELPER>HEYUHELPER</option>\n";
				} else {
					echo "<option value=SCRIPTS>SCRIPTS</option>\n";
					echo "<option selected value=HEYUHELPER>HEYUHELPER</option>\n";
				}
				echo "</select></td>\n";
				break;

			case "MODE":
				echo "<td><select name=".$directive.">\n";
				if ($value == "COMPATIBLE") {
					echo "<option selected value=COMPATIBLE>COMPATIBLE</option>\n";
					echo "<option value=HEYU>HEYU</option>\n";
				} else {
					echo "<option value=COMPATIBLE>COMPATIBLE</option>\n";
					echo "<option selected value=HEYU>HEYU</option>\n";
				}
				echo "</select></td>\n";
				break;

			case "COMBINE_EVENTS":
			case "COMPRESS_MACROS":
			case "REPL_DELAYED_MACROS":;
			case "WRITE_CHECK_FILES":
				echo "<td><select name=".$directive.">\n";
				echo yesnoopt($value);
				echo "</select></td>\n";
				break;

			case "DAWN_OPTION":
			case "DUSK_OPTION":
				echo "<td><select name=".$directive.">\n";
				echo dawnduskopt($value);
				echo "</select></td>\n";
				break;

			default:
				echo "<td><input type=text name=".$directive." value=".$value." /></td>\n";
		}

		echo "</tr>\n";
		//echo "<tr><td height=5 colspan=3></td></tr>\n";
		//echo "<tr><td height=1 bgcolor=#000000 colspan=3></td></tr>\n";
		//echo "<tr><td height=5 colspan=3></td></tr>\n";
	}

	echo "<tr><td valign=top align=right>";
	echo "<input type='submit' value='Save Changes' />\n";
	echo "</form>";
	echo "</td>";
	echo "<td></td>";
	echo "<td>";
	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
	echo "<input type='submit' value='Cancel' /></form>";
	echo "";
	echo "</td></tr>\n";

	echo "</table>\n";
}

function yesnoopt($value) {
	if ($value == "YES") {
		return "<option selected value=YES>YES</option>\n" .
				"<option value=NO>NO</option>\n";
	} else {
		return "<option value=YES>YES</option>\n" .
				"<option selected value=NO>NO</option>\n";
	}
}

function dawnduskopt($value) {
	if ($value == "FIRST") {
		return "<option selected value=FIRST>FIRST</option>\n" .
				"<option value=EARLIEST>EARLIEST</option>\n" .
				"<option value=LATEST>LATEST</option>\n" .
				"<option value=AVERAGE>AVERAGE</option>\n" .
				"<option value=MEDIAN>MEDIAN</option>\n";
	}
	elseif ($value == "EARLIEST") {
		return "<option value=FIRST>FIRST</option>\n" .
				"<option selected value=EARLIEST>EARLIEST</option>\n" .
				"<option value=LATEST>LATEST</option>\n" .
				"<option value=AVERAGE>AVERAGE</option>\n" .
				"<option value=MEDIAN>MEDIAN</option>\n";
	}
	elseif ($value == "LATEST") {
		return "<option value=FIRST>FIRST</option>\n" .
				"<option value=EARLIEST>EARLIEST</option>\n" .
				"<option selected value=LATEST>LATEST</option>\n" .
				"<option value=AVERAGE>AVERAGE</option>\n" .
				"<option value=MEDIAN>MEDIAN</option>\n";
	}
	elseif ($value == "AVERAGE") {
		return "<option value=FIRST>FIRST</option>\n" .
				"<option value=EARLIEST>EARLIEST</option>\n" .
				"<option value=LATEST>LATEST</option>\n" .
				"<option selected value=AVERAGE>AVERAGE</option>\n" .
				"<option value=MEDIAN>MEDIAN</option>\n";
	}
	elseif ($value == "MEDIAN") {
		return "<option value=FIRST>FIRST</option>\n" .
				"<option value=EARLIEST>EARLIEST</option>\n" .
				"<option value=LATEST>LATEST</option>\n" .
				"<option value=AVERAGE>AVERAGE</option>\n" .
				"<option selected value=MEDIAN>MEDIAN</option>\n";
	}
}

?>