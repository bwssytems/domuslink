<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

// Instantiate classes
$heyuconf = new HeyuConf($config['heyuconf']);
$html = new Page('Heyu Conf', $config['url_path'], $config['theme']);

// Get heyu (x10.conf) file contents
$content = $heyuconf->get();

// Add html body
$html->addContent("<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n");

if (!isset($_GET["action"])) {
	foreach ($content as $line_num => $line) {
		if (substr($line, 0, 1) != "#" && $line != "\n" && substr($line, 0, 5) != "ALIAS" &&
		substr($line, 0, 5) != "SCENE" && substr($line, 0, 7) != "USERSYN" && $line != " \n") {
			list($directivenf, $valuenf) = split(" ", $line, 2);
			$value = rtrim($valuenf, "\n");
			$html->addContent("<tr>\n");
			$directive = str_replace("_", " ", $directivenf); //removes "_"
			$html->addContent("<td width='200' class='td_right'><b>".$directive." :&nbsp;</b></td>\n" .
					"<td width='100'>".$value."</td>\n" .
					"</tr>\n");
		}
	}

	$html->addContent("<tr><td colspan='3'>\n" .
		"<form action='".$_SERVER['PHP_SELF']."?action=edit' method='post'>\n" .
		"<input type='submit' value='Edit' class='formbtn' /></form>\n" .
		"</td></tr>\n" .
		"</table>\n");
}
else {
	if ($_GET["action"] == "edit") {
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>");
		$html->addContent("<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n");

		$act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts

		foreach ($content as $line_num => $line) {
			list($directivenf, $valuenf) = split(" ", $line, 2);
			$value = rtrim($valuenf, "\n");

			$directive = str_replace("_", " ", $directivenf); //removes "_"
			if ($directive == "ALIAS") {
				$html->addContent("<input type='hidden' name='$directivenf$act' value='$value' />\n");
				$act++;
			}
			elseif ($directive == "SCENE") {
				$html->addContent("<input type='hidden' name='$directivenf$sct' value='$value' />\n");
				$sct++;
			}
			elseif ($directive == "USERSYN") {
				$html->addContent("<input type='hidden' name='$directivenf$usct' value='$value' />\n");
				$usct++;
			}
			else {
				$html->addContent("<tr>\n<td width='200' class='td_right'><b>".$directive." :&nbsp;</b></td>\n");

				switch ($directivenf) {
					case "SCRIPT_MODE":
						$html->addContent("<td><select name='$directivenf'>\n");
						if ($value == "SCRIPTS") {
							$html->addContent("<option selected value='SCRIPTS'>SCRIPTS</option>\n" .
									"<option value='HEYUHELPER'>HEYUHELPER</option>\n");
						} else {
							$html->addContent("<option value='SCRIPTS'>SCRIPTS</option>\n" .
									"<option selected value='HEYUHELPER'>HEYUHELPER</option>\n");
						}
						$html->addContent("</select></td>\n");
						break;

					case "MODE":
						$html->addContent("<td><select name='$directivenf'>\n");
						if ($value == "COMPATIBLE") {
							$html->addContent("<option selected value='COMPATIBLE'>COMPATIBLE</option>\n" .
									"<option value='HEYU'>HEYU</option>\n");
						} else {
							$html->addContent("<option value='COMPATIBLE'>COMPATIBLE</option>\n" .
									"<option selected value='HEYU'>HEYU</option>\n");
						}
						$html->addContent("</select></td>\n");
						break;

					case "COMBINE_EVENTS":
					case "COMPRESS_MACROS":
					case "REPL_DELAYED_MACROS":;
					case "WRITE_CHECK_FILES":
					case "ACK_HAILS":
					case "AUTOFETCH":
						$html->addContent("<td><select name='$directivenf'>\n");
						$html->addContent(yesnoopt($value));
						$html->addContent("</select></td>\n");
						break;

					case "DAWN_OPTION":
					case "DUSK_OPTION":
						$html->addContent("<td><select name='$directivenf'>\n");
						$html->addContent(dawnduskopt($value));
						$html->addContent("</select></td>\n");
						break;

					default:
						$html->addContent("<td><input type='text' name='$directivenf' value='$value' /></td>\n");
				} // end switch

				$html->addContent("</tr>\n");
			} // end else
		} // end foreach loop

		$html->addContent("<tr><td><input type='submit' value='Save Changes' class='formbtn' /></form></td>\n" .
				"<td><form action='".$_SERVER['PHP_SELF']."' method='post'>\n" .
				"<input type='submit' value='Cancel' class='formbtn' /></form></td>\n" .
				"</tr></table>\n");
	} // end if edit
	elseif ($_GET["action"] == "save") {
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
		save_file($newcontent, $config['heyuconf']);
	} // end if save
}


// Display the page
echo $html->get();

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