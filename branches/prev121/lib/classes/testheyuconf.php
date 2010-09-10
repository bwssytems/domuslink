<?php
require_once("../../include.php");
require_once(FUNC_FILE_LOCATION."debug.func.php");
require_once(CLASS_FILE_LOCATION."heyuconf.class.php");
//$testLine = "section timers";
echo "-------------------- Test bed for heyu conf classes --------------------<br/>";
echo "<br/>";
echo "The heyu conf file [x10.conf]<br/>";
echo "<br/>";
echo "* Test Heyu Conf file<br/>";
try {
$aHeyuConf = new heyuConf("/etc/heyu/x10.conf");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of heyu conf get alias objects<br/>";
pr($aHeyuConf->getAliases());
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of heyu conf file<br/>";
pr($aHeyuConf);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "-------------------- End Test bed for heyu conf classes --------------------<br/>";
?>