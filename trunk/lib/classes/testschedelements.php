<?php
define("CLASS_FILE_LOCATION", "/home/bsamuels/workspace/dawnduskV11/lib/classes/");
define("FUNC_FILE_LOCATION", "/home/bsamuels/workspace/dawnduskV11/lib/func/");
require_once(FUNC_FILE_LOCATION."debug.func.php");
require_once(CLASS_FILE_LOCATION."scheduleelement.class.php");
require_once(CLASS_FILE_LOCATION."timer.class.php");
$testLine = "# timer s.....s expire-23 6:02 22:30  office_flrlamp_on	 office_flrlamp_off Dusklt 21:04	# this is a test Dusklt 21:00 #\n";
//$testLine = "macro halltbllamp_on 0 on upstairs_hall_table";
//$testLine = "trigger button_o1 on familytbl_on";
//$testLine = "comment test this";
//$testLine = "section timers";
echo "-------------------- Test bed for schedule element classes --------------------\n"; 
echo "The element line [".$testLine."]\n";
echo "* Test ScheduleElement \n";
try {
$anElement = new ScheduleElement($testLine);
echo "\tThe return of schedule element getElementLine [".$anElement->getElementLine()."]\n";
echo "\tThe return of schedule element getType [".$anElement->getType()."]\n";
echo "\tThe return of Timer element isEnabled [".$anElement->isEnabled()."]\n";
}
catch(Exception $e ) {
	echo "\tE!: ".$e->getMessage()."\n";
}
echo "* Test Timer with passed in line \n";
try {
 $timer = new Timer($testLine);
echo "\tThe return of Timer getElementLine [".$timer->getElementLine()."]\n";
echo "\tThe return of Timer element getType [".$timer->getType()."]\n";
echo "\tThe return of Timer element isEnabled [".$timer->isEnabled()."]\n";
}
catch(Exception $e ) {
	echo "\tE!: ".$e->getMessage()."\n";
}
echo "* Test Timer with no args \n";
try {
$timer = new Timer();
echo "\tThe return of Timer getElementLine [".$timer->getElementLine()."]\n";
echo "\tThe return of Timer element getType [".$timer->getType()."]\n";
echo "\tThe return of Timer element isEnabled [".$timer->isEnabled()."]\n";
}
catch(Exception $e ) {
	echo "\tE!: ".$e->getMessage()."\n";
}
echo "-------------------- End Test bed for schedule element classes --------------------\n";
?>