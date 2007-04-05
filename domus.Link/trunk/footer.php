

</div>
<!-- end content div -->

<!-- start footer div -->
<div id="footer">
<SCRIPT LANGUAGE="JavaScript">copyright_date();</SCRIPT><br><br>
<?php
echo chkheyustate();
echo "<br><a href=".$_SERVER['PHP_SELF']."?hstate=stop>stop</a>";
echo "<br><a href=".$_SERVER['PHP_SELF']."?hstate=start>start</a>";
if (isset($_GET["hstate"])) {
	$hstate = $_GET["hstate"];
	if ($hstate == "stop") {
		heyustartstop ($heyuexec, stop);
	}
	if ($hstate == "start") {
		echo heyustartstop ($heyuexec, start);
	}
}
?>
</div>
<!-- end footer div -->

</div>
<!-- end pagewrapper div -->

</body>
</html>
<!-- domus.Link - By: Istvan Cebrian - http://domus.link.co.pt -->