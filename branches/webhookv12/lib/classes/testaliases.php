<?php
require_once("../../include.php");
require_once(FUNC_FILE_LOCATION."debug.func.php");
require_once(CLASS_FILE_LOCATION."alias.class.php");
$testLine = "ALIAS ThisLight a1 STDAM\n";
//$testLine = "macro halltbllamp_on 0 on upstairs_hall_table";
//$testLine = "trigger button_o1 on familytbl_on";
//$testLine = "comment test this";
//$testLine = "section timers";
echo "-------------------- Test bed for alias classes --------------------<br/>";
echo "The alias line [".$testLine."]<br/>";
echo "<br/>";
echo "* Test Alias <br/>";
try {
$anAlias = new Alias($testLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of alias toString [".$anAlias."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
//echo "* Test Timer with passed in line <br/>";
//try {
// $timer = new Timer($testLine);
//echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer getElementLine [".$timer->getElementLine()."]<br/>";
//echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element getType [".$timer->getType()."]<br/>";
//echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element isEnabled [".$timer->isEnabled()."]<br/>";
//}
//catch(Exception $e ) {
//	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
//}
echo "* Test Alias with no args <br/>";
try {
$anAlias = new Alias();
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of alias toString [".$anAlias."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "<br/>";
echo "-------------------- End Test bed for Alias classes --------------------<br/>";
?>