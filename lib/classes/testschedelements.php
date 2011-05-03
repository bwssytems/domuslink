<?php
require_once("../../include.php");
require_once(FUNC_FILE_LOCATION."debug.func.php");
require_once(CLASS_FILE_LOCATION."scheduleelement.class.php");
require_once(CLASS_FILE_LOCATION."heyusched.class.php");
require_once(CLASS_FILE_LOCATION."timer.class.php");
require_once(CLASS_FILE_LOCATION."macro.class.php");
require_once(CLASS_FILE_LOCATION."trigger.class.php");
$testLine = "          # timer s.....s expire-23 6:02 22:30  office_flrlamp_on	 office_flrlamp_off Dusklt 21:04	# this is a test Dusklt 21:00 #\n";
$macroLine = "macro halltbllamp_on 0 on upstairs_hall_table; off basement_stairs; off theater_back; off theater_front; off kitchen_island; off inside_garage; off family_table; off family_floor; off desk_floor; xoff front_entrance";
$triggerLine = "trigger button_o1 on familytbl_on";
//$testLine = "comment test this";
//$testLine = "################### Security Scripts ####################################";
//$testLine = "section timers";
//$testLine = "";
echo "-------------------- Test bed for schedule element classes --------------------<br/>";
echo "The element line [".$testLine."]<br/>";
echo "<br/>";
echo "* Test ScheduleElement - timer<br/>";
try {
$anElement = new ScheduleElement($testLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of schedule element getElementLine [".$anElement->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of schedule element getType [".$anElement->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element isEnabled [".$anElement->isEnabled()."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test ScheduleElement - macro<br/>";
try {
$anElement = new ScheduleElement($macroLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of schedule element getElementLine [".$anElement->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of schedule element getType [".$anElement->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Timer element isEnabled [".$anElement->isEnabled()."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test ScheduleElement - trigger<br/>";
try {
$anElement = new ScheduleElement($triggerLine);
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
echo "* Test Macro with passed in line <br/>";
try {
 $macro = new Macro($macroLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Macro getElementLine [".$macro->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Macro element getType [".$macro->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Macro element isEnabled [".$macro->isEnabled()."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test Macro with no args <br/>";
try {
$macro = new Macro();
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Macro getElementLine [".$macro->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Macro element getType [".$macro->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Macro element isEnabled [".$macro->isEnabled()."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test Trigger with passed in line <br/>";
try {
 $trigger = new Trigger($triggerLine);
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Trigger getElementLine [".$trigger->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Trigger element getType [".$trigger->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Trigger element isEnabled [".$trigger->isEnabled()."]<br/>";
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "* Test Triggerwith no args <br/>";
try {
$trigger = new Trigger();
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Trigger getElementLine [".$trigger->getElementLine()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Trigger element getType [".$trigger->getType()."]<br/>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of Trigger element isEnabled [".$trigger->isEnabled()."]<br/>";
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