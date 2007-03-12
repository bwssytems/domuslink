<?php

require('config.inc.php');
include('functions.php');

foreach (getfile($themedir.$theme."/index.tpl.html") as $line_num => $line) {
	if ($line == "<!-- TITLE -->\n") {
		echo "NEW TITLE";
	}
	elseif ($line == "<!-- HEADER -->\n") {

	}
	elseif ($line == "<!-- MENU -->\n") {
		echo "<a href='devices.php'>".$l_menu_dev."</a><br />\n";
		echo "<a href='editconf.php'>".$l_menu_conf."</a>\n";
	}
	elseif ($line == "<!-- CONTENT -->\n") {

	}
	elseif ($line == "<!-- FOOTER -->\n") {

	}
	else echo $line;
}

?>