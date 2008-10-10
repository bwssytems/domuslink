<html>

<head>
  <title><?php echo $title; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/<?php echo ($config['theme']); ?>.css" />
  <link rel="shortcut icon" href="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/favicon.ico" type="image/x-icon" />
  <?php if (strpos($_SERVER['PHP_SELF'], "index.php") != false && $config['refresh'] != ""): ?>
  <META HTTP-EQUIV=Refresh CONTENT="<?php echo ($config['refresh']); ?>">
  <?php endif; ?>

  <SCRIPT LANGUAGE="JavaScript">
  <!--
   function copyright_date() {
    today=new Date();
    ynow=today.getFullYear();
    ystart='2007';
    if (ystart==ynow) { document.write("&copy; "+ystart); }
    else { document.write("&copy; "+ ystart +" - "+ynow); }
   }

   //preload()
   //{
   //	var image1 = new Image();
   //	image1.src = "<?php $config['url_path'];?>/theme/<?php $config['theme'];?>/images/menu_all_on.gif.gif";
   //	var image2 = new Image();
   //	image2.src = "<?php $config['url_path'];?>/theme/<?php $config['theme'];?>/images/menu_lights_on.gif.gif";
   //}

   function roll(img_name, img_src)
   {
   	document[img_name].src = img_src;
   }
   //-->
  </SCRIPT>

  <!--[if IE]>
  <style type="text/css">
    #content { width:100%; }
    #footer { width: 100%; }
  </style>
  <![endif]-->
</head>

<body>

<!-- start header div -->
<div id="header">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
   <td width="60px"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/header_left_corner.gif" border="0" /></td>
   <td width="100%" align="left"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/1px.gif" width="30px" border="0" /><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/header_logo.gif" border="0" /></td>
   <td width="450px"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/header_right.gif" border="0" /></td>
</tr>
</table>
</div>
<!-- end header div -->

<!-- start menu div -->
<div id="menu">
<?php if ($config['imgs'] == "OFF"): ?>
  <div id="menuitem"><a href="<?php echo ($config['url_path']); ?>/index.php?page=main"><?php echo ($lang['all']); ?></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']); ?>/index.php?page=lights"><?php echo ($lang['lights']); ?></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']); ?>/index.php?page=appliances"><?php echo ($lang['appliances']); ?></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']); ?>/index.php?page=irrigation"><?php echo ($lang['irrigation']); ?></a></div>
<!--  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=hvac"><?php echo ($lang['hvac']);?></a></div> -->
<!--  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php"><?php echo ($lang['events']);?></a></div> -->
  <div id="menuitem"><a href="<?php echo ($config['url_path']); ?>/admin/setup.php"><?php echo ($lang['setup']); ?></a></div>
