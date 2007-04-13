<!-- start menu div -->
<div id="menu">
	<div id="menuitem"><a href='/'><?php echo $l_main ?></a></div>
	<div id="menuitem"><a href='aliases.php'><?php echo $l_aliases ?></a></div>
	<div id="menuitem"><a href='heyuconf.php'><?php echo $l_hconf ?></a></div>

	<!-- start heyuctrl div -->
	<div id="heyuctrl">
	<b>Heyu Status:</b>
	<?php
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
	?>
	</div>
	<!-- end heyuctrl div -->
</div>
<!-- end menu div -->

<!-- start content div -->
<div id="content">

