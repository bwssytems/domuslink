<?php
require_once("../../include.php");

$testLine = "SCENE MyMood on E3; off E4\n";
$testMapLine = "kitchen,scene,kitchen,visible,other,999999";
//$testLine = "macro halltbllamp_on 0 on upstairs_hall_table";
//$testLine = "trigger button_o1 on familytbl_on";
//$testLine = "comment test this";
//$testLine = "section timers";
echo "-------------------- Test bed for scene classes --------------------<br/>";
echo "The scene line [".$testLine."]<br/>";
echo "<br/>";
echo "* Test Scene <br/>";
try {
$aScene = new Scene($testLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of scene toString [".$aScene."]<br/>";
pr($aScene);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test Scene with no args <br/>";
try {
$aScene = new Scene();
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of scene toString [".$aScene."]<br/>";
pr($aScene);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "<br/>";
echo "The alias map line [".$testMapLine."]<br/>";
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