<?php else: ?>
<!--
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=main" onmouseover="roll('img_1', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_all_on.gif')" onmouseout="roll('img_1', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_all_off.gif')"><img alt="<?php echo ($lang['all']);?>" src="<?php $config['url_path'];?>/theme/<?php echo ($config['theme']);?>/images/menu_all_off.gif" border="0" name="img_1" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=lights" onmouseover="roll('img_2', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_on.gif')" onmouseout="roll('img_2', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_off.gif')"><img alt="<?php echo ($lang['lights']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_off.gif" border="0" name="img_2" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=appliances" onmouseover="roll('img_3', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_on.gif')" onmouseout="roll('img_3', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_off.gif')"><img alt="<?php echo ($lang['appliances']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_off.gif" border="0" name="img_3" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=irrigation" onmouseover="roll('img_4', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_on.gif')" onmouseout="roll('img_4', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_off.gif')"><img alt="<?php echo ($lang['irrigation']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_off.gif" border="0" name="img_4" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=hvac" onmouseover="roll('img_5', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_hvac_on.gif')" onmouseout="roll('img_5', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_hvac_off.gif')"><img alt="<?php echo ($lang['hvac']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_hvac_off.gif" border="0" name="img_5" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php" onmouseover="roll('img_6', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_on.gif')" onmouseout="roll('img_6', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.gif')"><img alt="<?php echo ($lang['events']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.gif" border="0" name="img_6" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/admin/setup.php" onmouseover="roll('img_7', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_on.gif')" onmouseout="roll('img_7', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.gif')"><img alt="<?php echo ($lang['setup']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.gif" border="0" name="img_7" /></a></div>
-->
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=main"><img alt="<?php echo ($lang['all']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_all.gif" border="0" name="img_1" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=lights"><img alt="<?php echo ($lang['lights']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights.gif" border="0" name="img_2" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=appliances"><img alt="<?php echo ($lang['appliances']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances.gif" border="0" name="img_3" /></a></div>
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=irrigation"><img alt="<?php echo ($lang['irrigation']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation.gif" border="0" name="img_4" /></a></div>
<!-- <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php?page=hvac"><img alt="<?php echo ($lang['hvac']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_hvac_off.gif" border="0" name="img_5" /></a></div> -->
<!--  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/index.php"><img alt="<?php echo ($lang['events']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.gif" border="0" name="img_6" /></a></div> -->
  <div id="menuitem_img"><a href="<?php echo ($config['url_path']);?>/admin/setup.php"><img alt="<?php echo ($lang['setup']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup.gif" border="0" name="img_7" /></a></div>
<?php endif; ?>
</div>
<!-- end menu div -->
<div id="black_sep"></div><!-- separator div -->

<!-- start submenu div -->
<div id="submenu">
<?php if (substr(strstr($_SERVER['REQUEST_URI'], "admin"), 0, 5) == "admin"): ?>
<div id="submenuitem"><a href="<?php echo ($config['url_path']);?>/admin/heyu.php"><?php echo ($lang['heyusetup']); ?></a></div>
<div id="submenuitem"><a href="<?php echo ($config['url_path']);?>/admin/aliases.php"><?php echo ($lang['aliases']); ?></a></div>
<div id="submenuitem"><a href="<?php echo ($config['url_path']);?>/admin/frontend.php"><?php echo ($lang['frontend']); ?></a></div>
<?php endif; ?>
</div>
<!-- end submenu div -->

<!-- start content -->
<div id="content">
<?php if (!empty($content)) echo($content); ?>
</div>
<!-- end content -->

<!-- start footer div -->
<div id="footer">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
   <td>
     <?php echo ($lang['heyustatus']);?>:
     <?php if (heyu_state_check()): ?>
     	<img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/heyu_on.gif" /> ( <a href="<?php echo ($_SERVER['PHP_SELF']); ?>?daemon=restart"><?php echo ($lang['reload']);?></a> |
	    <a href="<?php echo ($_SERVER['PHP_SELF']); ?>?daemon=stop"><?php echo ($lang['stop']); ?></a> )
     <?php else:  ?>
     	<img src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/heyu_off.gif" /> ( <a href="<?php echo ($_SERVER['PHP_SELF']); ?>?daemon=start"><?php echo ($lang['start']);?></a> )
     <?php endif; ?>

     <?php if (isset($_GET["daemon"])): ?>
     <?php $daemon = $_GET["daemon"]; ?>
     	<?php if ($daemon == "start"): heyu_ctrl($config['heyuexec'], 'start'); ?>
	    <?php elseif ($daemon == "stop"): heyu_ctrl($config['heyuexec'], 'stop');  ?>
	    <?php elseif ($daemon == "restart"): heyu_ctrl($config['heyuexec'], 'restart'); ?>
	    <?php endif; ?>
     <?php endif; ?>
   </td>
   <td>&nbsp;</td>
   <td align="right">
     <a href="<?php echo ($lang['dlurl']); ?>">domus.Link</a> v<?php echo $ver; ?> - <SCRIPT LANGUAGE="JavaScript">copyright_date();</SCRIPT> Istvan Hubay Cebrian
   </td>
  </tr>
</table>
</div>
<!-- end footer div -->

</body>
</html>
<!-- domus.Link - Copyright (c) 2007 - Istvan Cebrian - http://domus.link.co.pt -->