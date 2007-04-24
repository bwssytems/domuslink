<?php
$urlpath = $this->config['url_path'];
$html = <<<EOF

<!-- start menu div -->
<div id="menu">
	<div id="menuitem"><a href="$urlpath/index.php">Home</a></div>
	<div id="menuitem"><a href="$urlpath/admin/aliases.php">Aliases</a></div>
	<div id="menuitem"><a href="$urlpath/admin/heyu.php">Heyu Setup</a></div>
	<div id="menuitem"><a href="$urlpath/admin/frontend.php">Admin</a></div>
EOF;

return $html;

?>

