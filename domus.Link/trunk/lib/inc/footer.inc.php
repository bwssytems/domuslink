<?php
$html = <<<EOD
<!-- start footer div -->
<div id="footer">
EOD;

$html .= include_once(INC_FILE_LOCATION.'heyuctrl.inc.php');

$html .= <<<EOD
<SCRIPT LANGUAGE="JavaScript">copyright_date();</SCRIPT>
</div>
<!-- end footer div -->

</body>
</html>
<!-- domus.Link - Copyright (c) 2007 - Istvan Cebrian - http://icebrian.net/domuslink -->
EOD;

return $html;
?>