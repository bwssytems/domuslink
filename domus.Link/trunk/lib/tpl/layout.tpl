<html>

<head>
  <title><?=$title;?></title>
  <link rel="stylesheet" type="text/css" media="screen" href="<?=$urlpath;?>/theme/<?=$theme;?>/<?=$theme;?>.css" />

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
   <td width="60px"><img src="<?=$urlpath;?>/theme/<?=$theme;?>/images/header_left_corner.gif" border="0" /></td>
   <td width="100%" align="left"><img src="<?=$urlpath;?>/theme/<?=$theme;?>/images/1px.gif" width="30px" border="0" /><img src="<?=$urlpath;?>/theme/<?=$theme;?>/images/header_logo.gif" border="0" /></td>
   <td width="450px"><img src="<?=$urlpath;?>/theme/<?=$theme;?>/images/header_right.gif" border="0" /></td>
</tr>
</table>
</div>
<!-- end header div -->

<!-- start menu div -->
<div id="menu">
  <div id="menuitem"><a href="<?=$urlpath;?>/index.php?page=main">Home</a></div>
  <div id="menuitem"><a href="<?=$urlpath;?>/index.php?page=lights">Lights</a></div>
  <div id="menuitem"><a href="<?=$urlpath;?>/index.php?page=appliances">Appliances</a></div>
  <div id="menuitem"><a href="<?=$urlpath;?>/index.php?page=irrigation">Irrigation</a></div>
  <div id="menuitem"><a href="<?=$urlpath;?>/index.php?page=hvac">HVAC</a></div>
  <div id="menuitem"><a href="<?=$urlpath;?>/index.php">Events</a></div>
  <div id="menuitem"><a href="<?=$urlpath;?>/admin/setup.php">Setup</a></div>
</div>
<!-- end menu div -->
<div id="black_sep"></div><!-- separator div -->

<!-- start submenu div -->
<div id="submenu">
<?php if (substr($_SERVER['REQUEST_URI'], -9, 9) == "index.php") { ?>
	<p>Texto explaining area</p>
<?php }
if (substr($_SERVER['REQUEST_URI'], -8, 8) == "heyu.php") { ?>
	<p>This is where you can configure Heyu.</p>
<?php }
if (substr(strstr($_SERVER['REQUEST_URI'], "admin"), 0, 5) == "admin") { ?>
<div id="submenuitem"><a href="<?=$urlpath;?>/admin/heyu.php">Heyu Setup</a></div>
<div id="submenuitem"><a href="<?=$urlpath;?>/admin/aliases.php">Aliases</a></div>
<div id="submenuitem"><a href="<?=$urlpath;?>/admin/frontend.php">Frontend</a></div>
<? } ?>
</div>
<!-- end submenu div -->

<!-- start content -->
<div id="content">
<?=$content;?>
</div>
<!-- end content -->

<!-- start footer div -->
<div id="footer">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
   <td>
     Heyu Status: <?=heyu_state_check(false);?>
     <? if (heyu_state_check(true) == 1): ## if heyu running, remove link on START ?>
     	( <a href="<? $_SERVER['PHP_SELF'];?>?daemon=reload">RELOAD</a> |
	    <a href="<? $_SERVER['PHP_SELF'];?>?daemon=stop">STOP</a> )
     <? else: ## if heyu stopped remove link for RELOAD and STOP ?>
     	( <a href="<? $_SERVER['PHP_SELF'];?>?daemon=start">START</a> )
     <? endif; ?>

     <? if (isset($_GET["daemon"])): ?>
     <? $daemon = $_GET["daemon"]; ?>
     	<? if ($daemon == "start"): heyu_ctrl($heyuexec, start); ?>
	    <? elseif ($daemon == "stop"): heyu_ctrl($heyuexec, stop);  ?>
	    <? elseif ($daemon == "reload"): heyu_ctrl($heyuexec, restart); ?>
	    <? endif; ?>
     <? endif; ?>
   </td>
   <td>&nbsp;</td>
   <td align="right">
     <a href="http://icebrian.net/domuslink">domus.Link</a> <SCRIPT LANGUAGE="JavaScript">copyright_date();</SCRIPT> - Istvan Hubay Cebrian
   </td>
  </tr>
</table>
</div>
<!-- end footer div -->

</body>
</html>
<!-- domus.Link - Copyright (c) 2007 - Istvan Cebrian - http://icebrian.net/domuslink -->