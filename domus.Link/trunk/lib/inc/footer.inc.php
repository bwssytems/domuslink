<?php
$html = <<<EOD
<!-- start footer div -->
<div id="footer">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td>
EOD;

$html .= include_once(INC_FILE_LOCATION.'heyuctrl.inc.php');

$html .= <<<EOD
</td>
<td>&nbsp;</td>
<td>
<SCRIPT LANGUAGE="JavaScript">copyright_date();</SCRIPT>
</td>
</tr>
</table>
</div>
<!-- end footer div -->

</body>
</html>
<!-- domus.Link - Copyright (c) 2007 - Istvan Cebrian - http://icebrian.net/domuslink -->
EOD;

return $html;
?>