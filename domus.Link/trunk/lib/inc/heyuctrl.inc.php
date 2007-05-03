<?php

//$htmli .= "\n<!-- start heyuctrl div -->\n<div id='heyuctrl'>\n";

$htmli = heyu_state_check(false);

$htmli .= "&nbsp;&nbsp;";

if (heyu_state_check(true) == 1) ## if heyu running, remove link on START
{
	$htmli .= $this->lang['start'];
	$htmli .= " | <a href=".$_SERVER['PHP_SELF']."?daemon=reload>RELOAD</a> ";
	$htmli .= "| <a href=".$_SERVER['PHP_SELF']."?daemon=stop>STOP</a>";
}
else ## if heyu stopped remove link for RELOAD and STOP
	$htmli .= "<a href=".$_SERVER['PHP_SELF']."?daemon=start>".$this->lang['start']."</a> | RELOAD | STOP";

if (isset($_GET["daemon"])) {
	$daemon = $_GET["daemon"];
	if ($daemon == "start") heyu_ctrl($this->config['heyuexec'], start);
	elseif ($daemon == "stop") heyu_ctrl($this->config['heyuexec'], stop);
	elseif ($daemon == "reload") heyu_ctrl($this->config['heyuexec'], restart);
}

//$htmli .= "\n</div>\n<!-- end heyuctrl div -->\n";

return $htmli;

?>