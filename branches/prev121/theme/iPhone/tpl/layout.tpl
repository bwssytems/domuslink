<?php 
if (!isset($page))
{
	$page='home';
}
?>

<html>
<head>
<title><?php echo $page; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo ($config['url_path']);?>/theme/iPhone/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo ($config['url_path']);?>/theme/iPhone/images/apple-touch-icon.png"/> 
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<script type="application/x-javascript" src="<?php echo ($config['url_path']);?>/theme/iPhone/iWebKit5.04/Framework/javascript/functions.js"></script>
<style type="text/css" media="screen">
@import "<?php echo ($config['url_path']); ?>/theme/iPhone/iWebKit5.04/Framework/css/developer-style.css";
@import "<?php echo ($config['url_path']); ?>/theme/iPhone/iPhone.css";

</style>
</head>
<body>
<div id="topbar">
	<div id="title">domus.Link V1.2</div>
	<div id="leftbutton"> <a id="backButton" class="button" href="<?php echo ($config['url_path']); ?>/"><?php echo ($lang['home']); ?></a> </div>
	<div id="rightbutton">
	<?php
    	if (isset($back_button))
        {
            ?>
            <a id='<?php echo ($back_button['name']); ?>_menu' class="button" href="<?php echo ($config['url_path']); ?><?php echo ($back_button['link']); ?>"><?php echo ($back_button['text']); ?></a>
            <?php
        }
        else
        {
            ?>
            <a id='menu_info' class="button" href="<?php echo ($config['url_path']); ?>/index.php?page=info"><?php echo ($lang['info']); ?></a>
            <?php        
		}
	?>            
	
	</div>	
</div>
<?php
if ( ($page == "lights") || ($page == "shutters") || ($page == "other") || ($page == "appliances") || ($page == "irrigation") || ($page == "all") )
{
	$div_class='musiclist';
}
?>
<div id='generated_id_content_for_<?php echo $page;?>'  class="<?php echo $div_class;?>" selected='true'>
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
				<li class="textbox">
					<p align="center">
						<?php echo $lang['error_no_modules']; ?>
					</p>
				</li>
			</ul>
			<br>
			<?php
		}
	?>
</div>
<!-- end content -->
</body>
</html>
<!-- domus.Link - Copyright (c) 2007-2008 - Istvan Cebrian - http://domus.link.co.pt -->
