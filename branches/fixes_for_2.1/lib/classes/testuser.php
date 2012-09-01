<?php
require_once("../../include.php");
require_once(CLASS_FILE_LOCATION."user.class.php");
require_once(CLASS_FILE_LOCATION."userdb.class.php");
require_once("../../utility/setupuserdb.php");

$testLine = "pin::sadf:99999:greater";
//$testLine = "macro halltbllamp_on 0 on upstairs_hall_table";
//$testLine = "trigger button_o1 on familytbl_on";
//$testLine = "comment test this";
//$testLine = "section timers";
echo "-------------------- Test bed for User classes --------------------<br/>";
echo "The user line [".$testLine."]<br/>";
echo "<br/>";
echo "* Test User <br/>";
try {
$anUser = new User($testLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of User toString [".$anUser."]<br/>";
pr($anUser);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test User with no args <br/>";
try {
$anUser = new User();
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of User toString [".$anUser."]<br/>";
pr($anUser);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "<br/>";
echo "The User file [userdb]<br/>";
echo "<br/>";
echo "* Test UserDB file<br/>";
try {
setUpUserDB();
$anUserDB = new UserDB(USERDB_FILE_LOCATION);
$userObjects = $anUserDB->getElementObjects("ALL_OBJECTS");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of UserDB get element objects<br/>";
pr($userObjects);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of UserDB file<br/>";
pr($anUserDB);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of UserDB element 0 unencrypted password<br/>";
$aUser = $anUserDB->getUser("admin");
pr($aUser->validatePassword("1234"));
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of UserDB getNextPINName<br/>";
pr($anUserDB->getNextPINName());
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "-------------------- End Test bed for User classes --------------------<br/>";
?>