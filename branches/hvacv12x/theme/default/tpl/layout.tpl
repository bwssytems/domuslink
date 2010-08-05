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
  <script type="application/x-javascript" src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/javascript/editableselect.js"></script>
  <script type="application/x-javascript" src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/javascript/progressbar.js"></script>

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
<?php if ($config['rcs_support']=='ON') { ?>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=hvac"><?php echo ($lang['hvac']); ?></a></p></div>  
<?php } ## end if ?>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=other"><?php echo ($lang['other']); ?></a></p></div>  
  <div id="menuitem"><p><a href="#" onclick="divShowHide(setupmenu, 'hidden'); divShowHide(eventsmenu);"><?php echo ($lang['events']); ?></a></p></div>
  <div id="menuitem"><p><a href="#" onclick="divShowHide(eventsmenu, 'hidden'); divShowHide(setupmenu);"><?php echo ($lang['setup']); ?></a></p></div>
<?php else: ?>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=home" onmouseover="imgRoll('img_1', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_on.png')" onmouseout="imgRoll('img_1', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_off.png')"><img alt="<?php echo ($lang['home']);?>" src="<?php echo($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_off.png" border="0" name="img_1" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=lights" onmouseover="imgRoll('img_2', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_on.png')" onmouseout="imgRoll('img_2', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_off.png')"><img alt="<?php echo ($lang['lights']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_lights_off.png" border="0" name="img_2" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=appliances" onmouseover="imgRoll('img_3', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_on.png')" onmouseout="imgRoll('img_3', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_off.png')"><img alt="<?php echo ($lang['appliances']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_appliances_off.png" border="0" name="img_3" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=shutters" onmouseover="imgRoll('img_4', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_shutters_on.png')" onmouseout="imgRoll('img_4', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_shutters_off.png')"><img alt="<?php echo ($lang['shutters']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_shutters_off.png" border="0" name="img_4" /></a></div>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=irrigation" onmouseover="imgRoll('img_5', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_on.png')" onmouseout="imgRoll('img_5', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_off.png')"><img alt="<?php echo ($lang['irrigation']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_irrigation_off.png" border="0" name="img_5" /></a></div>
<?php if ($config['rcs_support']=='ON') { ?>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=hvac" onmouseover="imgRoll('img_6', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_hvac_on.png')" onmouseout="imgRoll('img_6', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_hvac_off.png')"><img alt="<?php echo ($lang['hvac']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_hvac_off.png" border="0" name="img_6" /></a></div>
<?php } ## end if ?>
  <div id="menuitem"><a href="<?php echo ($config['url_path']);?>/index.php?page=other" onmouseover="imgRoll('img_7', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_other_on.png')" onmouseout="imgRoll('img_7', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_other_off.png')"><img alt="<?php echo ($lang['other']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_other_off.png" border="0" name="img_7" /></a></div>
  <div id="menuitem"><a href="#" onclick="divShowHide(setupmenu, 'hidden'); divShowHide(eventsmenu);" onmouseover="imgRoll('img_8', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_on.png')" onmouseout="imgRoll('img_8', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.png')"><img alt="<?php echo ($lang['events']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.png" border="0" name="img_8" /></a></div>
  <div id="menuitem"><a href="#" onclick="divShowHide(eventsmenu, 'hidden'); divShowHide(setupmenu);" onmouseover="imgRoll('img_9', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_on.png')" onmouseout="imgRoll('img_9', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.png')"><img alt="<?php echo ($lang['setup']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.png" border="0" name="img_9" /></a></div>
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
  <div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/aliases.php"><?php echo ($lang['aliases']); ?></a></div>
  <div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/utility.php"><?php echo ($lang['utility']); ?></a></div>
  <div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/modconfig.php"><?php echo ($lang['modconfig']); ?></a></div>
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
<tr style="vertical-align: top; white-space: nowrap;">
<td align="left" width="33%">
<?php echo ($lang['heyustatus']);?>:
<a onMouseOver="popup('<?php echo ($lang['statusinfo']); ?>')" onmouseout="kill()" onfocus="this.blur()" href="<?php echo ($config['url_path']);?>/index.php?page=status">
<?php if (heyu_running()): ?>
<?php echo ("<font color='green'>".$lang['running']."</font>"); ?>
<?php else:  ?>
<?php echo ("<font color='red'>".$lang['down']."</font>"); ?>
<?php endif; ?>
</a>
</td>
<td align="center" width="33%" style="padding: 0em 2em 0em 2em;">
<?php if ($config['rcs_support']=='ON' && $authenticated) {
echo $lang['hvac']." - [ ";
$temp=implode(execute_cmd($config['heyuexecreal']." rcs_req preset ".$config['rcs_housecode']."5 1", true)); $temp=(explode(" ",$temp)); echo $lang['temperature'].": ".$temp[5]."&#176";
$mode=implode(execute_cmd($config['heyuexecreal']." rcs_req preset ".$config['rcs_housecode']."5 3", true)); $mode=(explode(" ",$mode)); echo " ".$lang['mode'].": ".$mode[5];
$setpoint=implode(execute_cmd($config['heyuexecreal']." rcs_req preset ".$config['rcs_housecode']."5 2", true)); $setpoint=(explode(" ",$setpoint)); echo " ".$lang['setpoint'].": "?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=sp&change=dec&page=<?php echo $page; ?>">
<img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/arrow-d.png" border="0" align="absmiddle"/>
</a>
<?php echo " ".$setpoint[5]."&#176"; ?>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=sp&change=inc&page=<?php echo $page; ?>">
<img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/arrow-u.png" border="0" align="absmiddle"/>
</a>
<?php echo "]";
} ## end if ?>
</td>
<td align="right" width="33%">
<?php echo $lang['heyucurrentconfig'].": ".$_SESSION['frontObj']->getHeyuConfigName()." ".$lang['heyuindir']." ".$config['heyu_base_real'].($config['heyu_subdir'] == "default"?" ":$config['heyu_subdir']." ")?>
<a onMouseOver="popup('<?php echo ($lang['diagnosticstatus']); ?>')" onmouseout="kill()" onfocus="this.blur()" href="<?php echo $config['url_path'];?>/utility/diagnostic.php" >
<img src="<?php echo ($config['url_path']."/theme/".$config['theme']."/images/".(isset($_SESSION['filesErrored'])?($_SESSION['filesErrored']?"red_info.png":"green_info.png"):"black_info.png"));?>" border=0 align="absmiddle"/>
</a>
</td>
</table>
</div>
<!-- end footer div -->
<br>
<div id="copyright">
domus.Link :: Heyu Frontend v<?php echo $ver; ?>
<br>Copyright <SCRIPT LANGUAGE="JavaScript">copyrightDate();</SCRIPT>
<br><a href="<?php echo ($lang['dlurl']); ?>" target="_blank">domus.Link is free software released under the General Public Licence.</a>
</div>
</body>
</html>
