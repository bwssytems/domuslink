<?php

/*$html = <<<EOF
	<!-- start heyuctrl div -->
	<div id="heyuctrl">
	<b>Heyu Status:</b>
EOF;*/

$html .= heyu_state_check(false);

/*$html .= "<br><b>Heyu Control</b><br>";*/

if (heyu_state_check(true) == 1)
	$html .= $this->lang['start']."
	| <a href=".$_SERVER['PHP_SELF']."?daemon=reload>RELOAD</a>
	| <a href=".$_SERVER['PHP_SELF']."?daemon=stop>STOP</a>";
else
	$html .= "<a href=".$_SERVER['PHP_SELF']."?daemon=start>".$this->lang['start']."</a> | RELOAD | STOP";

if (isset($_GET["daemon"])) {
	$daemon = $_GET["daemon"];
	if ($daemon == "start") heyu_ctrl($this->config['heyuexec'], start);
	elseif ($daemon == "stop") heyu_ctrl($this->config['heyuexec'], stop);
	elseif ($daemon == "reload") heyu_ctrl($this->config['heyuexec'], restart);
}

/*$html .= <<<EOF
	</div>
	<!-- end heyuctrl div -->

</div>
<!-- end menu div -->
EOF;*/

return $html;

?>