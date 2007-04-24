<?php

$html = <<<EOF
	<!-- start heyuctrl div -->
	<div id="heyuctrl">
	<b>Heyu Status:</b>
EOF;

$html .= heyu_state_check();

$heyuexec = $this->config['heyuexec'];

$html .= "<br><b>Heyu Control</b><br>
<a href=".$_SERVER['PHP_SELF']."?daemon=start>".$this->lang['start']."</a>
| <a href=".$_SERVER['PHP_SELF']."?daemon=reload>RELOAD</a>
| <a href=".$_SERVER['PHP_SELF']."?daemon=stop>STOP</a>";

if (isset($_GET["daemon"])) {
	$daemon = $_GET["daemon"];
	if ($daemon == "start") heyu_ctrl($heyuexec, start);
	elseif ($daemon == "stop") heyu_ctrl($heyuexec, stop);
	elseif ($daemon == "reload") heyu_ctrl($heyuexec, restart);
}

$html .= <<<EOF
	</div>
	<!-- end heyuctrl div -->

</div>
<!-- end menu div -->
EOF;

return $html;

?>