<html>
<head>
<title><?php echo $page;?>- Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo ($config['url_path']);?>/theme/iPhone/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo ($config['url_path']);?>/theme/iPhone/images/apple-touch-icon.png"/> 
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<script type="application/x-javascript" src="<?php echo ($config['url_path']);?>/theme/iPhone/iui/iui.js"></script>
<style type="text/css" media="screen">
@import "<?php echo ($config['url_path']);?>/theme/iPhone/iui/iui.css";
@import "<?php echo ($config['url_path']);?>/theme/iPhone/iPhone.css";
</style>
</head>
<body>
<?php 
$selectedHome=false;
$selectedContent=false;
if ($page=='home')
{ 
	if (empty($_GET['action']))
    {
        $selectedHome="selected='true'";
        ?>
        <div class="toolbar">
            <h1 id="pageTitle"></h1>
            <a id="backButton" class="button" href="/domus.Link/#"><?php echo ($lang['home']); ?></a>
            <?php
                if ($config['seclevel'] == "2") 
                {
                    if (isset($_COOKIE["dluloged"])) 
                    {
                        ?>
                       <a class="button" href="/domus.Link/#setupmenu"><?php echo ($lang['setup']); ?></a>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <a class="button" href="/domus.Link/#setupmenu"><?php echo ($lang['setup']); ?></a>
                    <?php
                }
            ?>            
            
        </div>
        <?php            
    }
    else
    {
        if ($_GET['action']=='info')
        {
            $page='info';
        }
        $selectedContent="selected='true'";
    }
}
else
{
    $selectedContent="selected='true'";
}
?>

<ul id="home" title="<?php echo ($lang['home']); ?>" <?php echo $selectedHome;?>>
	<li><a href="<?php echo ($config['url_path']); ?>/index.php?page=lights"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_lights_on.png">&nbsp;&nbsp;<?php echo ($lang['lights']); ?></a></li>
	<li><a href="<?php echo ($config['url_path']); ?>/index.php?page=appliances"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_appliances_on.png">&nbsp;&nbsp;<?php echo ($lang['appliances']); ?></a></li>
	<li><a href="<?php echo ($config['url_path']); ?>/index.php?page=irrigation"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_irrigation_on.png">&nbsp;&nbsp;<?php echo ($lang['irrigation']); ?></a></li>
    <!--Setup is not yet working correctly-->
    <?php
        if ($config['seclevel'] == "2") 
        {
            if (!isset($_COOKIE["dluloged"])) 
            {
                ?>
                <li><a href="<?php echo ($config['url_path']); ?>/admin/login.php?page=login&from=aliases"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_setup_on.png">&nbsp;&nbsp;<?php echo ($lang['login']); ?></a></li>
                <?php
            }
            else
            {
                ?>
                <li><a href="#setupmenu"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_setup_on.png">&nbsp;&nbsp;<?php echo ($lang['setup']); ?></a></li>
                <?php
            }
        }
        else
        {
            ?>
            <li><a href="#setupmenu"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_setup_on.png">&nbsp;&nbsp;<?php echo ($lang['setup']); ?></a></li>
            <?php
        }
    ?>
    
	<li><a href="#status"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_home_on.png">&nbsp;&nbsp;<?php echo ($lang['heyustatus']);?></a></li>
    <li><a href="<?php echo ($config['url_path']); ?>/index.php?page=about"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_about_on.png">&nbsp;&nbsp;About</a></li>
</ul>


<!-- SETUP SECTION -->
<ul id="setupmenu" title="Setup">
	<li><a href="<?php echo ($config['url_path']); ?>/admin/aliases.php"><?php echo ($lang['aliases']); ?></a></li>
	<li><a href="<?php echo ($config['url_path']); ?>/admin/floorplan.php"><?php echo ($lang['floorplan']); ?></a></li>
	<li><a href="<?php echo ($config['url_path']); ?>/admin/frontend.php"><?php echo ($lang['frontend']); ?></a></li>
	<li><a href="<?php echo ($config['url_path']); ?>/admin/heyu.php?action=edit"><?php echo ($lang['heyusetup']); ?></a></li>
</ul>

<!-- STATUS SECTION -->
<div id="status" title="<?php echo ($lang['status']); ?>" class="panel">
        <h2><?php echo ($lang['heyustatus']);?>: 
        <?php if (heyu_running()): ?>
        	<?php echo $lang['running']; ?>
        <?php else:  ?>
        	<?php echo $lang['down']; ?>
        <?php endif; ?>
        </h2>
        <fieldset>
            <p align="center">
                <?php if (heyu_running()): ?>
                    <img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-ok-128x128.png"><BR>
                    <a href="<?php echo ($config['url_path']);?>/index.php?page=<?php echo $page; ?>&action=info"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-info-032x032.png"></a> | 
                    <a href="<?php echo ($config['url_path']);?>/?daemon=restart"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-reload-032x032.png"></a> | 
                    <a href="<?php echo ($config['url_path']);?>/?daemon=stop"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-032x032.png"></a>
					<BR>
                    <span style="width:32px"><a href="<?php echo ($config['url_path']);?>/index.php?page=<?php echo $page; ?>&action=info"><?php echo ($lang['info']);?></a></span> | 
                    <span style="width:32px"><a href="<?php echo ($config['url_path']);?>/?daemon=restart"><?php echo ($lang['reload']);?></a></span> |
                    <span style="width:32px"><a href="<?php echo ($config['url_path']);?>/?daemon=stop"><?php echo ($lang['stop']);?></a></span> |
                <?php else:  ?>
                    <img alt="<?php echo $lang['down']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-128x128.png"><BR>
                    <BR>
                    <a href="<?php echo ($config['url_path']);?>/?daemon=start"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-ok-032x032.png"></a>
                    <BR>
                    <a href="<?php echo ($config['url_path']);?>/?daemon=start"><?php echo ($lang['start']);?></a>
                <?php endif; ?>
            </p>
        </fieldset>
        <h2>Uptime</h2>
            <fieldset style="padding:5px;">
            <p align="left" style="margin:5px;">
				<?php echo (uptime()); ?>
            </p>
        </fieldset>      
</div>

<!-- <?php echo $page; ?> SECTION -->
<div id="<?php echo $page; ?>" class="panel" <?php echo $selectedContent;?>>
	<?php 
		if (!empty($content))
        {
			echo($content);
		}
        else
        {
			echo("No content");
		}
	?>
</div>

<!-- end content -->
</body>
</html>
<!-- domus.Link - Copyright (c) 2007-2008 - Istvan Cebrian - http://domus.link.co.pt -->