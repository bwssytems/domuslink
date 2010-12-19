<?php
require_once("../include.php");
require_once(FUNC_FILE_LOCATION."debug.func.php");
require_once(CLASS_FILE_LOCATION."heyuconf.class.php");
require_once("./heyuconfold.class.php");
require_once("./converttoaliasmap.func.php");
//$testLine = "section timers";
echo "-------------------- Test bed for heyu conf conversion --------------------<br/>";
echo "<br/>";
echo "The heyu conf file [x10.conf]<br/>";
echo "<br/>";
echo "* Test Heyu Conf file<br/>";
try {
$aHeyuConf = new heyuConfOld("/etc/heyu/x10.conf");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of heyu conf old get derived alias map<br/>";
$newAliasLines = $aHeyuConf->getAliasesWithLocationAndType();
pr($newAliasLines);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of heyu conf new alias map<br/>";
$newAliasMap = new AliasMap();
foreach($newAliasLines as $aliasLine) {
	$newAliasMap->addElement(new AliasMapElement($aliasLine));
}
pr($newAliasMap);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of new Format heyu conf file<br/>";
$newHeyuConf = new heyuConf("../doc/x10.conf");
pr($newHeyuConf);

echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Converted heyu conf file<br/>";
convert_to_alias_map($aHeyuConf, $newHeyuConf);
pr($newHeyuConf);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "-------------------- End Test bed for heyu conf conversion --------------------<br/>";
?>