<html>
<head>
<title>TEST</title>
</head>
<body>

<?php
include 'config.inc.php';

$action = $_GET["action"];

if ($action=="save") {
	$tty = $_POST["TTY"];
	$housecode = $_POST["HOUSECODE"];
	$scriptmode = $_POST["SCRIPT_MODE"];
	$schedulefile = $_POST["SCHEDULE_FILE"];
	$mode = $_POST["MODE"];
	$programdays = $_POST["PROGRAM_DAYS"];
	$combinevents = $_POST["COMBINE_EVENTS"];
	$compress = $_POST["COMPRESS_MACROS"];
	$longitude = $_POST["LONGITUDE"];
	$latitude = $_POST["LATITUDE"];
	$dawnopt = $_POST["DAWN_OPTION"];
	$duskopt = $_POST["DUSK_OPTION"];
	$mindawn = $_POST["MIN_DAWN"];
	$maxdawn = $_POST["MAX_DAWN"];
	$mindawn = $_POST["MIN_DUSK"];
	$maxdusk = $_POST["MAX_DUSK"];
	$repldelmacros = $_POST["REPL_DELAYED_MACROS"];
	$writecheckfiles = $_POST["WRITE_CHECK_FILES"];
	$ar = array('TTY' => $tty,
				'HOUSECODE' => $housecode,
				'SCRIPT_MODE' => $scriptmode,
				'SCHEDULE_FILE' => $schedulefile,
				'MODE' => $mode,
				'PROGRAM_DAYS' => $programdays,
				'COMBINE_EVENTS' => $combinevents,
				'COMPRESS_MACROS' => $compress,
				'LONGITUDE' => $longitude,
				'LATITUDE' => $latitude,
				'DAWN_OPTION' => $dawnopt,
				'DUSK_OPTION' => $duskopt,
				'MIN_DAWN' => $mindawn,
				'MAX_DAWN' => $maxdawn,
				'MIN_DUSK' => $mindawn,
				'MAX_DUSK' => $maxdusk,
				'REPL_DELAYED_MACROS' => $repldelmacros,
				'WRITE_CHECK_FILES' => $writecheckfiles
				);
		
	$fp = fopen($heyuconf,'w');

	foreach ($ar as $key=>$value) {
		if (is_writable($heyuconf) == true) {
			$line = $key." ".$value."\n";
			$write = fwrite($fp, $line);
		}
		else {
			die('Heyu.conf file not writable!');
		}	
	}
	fclose($fp);
	load($heyuconf, "");
}
else { load($heyuconf, $action); }

function load($heyuconf, $action) {
	if (is_readable($heyuconf) == true) {
		$lines = file($heyuconf);
		if ($action == "edit") { edit($lines); }
		else { display($lines); }
	}
	else {
		die('Heyu.conf file dosent exist or isnt readable!');
	}
}

function display($lines) {
	
	echo "<table border=0 cellspacing=0 cellpadding=0>\n";

	foreach ($lines as $line_num => $line) {
		list($directive, $value1) = split(" ", $line, 2);
		$value = substr($value1, 0, -1);
		echo "<tr>\n";
		echo "<td><b>".$directive."</b></td>\n";
		echo "<td>&nbsp;</td>";
		echo "<td>".$value."</td>\n";
		echo "</tr>\n";
		echo "<tr><td height=5 colspan=3></td></tr>\n";
		echo "<tr><td height=1 bgcolor=#000000 colspan=3></td></tr>\n";
		echo "<tr><td height=5 colspan=3></td></tr>\n";
	}
	
	echo "</table>\n";
	
	echo "<form action='editconf.php?action=edit' method='post'>\n";
	echo "<input type='submit' value='Edit' />\n";
	echo "</form>";
}

function edit($lines) {
	echo "<form action='editconf.php?action=save' method='post'>";
	echo "<table border=0 cellspacing=0 cellpadding=0>\n";
	
	foreach ($lines as $line_num => $line) {
		list($directive, $value1) = split(" ", $line, 2);
		$value = substr($value1, 0, -1);
		echo "<tr>\n";
		echo "<td><b>".$directive."</b></td>\n";
		echo "<td>&nbsp;</td>\n";
		
		switch ($directive) {
			case "SCRIPT_MODE":
				echo "<td><select name=".$directive.">\n";
				if ($value=="SCRIPTS") {
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
				echo "<option selected value=COMPATIBLE>COMPATIBLE</option>\n";
				echo "<option value=HEYU>HEYU</option>\n";
				echo "</select></td>\n";
				break;
			case "COMBINE_EVENTS":
				echo "<td><select name=".$directive.">\n";
				if ($value=="YES") {
					echo "<option selected value=YES>YES</option>\n";
					echo "<option value=NO>NO</option>\n";
				} else {
					echo "<option value=YES>YES</option>\n";
					echo "<option selected value=NO>NO</option>\n";
				}
				echo "</select></td>\n";
				break;
			case "COMPRESS_MACROS":
				echo "<td><select name=".$directive.">\n";
				echo "<option selected value=YES>YES</option>\n";
				echo "<option value=NO>NO</option>\n";
				echo "</select></td>\n";
				break;
			case "DAWN_OPTION":
				echo "<td><select name=".$directive.">\n";
				echo "<option selected id=FIRST>FIRST</option>\n";
				echo "<option value=EARLIEST>EARLIEST</option>\n";
				echo "<option value=LATEST>LATEST</option>\n";
				echo "<option value=AVERAGE>AVERAGE</option>\n";
				echo "<option value=MEDIAN>MEDIAN</option>\n";
				echo "</select></td>\n";
				break;
			case "DUSK_OPTION":
				echo "<td><select name=".$directive.">\n";
				echo "<option selected value=FIRST>FIRST</option>\n";
				echo "<option value=EARLIEST>EARLIEST</option>\n";
				echo "<option value=LATEST>LATEST</option>\n";
				echo "<option value=AVERAGE>AVERAGE</option>\n";
				echo "<option value=MEDIAN>MEDIAN</option>\n";
				echo "</select></td>\n";
				break;
			case "REPL_DELAYED_MACROS":
				echo "<td><select name=".$directive.">\n";
				echo "<option selected value=YES>YES</option>\n";
				echo "<option value=NO>NO</option>\n";
				echo "</select></td>\n";
				break;
			case "WRITE_CHECK_FILES":
				echo "<td><select name=".$directive.">\n";
				echo "<option selected value=YES>YES</option>\n";
				echo "<option value=NO>NO</option>\n";
				echo "</select></td>\n";
				break;
			default:
				echo "<td><input type=text name=".$directive." value=".$value." /></td>\n";
		}
		
		echo "</tr>\n";
		echo "<tr><td height=5 colspan=3></td></tr>\n";
		echo "<tr><td height=1 bgcolor=#000000 colspan=3></td></tr>\n";
		echo "<tr><td height=5 colspan=3></td></tr>\n";
	}
	
	echo "<tr><td valign=top align=right>";
	echo "<input type='submit' value='Save Changes' />\n";
	echo "</form>";
	echo "</td>";
	echo "<td></td>";
	echo "<td>";
	echo "<form action='editconf.php' method='post'>";
	echo "<input type='submit' value='Cancel' /></form>";
	echo "";
	echo "</td></tr>\n";
	
	echo "</table>\n";
}

?>

</body>