<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="<?php echo $config['url_path']; ?>/theme/mobileWebKit/images/appl-touch-icon.png" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="<?php echo $config['url_path']; ?>/theme/mobileWebKit/iWebKit5.04/Framework/css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="<?php echo $config['url_path']; ?>/theme/mobileWebKit/iWebKit5.04/Framework/javascript/functions.js" type="text/javascript"></script>
<title>domus.Link</title>
<link href="<?php echo $config['url_path']; ?>/theme/mobileWebKit/images/header_logo.png" rel="apple-touch-startup-image" />
</head>
<body>
<div id="topbar">
	<div id="title">domus.Link<?php echo $ver; ?></div>
	<div id="leftbutton">
		<a href="<?php echo $config['url_path']; ?>/index.php?page=domus_home_page"><?php echo $lang['home']; ?></a> </div>
	<div id="rightbutton">
		<a href="<?php echo $config['url_path']; ?>/index.php?page=domus_themeview_page"><?php echo $config['themeview']; ?></a> </div>	
</div>
<?php
if (!isset($page)) 
{
	$page='domus_home_page';
}
?>
<div id="content">
    <?php 
        if (!empty($content))
        {
            echo($content);
        }
        else
        {
         ?>
        <span class="graytitle"><?php echo ($lang['error']); ?></span>
		<ul class="pageitem">
        	<li class="textbox"><span class="header"><?php echo ($lang['error']); ?></span><p>
                 <?php echo $lang['error_no_modules']; ?></p>
            </li>
        </ul>
        <?php
        }
    ?>
</div>
</body>
</html>
<!-- domus.Link - Copyright (c) 2007-2008 - Istvan Cebrian - http://domus.link.co.pt -->
