<?php
$urlpath = $this->config['url_path'];
$themeloc = THEME_FILE_LOCATION;
$theme = $this->config['theme'];

$html = <<<EOD
<html>

<head>
  <title>$this->title</title>
  <link rel="stylesheet" type="text/css" media="screen" href="$urlpath/$themeloc/$theme/$theme.css" />

  <SCRIPT LANGUAGE="JavaScript">
  <!--
   function copyright_date() {
    today=new Date();
    ynow=today.getFullYear();
    ystart='2007';
    if (ystart==ynow) { document.write("© "+ystart); }
    else { document.write("© "+ ystart +" - "+ynow); }
   }
  -->
  </SCRIPT>
</head>

<body>

<!-- start header div -->
<div id="header">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
   <td width="60px"><img src="$urlpath/$themeloc/$theme/images/header_left_corner.gif" border="0" /></td>
   <td width="100%" align="left"><img src="$urlpath/$themeloc/$theme/images/1px.gif" width="30px" border="0" /><img src="$urlpath/$themeloc/$theme/images/header_logo.gif" border="0" /></td>
   <td width="450px"><img src="$urlpath/$themeloc/$theme/images/header_right.gif" border="0" /></td>
</tr>
</table>
</div>
<!-- end header div -->

EOD;

return $html;
?>