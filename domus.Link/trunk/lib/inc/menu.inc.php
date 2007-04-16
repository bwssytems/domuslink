<?php
$html = <<<EOF

<!-- start menu div -->
<div id="menu">
	<div id="menuitem"><a href="index.php">Home</a></div>
	<div id="menuitem"><a href="aliases.php">Aliases</a></div>
	<div id="menuitem"><a href="heyuconf.php">Heyu Setup</a></div>
	<div id="menuitem"><a href="admin/frontend.php">Admin</a></div>

	<!-- start heyuctrl div -->
	<div id="heyuctrl">
	<b>Heyu Status:</b>

	</div>
	<!-- end heyuctrl div -->
</div>
<!-- end menu div -->
EOF;

return $html;

/*
	echo chkheyustate();
	echo "<br><b>Heyu Control</b><br>";
	echo "<a href=".$_SERVER['PHP_SELF']."?hstate=start>$l_heyu_start</a> ";
	echo "| <a href=".$_SERVER['PHP_SELF']."?hstate=reload>$l_heyu_reload</a> ";
	echo "| <a href=".$_SERVER['PHP_SELF']."?hstate=stop>$l_heyu_stop</a>";

	if (isset($_GET["hstate"])) {
		$hstate = $_GET["hstate"];
		if ($hstate == "start") heyustartstop ($heyuexec, start);
		elseif ($hstate == "stop") heyustartstop ($heyuexec, stop);
		elseif ($hstate == "reload") heyustartstop ($heyuexec, restart);
	}
	*/
?>

