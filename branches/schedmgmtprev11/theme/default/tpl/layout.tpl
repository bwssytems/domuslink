<!--
/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
 -->
<html>

<head>
  <title><?php echo ($lang['title']); ?> - <?php echo $title; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/<?php echo ($config['theme']); ?>.css" />
  <link rel="shortcut icon" href="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/images/favicon.ico" type="image/x-icon" />
  <?php if (strpos($_SERVER['PHP_SELF'], "index.php") != false && $config['refresh'] != ""): ?>
  <META HTTP-EQUIV=Refresh CONTENT="<?php echo ($config['refresh']); ?>">
  <?php endif; ?>
  <script type="application/x-javascript" src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/javascript/browser_detect.js"></script>
  <script type="application/x-javascript" src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/javascript/popup.js"></script>

  <SCRIPT LANGUAGE="JavaScript">
  <!--
	function copyrightDate() 
	{
		today = new Date();
		ynow = today.getFullYear();
		ystart = '2007';
		
		if (ystart == ynow)
			document.write("&copy; "+ystart);
		else
			document.write("&copy; "+ ystart +" - "+ynow);
	}
	
	function imgRoll(img_name, img_src)
	{
		document[img_name].src = img_src;
	}
	
	function divShowHide(div, state)
	{
		if (state) 
		{
			if (state == 'visible')
				div.style.display = '';
			else
				div.style.display = 'none';
		}
		else
		{
			if (div.style.display == '')
				div.style.display = 'none';
			else
				div.style.display = '';
		}
	}
  //-->
  </SCRIPT>

  <!--[if IE]>
  <style type="text/css">
    #content { width: 100%; }
    #footer  { width: 100%; }
  </style>
  <![endif]-->
</head>

<body>

<!-- start header div -->
<div id="header">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
   <td><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/header_left.gif" border="0" /></td>
   <td width="100%" align="left"><a href="<?php echo ($config['url_path']); ?>/index.php?page=about"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/1px.gif" width="30px" border="0" /><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/header_logo.gif" border="0" /></a></td>
   <td><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/header_right.gif" border="0" /></td>
</tr>
</table>
</div>
<!-- end header div -->

<!-- start menu div -->
<div id="menu">
<?php if ($config['imgs'] == "OFF"): ?>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=home"><?php echo ($lang['home']); ?></a></p></div>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=lights"><?php echo ($lang['lights']); ?></a></p></div>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=appliances"><?php echo ($lang['appliances']); ?></a></p></div>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=shutters"><?php echo ($lang['shutters']); ?></a></p></div>  
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=irrigation"><?php echo ($lang['irrigation']); ?></a></p></div>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=other"><?php echo ($lang['other']); ?></a></p></div>  
  <div id="menuitem"><p><a href="#" onclick="divShowHide(setupmenu, 'hidden'); divShowHide(eventsmenu);"><?php echo ($lang['events']); ?></a></p></div>
  <div id="menuitem"><p><a href="#" onclick="divShowHide(eventsmenu, 'hidden'); divShowHide(setupmenu);"><?php echo ($lang['setup']); ?></a></p></div>
