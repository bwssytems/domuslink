<?php
require_once("../../include.php");
require_once(FUNC_FILE_LOCATION."debug.func.php");
require_once(CLASS_FILE_LOCATION."scheduleelement.class.php");
require_once(CLASS_FILE_LOCATION."heyusched.class.php");
require_once(CLASS_FILE_LOCATION."timer.class.php");
$testLine = "          # timer s.....s expire-23 6:02 22:30  office_flrlamp_on	 office_flrlamp_off Dusklt 21:04	# this is a test Dusklt 21:00 #\n";
//$testLine = "macro halltbllamp_on 0 on upstairs_hall_table";
//$testLine = "trigger button_o1 on familytbl_on";
//$testLine = "comment test this";
//$testLine = "################### Security Scripts ####################################";
//$testLine = "section timers";
//$testLine = "";
echo "-------------------- Test bed for schedule element classes --------------------<br/>";
echo "The element line [".$testLine."]<br/>";
echo "<br/>";
echo "* Test ScheduleElement <br/>";
try {
$anElement = new ScheduleElement($testLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of schedule element getElementLine [".$anElement->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of schedule element getType [".$anElement->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element isEnabled [".$anElement->isEnabled()."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test Timer with passed in line <br/>";
try {
 $timer = new Timer($testLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer getElementLine [".$timer->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element getType [".$timer->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element isEnabled [".$timer->isEnabled()."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test Timer with no args <br/>";
try {
$timer = new Timer();
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer getElementLine [".$timer->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element getType [".$timer->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element isEnabled [".$timer->isEnabled()."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "<br/>";
echo "The sched file tests [x10.sched]<br/>";
echo "<br/>";
echo "* Test Sched file<br/>";
try {
$aHeyuSched = new heyuSched("/etc/heyu/x10.sched");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of heyu sched get element objects<br/>";
pr($aHeyuSched->getElementObjects(ALL_OBJECTS_D));
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of heyu sched file<br/>";
pr($aHeyuSched);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "-------------------- End Test bed for schedule element classes --------------------<br/>";
?>