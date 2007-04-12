<?php include('config.inc.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
	<title><?php echo $l_title; ?></title>
	<link rel="stylesheet" type="text/css" media="screen" href="themes/<?php echo $theme."/".$theme.".css" ?>" />

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

<!-- start pagewrapper div -->
<div id="pagewrapper">

<!-- start header div -->
<div id="header">
	<table cellspacing="0" cellpadding="0" border="0">
	  <tr>
		<td width="180" ><a href="http://domus.link.co.pt" target="_blank"><img src="themes/<?php echo $theme ?>/images/logo_sm.gif" border="0" /></a></td>
		<td width="10">&nbsp;</td>
		<td width="590" align="right">
			<table cellspacing="0" cellpadding="0" border="0" height="34">
			  <tr>
			  	<td width="1" bgcolor="#cccccc"><img src="themes/<?php echo $theme ?>/images/1px.gif" border="0" /></td>
			  	<td width="34">&nbsp;</td>
			  	<td width="34"><a href = "javascript:history.back()">BACK</a></td>
			  	<td width="34">&nbsp;</td>
			  	<td width="34">SETUP</td>
			  	<td width="34">&nbsp;</td>
			  </tr>
			 </table>
		</td>
	  </tr>
	</table>
	<a href="http://domus.link.co.pt" target="_blank"></a>
</div>
<!-- end header div -->

