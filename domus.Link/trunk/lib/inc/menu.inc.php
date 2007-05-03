<?php
$urlpath = $this->config['url_path'];
$html = <<<EOF

<!-- start menu div -->
<div id="menu">
	<div id="menuitem"><a href="$urlpath/index.php?page=main">Home</a></div>
	<div id="menuitem"><a href="$urlpath/index.php?page=lights">Lights</a></div>
	<div id="menuitem"><a href="$urlpath/index.php?page=appliances">Appliances</a></div>
	<div id="menuitem"><a href="$urlpath/index.php?page=irrigation">Irrigation</a></div>
	<div id="menuitem"><a href="$urlpath/index.php?page=hvac">HVAC</a></div>
	<div id="menuitem"><a href="$urlpath/index.php">Events</a></div>
	<div id="menuitem"><a href="$urlpath/admin/setup.php">Setup</a></div>
</div>
<!-- end menu div -->
<div id="black_sep"></div>
<!-- start submenu div -->
<div id="submenu">
EOF;

if (substr($_SERVER['REQUEST_URI'], -9, 9) == "index.php") {
	$html .= "<p>Texto explaining area</p>";
}
if (substr($_SERVER['REQUEST_URI'], -8, 8) == "heyu.php") {
	$html .= "<p>This is where you can configure Heyu.</p>";
}

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
EOF;

return $html;

?>

