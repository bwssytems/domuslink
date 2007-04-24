<?php
$urlpath = $this->config['url_path'];
$html = <<<EOF

<!-- start menu div -->
<div id="menu">
	<div id="menuitem"><a href="$urlpath/index.php">Home</a></div>
	<div id="menuitem"><a href="$urlpath/index.php">Lights</a></div>
	<div id="menuitem"><a href="$urlpath/index.php">Appliances</a></div>
	<div id="menuitem"><a href="$urlpath/index.php">Irrigation</a></div>
	<div id="menuitem"><a href="$urlpath/index.php">HVAC</a></div>
	<div id="menuitem"><a href="$urlpath/index.php">Events</a></div>
	<div id="menuitem"><a href="$urlpath/admin/setup.php">Setup</a></div>
</div>
<!-- end menu div -->

<!-- start submenu div -->
<div id="submenu">
EOF;

if (substr(strstr($_SERVER['REQUEST_URI'], "admin"), 0, 5) == "admin") {
	$html .= <<<EOF
<div id="submenuitem"><a href="$urlpath/admin/heyu.php">Heyu Setup</a></div>
<div id="submenuitem"><a href="$urlpath/admin/aliases.php">Aliases</a></div>
<div id="submenuitem"><a href="$urlpath/admin/frontend.php">Frontend</a></div>
EOF;
}

$html .=<<<EOF
</div>
<!-- end submenu div -->
<div id="submenu_spacer"></div>
EOF;

return $html;

?>

