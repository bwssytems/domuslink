<?php
require_once("../../include.php");

$testLine = "ALIAS ThisLight E3 PALMPAD  RFFORWARD test test\n";
$testMapLine = "kitchen,light,kitchen,visible";
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
pr($anAlias);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test Alias with no args <br/>";
try {
$anAlias = new Alias();
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of alias toString [".$anAlias."]<br/>";
pr($anAlias);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "<br/>";
echo "The alias map line [".$testmapLine."]<br/>";
echo "<br/>";
echo "* Test Alias Map<br/>";
try {
$anAliasMap = new AliasMapElement($testMapLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of alias Map toString [".$anAliasMap."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test Alias Map with no args <br/>";
try {
$anAliasMap = new AliasMapElement();
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of alias map toString [".$anAliasMap."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "<br/>";
echo "The alias map file [aliasmap]<br/>";
echo "<br/>";
echo "* Test Alias Map file<br/>";
try {
$anAliasMap = new AliasMap(DB_FILE_LOCATION."aliasmap");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of alias Map get element objects<br/>";
pr($anAliasMap->getElementObjects("ALL_OBJECTS"));
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of alias Map file<br/>";
pr($anAliasMap);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "-------------------- End Test bed for Alias classes --------------------<br/>";
?>