<?php
require_once("../../include.php");

$testLine = array();
// $testLine[0] = "03/05 12:35:33  Temperature = 76    : hu H0  (hvac_data)";
$testLine[0] = "Command 'preset' is not valid for TTY dummy";
$testLine[1] = "03/05 12:35:58  System_mode = OFF : hu H0  (hvac_data)";
$testLine[2] = "03/05 12:36:02  Fan = OFF : hu H0  (hvac_data)";
$testLine[3] = "03/05 12:36:07  Setback = OFF : hu H0  (hvac_data)";
echo "-------------------- Test bed for parse_hvac_return --------------------<br/>";
echo "The hvac return line [".$testLine[0]."]<br/>";
echo "<br/>";
echo "* Test parse_hvac_return for temp<br/>";
try {
$return_arr = parse_hvac_return(array($testLine[0]), "temp");
// $return_arr = parse_hvac_return(array($testLine[0], "Other Stuff"), "temp");
// $return_arr = parse_hvac_return(array(), "temp");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of parse_hvac_return temp [".$return_arr[0]."]<br/>";
pr($return_arr);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "<br/>";
echo "* Test parse_hvac_return for setpoint<br/>";
try {
$return_arr = parse_hvac_return(array($testLine[0]), "setpoint");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of parse_hvac_return setpoint [".$return_arr[0]."]<br/>";
pr($return_arr);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "The hvac return line [".$testLine[1]."]<br/>";
echo "<br/>";
echo "* Test parse_hvac_return for mode<br/>";
try {
$return_arr = parse_hvac_return(array($testLine[1]), "mode");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of parse_hvac_return mode [".$return_arr[0]."]<br/>";
pr($return_arr);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "The hvac return line [".$testLine[2]."]<br/>";
echo "<br/>";
echo "* Test parse_hvac_return for fan mode<br/>";
try {
$return_arr = parse_hvac_return(array($testLine[2]), "fan_mode");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of parse_hvac_return fan_mode [".$return_arr[0]."]<br/>";
pr($return_arr);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
echo "The hvac return line [".$testLine[3]."]<br/>";
echo "<br/>";
echo "* Test parse_hvac_return for setback mode<br/>";
try {
$return_arr = parse_hvac_return(array($testLine[3]), "setback_mode");
echo "&nbsp;&nbsp;&nbsp;&nbsp;The return of parse_hvac_return setback_mode [".$return_arr[0]."]<br/>";
pr($return_arr);
}
catch(Exception $e ) {
	echo "&nbsp;&nbsp;&nbsp;&nbsp;E!: ".$e->getMessage()."<br/>";
}
?>