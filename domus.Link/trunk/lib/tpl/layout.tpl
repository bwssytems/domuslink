<html>

<head>
  <title><?=$title;?></title>
  <link rel="stylesheet" type="text/css" media="screen" href="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/<?=$config['theme'];?>.css" />
  <link rel="shortcut icon" href="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/favicon.ico" type="image/x-icon" />

  <SCRIPT LANGUAGE="JavaScript">
  <!--
   function copyright_date() {
    today=new Date();
    ynow=today.getFullYear();
    ystart='2007';
    if (ystart==ynow) { document.write("� "+ystart); }
    else { document.write("� "+ ystart +" - "+ynow); }
   }
  -->
  </SCRIPT>
</head>

<body>

<!-- start header div -->
<div id="header">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
   <td width="60px"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/header_left_corner.gif" border="0" /></td>
   <td width="100%" align="left"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/1px.gif" width="30px" border="0" /><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/header_logo.gif" border="0" /></td>
   <td width="450px"><img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/header_right.gif" border="0" /></td>
</tr>
</table>
</div>
<!-- end header div -->

<!-- start menu div -->
<div id="menu">
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=main"><?=$lang['all'];?></a></div>
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=lights"><?=$lang['lights'];?></a></div>
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=appliances"><?=$lang['appliances'];?></a></div>
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=irrigation"><?=$lang['irrigation'];?></a></div>
<!--  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=hvac"><?=$lang['hvac'];?></a></div> -->
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php"><?=$lang['events'];?></a></div>
  <div id="menuitem"><a href="<?=$config['url_path'];?>/admin/setup.php"><?=$lang['setup'];?></a></div>
</div>
<!-- end menu div -->
<div id="black_sep"></div><!-- separator div -->

<!-- start submenu div -->
<div id="submenu">
<? if (substr(strstr($_SERVER['REQUEST_URI'], "admin"), 0, 5) == "admin"): ?>
<div id="submenuitem"><a href="<?=$config['url_path'];?>/admin/heyu.php"><?=$lang['heyusetup'];?></a></div>
<div id="submenuitem"><a href="<?=$config['url_path'];?>/admin/aliases.php"><?=$lang['aliases'];?></a></div>
<div id="submenuitem"><a href="<?=$config['url_path'];?>/admin/frontend.php"><?=$lang['frontend'];?></a></div>
<? endif; ?>
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
     <?=$lang['heyustatus'];?>
     <? if (heyu_state_check()): ?>
     	<img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/heyu_on.gif" /> ( <a href="<? $_SERVER['PHP_SELF'];?>?daemon=reload"><?=$lang['reload'];?></a> |
	    <a href="<? $_SERVER['PHP_SELF'];?>?daemon=stop"><?=$lang['stop'];?></a> )
     <? else:  ?>
     	<img src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/heyu_off.gif" /> ( <a href="<? $_SERVER['PHP_SELF'];?>?daemon=start"><?=$lang['start'];?></a> )
     <? endif; ?>

     <? if (isset($_GET["daemon"])): ?>
     <? $daemon = $_GET["daemon"]; ?>
     	<? if ($daemon == "start"): heyu_ctrl($config['heyuexec'], start); ?>
	    <? elseif ($daemon == "stop"): heyu_ctrl($config['heyuexec'], stop);  ?>
	    <? elseif ($daemon == "reload"): heyu_ctrl($config['heyuexec'], restart); ?>
	    <? endif; ?>
     <? endif; ?>
   </td>
   <td>&nbsp;</td>
   <td align="right">
     <a href="<?=$lang['dlurl'];?>">domus.Link</a> v<?=$ver;?> <SCRIPT LANGUAGE="JavaScript">copyright_date();</SCRIPT>
   </td>
  </tr>
</table>
</div>
<!-- end footer div -->

</body>
</html>
<!-- domus.Link - Copyright (c) 2007 - Istvan Cebrian - http://icebrian.net/domuslink -->