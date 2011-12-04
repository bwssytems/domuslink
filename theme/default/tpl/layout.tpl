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
  <script type="application/x-javascript" src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/javascript/progressbar.js"></script>
  <script type="application/x-javascript" src="<?php echo ($config['url_path']); ?>/theme/<?php echo ($config['theme']); ?>/javascript/public_smo_scripts.js"></script>

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
   <td width="100%" align="left"><a href="<?php echo ($config['url_path']); ?>/index.php?page=domus_about_page"><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/1px.gif" width="30px" border="0" /><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/header_logo.gif" border="0" /></a></td>
   <td><img src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/header_right.gif" border="0" /></td>
</tr>
</table>
</div>
<!-- end header div -->
<?php $cellWidth = strval(intval(100/(count($groups)+3)))."%";?>
<SCRIPT LANGUAGE="JavaScript">changecss('div#menuitem','width','<?php echo $cellWidth; ?>');</SCRIPT>
<!-- start menu div -->
<div id="menu">
<?php if ($config['imgs'] == "OFF"): ?>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=domus_home_page"><?php echo ($lang['home']); ?></a></p></div>
<?php else: ?>
  <div id="menuitem"><table><tr><td><a href="<?php echo ($config['url_path']);?>/index.php?page=domus_home_page" onmouseover="imgRoll('img_1', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_on.png')" onmouseout="imgRoll('img_1', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_off.png')"><img alt="<?php echo ($lang['home']);?>" src="<?php echo($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_home_off.png" border="0" name="img_1" /></a></td></tr><tr><td id="menuitem"><?php echo ($lang['home']); ?></td></tr></table></div>
<?php endif; ?>
<?php $i = 2; ?>
<?php foreach($groups as $group): ?>
<?php if ($group->getVisible() && $_SESSION['frontObj']->getHeyuConf()->groupHasDisplayableModules($group->getType(), $config['themeview'], $sec_level, $sec_level_type)): ?>
<?php if ($config['imgs'] == "OFF"): ?>
  <div id="menuitem"><p><a href="<?php echo ($config['url_path']); ?>/index.php?page=<?php echo $group->getType(); ?>"><?php echo $group->getType(); ?></a></p></div>
<?php else: ?>
  <div id="menuitem"><table><tr><td><a href="<?php echo ($config['url_path']);?>/index.php?page=<?php echo $group->getType(); ?>" onmouseover="imgRoll('img_<?php echo $i;?>', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_<?php echo $group->getGroupImage();?>_on.png')" onmouseout="imgRoll('img_<?php echo $i;?>', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_<?php echo $group->getGroupImage();?>_off.png')"><img alt="<?php echo $group->getType();?>" src="<?php echo($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_<?php echo $group->getGroupImage();?>_off.png" border="0" name="img_<?php echo $i;?>" /></a></td></tr><tr><td id="menuitem"><?php echo $group->getType(); ?></td></tr></table></div>
<?php endif; ?>
<?php $i++; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php if ($config['imgs'] == "OFF"): ?>
  <?php if ($sec_level <= 1): ?>    
  	<div id="menuitem"><p><a href="#" onclick="divShowHide(setupmenu, 'hidden'); divShowHide(eventsmenu);"><?php echo ($lang['events']); ?></a></p></div>
	<div id="menuitem"><p><a href="#" onclick="divShowHide(eventsmenu, 'hidden'); divShowHide(setupmenu);"><?php echo ($lang['setup']); ?></a></p></div>
  <?php else: ?>    
	<div id="menuitem"><p><a href="#" onclick="divShowHide(setupmenu);"><?php echo ($lang['setup']); ?></a></p></div>
  <?php endif; ?>
<?php else: ?>
  <?php if ($sec_level <= 1): ?>
  	<?php $i++; ?>    
	  <div id="menuitem"><table><tr><td><a href="#" onclick="divShowHide(setupmenu, 'hidden'); divShowHide(eventsmenu);" onmouseover="imgRoll('img_<?php echo $i;?>', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_on.png')" onmouseout="imgRoll('img_<?php echo $i;?>', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.png')"><img alt="<?php echo ($lang['events']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_events_off.png" border="0" name="img_<?php echo $i;?>" /></a></td></tr><tr><td id="menuitem"><?php echo ($lang['events']); ?></td></tr></table></div>
  	<?php $i++; ?>    
      <div id="menuitem"><table><tr><td><a href="#" onclick="divShowHide(eventsmenu, 'hidden'); divShowHide(setupmenu);" onmouseover="imgRoll('img_<?php echo $i;?>', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_on.png')" onmouseout="imgRoll('img_<?php echo $i;?>', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.png')"><img alt="<?php echo ($lang['setup']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.png" border="0" name="img_<?php echo $i;?>" /></a></td></tr><tr><td id="menuitem"><?php echo ($lang['setup']); ?></td></tr></table></div>
  <?php else: ?>    
  	<?php $i++; ?>    
      <div id="menuitem"><table><tr><td><a href="#" onclick="divShowHide(setupmenu);" onmouseover="imgRoll('img_<?php echo $i;?>', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_on.png')" onmouseout="imgRoll('img_<?php echo $i;?>', '<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.png')"><img alt="<?php echo ($lang['setup']);?>" src="<?php echo ($config['url_path']);?>/theme/<?php echo ($config['theme']);?>/images/menu_setup_off.png" border="0" name="img_<?php echo $i;?>" /></a></td></tr><tr><td id="menuitem"><?php echo ($lang['setup']); ?></td></tr></table></div>
  <?php endif; ?>
