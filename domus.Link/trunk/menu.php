<!-- start menu div -->
<div id="menu">
	<div id="menuitem"><a href='/'><?php echo $l_menu_main ?></a></div>
	<div id="menuitem"><a href='aliases.php'><?php echo $l_menu_al ?></a></div>
	<div id="menuitem"><a href='heyuconf.php'><?php echo $l_menu_conf ?></a></div>

	<!-- start heyuctrl div -->
	<div id="heyuctrl">
	<b>Heyu Status:</b>
	<?php
	echo chkheyustate();
	echo "<br><b>Heyu Control</b><br>";
	echo "<a href=".$_SERVER['PHP_SELF']."?hstate=start>Start</a> ";
	echo "| <a href=".$_SERVER['PHP_SELF']."?hstate=restart>Reload</a> ";
	echo "| <a href=".$_SERVER['PHP_SELF']."?hstate=stop>Stop</a>";

	if (isset($_GET["hstate"])) {
		$hstate = $_GET["hstate"];
		if ($hstate == "start") heyustartstop ($heyuexec, start);
		elseif ($hstate == "stop") heyustartstop ($heyuexec, stop);
		elseif ($hstate == "restart") heyustartstop ($heyuexec, restart);
	}
	?>
	</div>
	<!-- end heyuctrl div -->
</div>
<!-- end menu div -->

<!-- start content div -->
<div id="content">

