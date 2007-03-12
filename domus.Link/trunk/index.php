<?php

require('config.inc.php');
include('functions.php');

foreach (get_file("index.tpl.html") as $line_num => $line) {
	if ($line == "<!-- TITLE -->\n") {
		echo "NEW TITLE";
	}
	elseif ($line == "<!-- CONTENT -->\n") {
		echo "<a href='devices.php'>".$l_menu_dev."</a><br />";
		echo "<a href='editconf.php'>".$l_menu_conf."</a>";
	}
	else echo $line;
}

?>