<?php endif; ?>
</div>
<!-- end menu div -->

<div id="black_sep1"></div><!-- separator div -->

<?php if ($sec_level <= 1): ?>    
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
<?php endif; ?>

<!-- start setup div -->
<div id="setupmenu" style="display:none">
  <?php if (strtolower($config['use_domus_security']) != 'off'): ?>
  	<div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/login.php?action=logout"><?php echo ($lang['logout']); ?></a></div>
  <?php endif; ?>
  <?php if ($sec_level == 0): ?>
  	<div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/groups.php"><?php echo ($lang['groups']); ?></a></div>
  	<div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/users.php"><?php echo ($lang['users']); ?></a></div>
  	<div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/heyu.php"><?php echo ($lang['heyusetup']); ?></a></div>
  	<div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/frontend.php"><?php echo ($lang['frontend']); ?></a></div>
  	<div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/aliases.php"><?php echo ($lang['aliases']); ?></a></div>
  	<div id="setupmenuitem"><a href="<?php echo ($config['url_path']);?>/admin/utility.php"><?php echo ($lang['utility']); ?></a></div>
  <?php endif; ?>
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
<!--  Heyu Status on left of bar -->
<td align="left">
<?php if(intval($config['refresh']) > 0): ?>
	<a class=info href="#">
	<img src="<?php echo ($config['url_path']."/theme/".$config['theme']."/images/arrow_refresh.png");?>" border=0 alt="<?php echo ($lang['refreshinfo'].$config['refresh']); ?>" title="<?php echo ($lang['refreshinfo'].$config['refresh']); ?>" />
	</a>
<?php endif; ?>
<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_browserinfo_page">
<img src="<?php echo ($config['url_path']."/theme/".$config['theme']."/images/exclamation.png");?>" border=0 alt="<?php echo ($_SERVER['HTTP_USER_AGENT']); ?>" title="<?php echo ($_SERVER['HTTP_USER_AGENT']); ?>" />
</a>
<?php if (heyu_running()): ?>
	<?php echo ("<font color='green'>".$lang['heyustatus']."</font>");?>:
	<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_status_page" title="<?php echo ($lang['statusinfo']); ?>"><?php echo ($lang['running']); ?>
<?php else:  ?>
	<?php echo ("<font color='red'>".$lang['heyustatus']."</font>");?>:
	<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_status_page" title="<?php echo ($lang['statusinfo']); ?>"><?php echo ($lang['down']); ?>
<?php endif; ?>
</a>
</td>
<!--  Heyu Theme view in center of bar -->
<td align="center">
<?php echo ($lang['themeview']);?>:
<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_themeview_page" title="<?php echo ($lang['themeviewinfo']); ?>"><?php echo $config['themeview']; ?>
</a>
</td>
<!--  HVAC in center of bar -->
<?php if($config['hvac_house_code'] != ''): ?>
	<td align="center" width="33%">
	<?php echo $lang["hvac"]." - ["; ?>
	<?php $result_arr=heyu_action($config, "hvac_control", $config['hvac_house_code'], null, null, "temp"); echo " ".$lang['temperature'].": ".($result_arr[0] != "Error in HVAC result" ? $result_arr[0] : "??"); ?>&#176
	<?php $result_arr=heyu_action($config, "hvac_control", $config['hvac_house_code'], null, null, "mode"); echo " ".$lang['hvacmode'].": ".($result_arr[0] != "Error in HVAC result" ? $lang[trim($result_arr[0])] : $lang['OFF']); ?>
	<?php $result_arr=heyu_action($config, "hvac_control", $config['hvac_house_code'], null, null, "setpoint"); echo " ".$lang['setpoint'].": ".($result_arr[0] != "Error in HVAC result" ? $result_arr[0] : "??"); ?>&#176
	<?php echo "]"; ?>
	</td>
<?php endif; ?>
<!--  Heyu Diagnostics in right of bar -->
<td align="right" width="33%">
<?php echo $lang['heyucurrentconfig'].": ".$_SESSION['frontObj']->getHeyuConfigName()." ".$lang['heyuindir']." ".$config['heyu_base_real'].($config['heyu_subdir'] == "default"?" ":$config['heyu_subdir']." ")?>
<?php if($sec_level == 0): ?>
	<a href="<?php echo $config['url_path'];?>/utility/diagnostic.php" >
	<img src="<?php echo ($config['url_path']."/theme/".$config['theme']."/images/".(isset($_SESSION['filesErrored'])?($_SESSION['filesErrored']?"red_info.png":"green_info.png"):"black_info.png"));?>" border=0 alt="<?php echo ($lang['diagnosticstatus']); ?>" title="<?php echo ($lang['diagnosticstatus']); ?>" />
<?php else: ?>
	<a href="#" >
	<img src="<?php echo ($config['url_path']."/theme/".$config['theme']."/images/".(isset($_SESSION['filesErrored'])?($_SESSION['filesErrored']?"red_info.png":"green_info.png"):"black_info.png"));?>" border=0 alt="<?php echo ($lang['diagnosticstatususer']); ?>" title="<?php echo ($lang['diagnosticstatususer']); ?>"/>
<?php endif; ?>
</a>
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