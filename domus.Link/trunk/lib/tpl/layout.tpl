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
    if (ystart==ynow) { document.write("© "+ystart); }
    else { document.write("© "+ ystart +" - "+ynow); }
   }

   //preload()
   //{
   //	var image1 = new Image();
   //	image1.src = "<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_all_on.gif.gif";
   //	var image2 = new Image();
   //	image2.src = "<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_lights_on.gif.gif";
   //}

   function roll(img_name, img_src)
   {
   	document[img_name].src = img_src;
   }
   //-->
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
<? if ($config['imgs'] == "OFF"): ?>
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=main"><?=$lang['all'];?></a></div>
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=lights"><?=$lang['lights'];?></a></div>
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=appliances"><?=$lang['appliances'];?></a></div>
  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=irrigation"><?=$lang['irrigation'];?></a></div>
<!--  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php?page=hvac"><?=$lang['hvac'];?></a></div> -->
<!--  <div id="menuitem"><a href="<?=$config['url_path'];?>/index.php"><?=$lang['events'];?></a></div> -->
  <div id="menuitem"><a href="<?=$config['url_path'];?>/admin/setup.php"><?=$lang['setup'];?></a></div>
<? else: ?>
<!--
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=main" onmouseover="roll('img_1', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_all_on.gif')" onmouseout="roll('img_1', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_all_off.gif')"><img alt="<?=$lang['all'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_all_off.gif" border="0" name="img_1" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=lights" onmouseover="roll('img_2', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_lights_on.gif')" onmouseout="roll('img_2', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_lights_off.gif')"><img alt="<?=$lang['lights'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_lights_off.gif" border="0" name="img_2" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=appliances" onmouseover="roll('img_3', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_appliances_on.gif')" onmouseout="roll('img_3', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_appliances_off.gif')"><img alt="<?=$lang['appliances'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_appliances_off.gif" border="0" name="img_3" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=irrigation" onmouseover="roll('img_4', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_irrigation_on.gif')" onmouseout="roll('img_4', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_irrigation_off.gif')"><img alt="<?=$lang['irrigation'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_irrigation_off.gif" border="0" name="img_4" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=hvac" onmouseover="roll('img_5', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_hvac_on.gif')" onmouseout="roll('img_5', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_hvac_off.gif')"><img alt="<?=$lang['hvac'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_hvac_off.gif" border="0" name="img_5" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php" onmouseover="roll('img_6', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_events_on.gif')" onmouseout="roll('img_6', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_events_off.gif')"><img alt="<?=$lang['events'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_events_off.gif" border="0" name="img_6" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/admin/setup.php" onmouseover="roll('img_7', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_setup_on.gif')" onmouseout="roll('img_7', '<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_setup_off.gif')"><img alt="<?=$lang['setup'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_setup_off.gif" border="0" name="img_7" /></a></div>
-->
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=main"><img alt="<?=$lang['all'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_all_off.gif" border="0" name="img_1" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=lights"><img alt="<?=$lang['lights'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_lights_off.gif" border="0" name="img_2" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=appliances"><img alt="<?=$lang['appliances'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_appliances_off.gif" border="0" name="img_3" /></a></div>
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=irrigation"><img alt="<?=$lang['irrigation'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_irrigation_off.gif" border="0" name="img_4" /></a></div>
<!-- <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php?page=hvac"><img alt="<?=$lang['hvac'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_hvac_off.gif" border="0" name="img_5" /></a></div> -->
<!--  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/index.php"><img alt="<?=$lang['events'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_events_off.gif" border="0" name="img_6" /></a></div> -->
  <div id="menuitem_img"><a href="<?=$config['url_path'];?>/admin/setup.php"><img alt="<?=$lang['setup'];?>" src="<?=$config['url_path'];?>/theme/<?=$config['theme'];?>/images/menu_setup_off.gif" border="0" name="img_7" /></a></div>
<? endif; ?>
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
     <?=$lang['heyustatus'];?>:
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
     <a href="<?=$lang['dlurl'];?>">domus.Link</a> v<?=$ver;?> - <SCRIPT LANGUAGE="JavaScript">copyright_date();</SCRIPT> Istvan Hubay Cebrian
   </td>
  </tr>
</table>
</div>
<!-- end footer div -->

</body>
</html>
<!-- domus.Link - Copyright (c) 2007 - Istvan Cebrian - http://domus.link.co.pt -->