<?php else: ?>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=home" onmouseover="imgRoll('img_1', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_on.png')" onmouseout="imgRoll('img_1', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_off.png')"><img alt="<?php echo ($lang['home']);?>" src="<?php echo($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_off.png" border="0" name="img_1" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=lights" onmouseover="imgRoll('img_2', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_on.png')" onmouseout="imgRoll('img_2', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_off.png')"><img alt="<?php echo ($lang['lights']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_off.png" border="0" name="img_2" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=appliances" onmouseover="imgRoll('img_3', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_on.png')" onmouseout="imgRoll('img_3', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_off.png')"><img alt="<?php echo ($lang['appliances']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_off.png" border="0" name="img_3" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=shutters" onmouseover="imgRoll('img_4', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_shutters_on.png')" onmouseout="imgRoll('img_4', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_shutters_off.png')"><img alt="<?php echo ($lang['shutters']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_shutters_off.png" border="0" name="img_4" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=irrigation" onmouseover="imgRoll('img_5', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_on.png')" onmouseout="imgRoll('img_5', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_off.png')"><img alt="<?php echo ($lang['irrigation']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_off.png" border="0" name="img_5" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=other" onmouseover="imgRoll('img_6', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_other_on.png')" onmouseout="imgRoll('img_6', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_other_off.png')"><img alt="<?php echo ($lang['other']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_other_off.png" border="0" name="img_6" /></a></div>
  <div id="menuitem"><a href="#" onclick="divShowHide(setupmenu, 'hidden'); divShowHide(eventsmenu);" onmouseover="imgRoll('img_7', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_on.png')" onmouseout="imgRoll('img_7', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.png')"><img alt="<?php echo ($lang['events']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.png" border="0" name="img_7" /></a></div>
  <div id="menuitem"><a href="#" onclick="divShowHide(eventsmenu, 'hidden'); divShowHide(setupmenu);" onmouseover="imgRoll('img_8', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_on.png')" onmouseout="imgRoll('img_8', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.png')"><img alt="<?php echo ($lang['setup']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.png" border="0" name="img_8" /></a></div>
<?php endif; ?>
</div>
<!-- end menu div -->

<div id="black_sep1"></div><!-- separator div -->

<!-- start events div -->
<div id="eventsmenu" style="display:none">
  <div id="menuspacer"  style="height: 18px; width: 16.8%; float: right; border-left: 1px solid #ccc;">&nbsp;</div>
  <div id="eventsmenuitem"><a href="<?php echo ($config['url_path']);?>/events/upload.php"><?php echo ($lang['upload']); ?></a></div>
  <div id="eventsmenuitem"><a href="<?php echo ($config['url_path']);?>/events/triggers.php"><?php echo ($lang['triggers']); ?></a></div>
  <div id="eventsmenuitem"><a href="<?php echo ($config['url_path']);?>/events/timers.php"><?php echo ($lang['timers']); ?></a></div>
  <div id="eventsmenuitem"><a href="<?php echo ($config['url_path']);?>/events/macros.php"><?php echo ($lang['macros']); ?></a></div>
</div>
<?php if (substr(strstr($_SERVER['REQUEST_URI'], "events"), 0, 6) == "events"): ?>
<SCRIPT LANGUAGE="JavaScript">divShowHide(eventsmenu, 'visible');</SCRIPT>
<?php endif; ?>
<!-- end setup div -->

<!-- start setup div -->
<div id="setupmenu" style="display:none">
  <?php if ($authenticated): ?><div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/login.php?action=logout"><?php echo ($lang['logout']); ?></a></div><?php endif; ?>
  <div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/heyu.php"><?php echo ($lang['heyusetup']); ?></a></div>
  <div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/frontend.php"><?php echo ($lang['frontend']); ?></a></div>
  <div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/floorplan.php"><?php echo ($lang['floorplan']); ?></a></div>
  <div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/aliases.php"><?php echo ($lang['aliases']); ?></a></div>
  <div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/utility.php"><?php echo ($lang['utility']); ?></a></div>
</div>
<?php if (substr(strstr($_SERVER['REQUEST_URI'], "admin"), 0, 5) == "admin"): ?>
<SCRIPT LANGUAGE="JavaScript">divShowHide(setupmenu, 'visible');</SCRIPT>
<?php endif; ?>
<!-- end setup div -->

<!-- start content -->
<div id="content">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
 <tr>
  <td align="center">
  <?php if (!empty($content)) echo($content); ?>
  </td>
 </tr>
</table>
</div>
<!-- end content -->

<!-- start footer div -->
<div id="footer">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
 <tr>
  <td>
<?php echo ($lang['heyustatus']);?>:
<?php if (heyu_running()): ?>
<?php echo $lang['running']; ?> (<a href="<?php echo ($config['url_path']);?>/index.php?page=info"><?php echo strtolower($lang['info']);?></a>|<a href="<?php echo ($config['url_path']);?>/?daemon=restart"><?php echo ($lang['reload']);?></a>|<a href="<?php echo ($config['url_path']);?>/?daemon=stop"><?php echo ($lang['stop']); ?></a>)
<?php else:  ?>
<?php echo $lang['down']; ?> (<a href="<?php echo ($config['url_path']);?>/?daemon=start"><?php echo ($lang['start']);?></a>)
<?php endif; ?>
</td>
<td align="center"><?php echo $lang['heyucurrentconfig'].": ".$config['heyu_config_name']." ".$lang['heyuindir']." ".$config['heyu_base_real'].($config['heyu_subdir'] == "default"?"":$config['heyu_subdir'])?></td>
<td align="right"><?php echo (uptime()); ?></td>
</tr>
</table>
</div>
<!-- end footer div -->
<br>
<div id="copyright"><a href="<?php echo ($lang['dlurl']); ?>" target="_blank">domus.Link :: Heyu Frontend</a> v<?php echo $ver; ?>
<br>Copyright <SCRIPT LANGUAGE="JavaScript">copyrightDate();</SCRIPT><br><a href="http://icebrian.net" target="_blank">Istvan Hubay Cebrian</a></div>
</body>
</html>