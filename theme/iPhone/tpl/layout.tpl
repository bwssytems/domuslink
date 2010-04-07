<html>
<head>
<title>
<?php 
if (isset($page)) {
	echo $page . " - ";
}
?>Home</title>
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
<div id="toolbar" class="toolbar">
	<h1 id="pageTitle"></h1>
	<a id="backButton" class="button" href="/domus.Link/#"><?php echo ($lang['home']); ?></a>
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
            /*
            if ($config['seclevel'] == "2") 
            {
                if (isset($_COOKIE["dluloged"])) 
                {
                    ?>
                    <a id='setup_menu' class="button" href="<?php echo ($config['url_path']); ?>/index.php?page=setup"><?php echo ($lang['setup']); ?></a>
                    <?php
                }
                else
                {
                    ?>
                    <a id='login_menu' class="button" href="<?php echo ($config['url_path']); ?>/admin/login.php?page=login&from=<?php echo $page; ?>"><?php echo ($lang['login']); ?></a>
                    <?php
                }
            }
            else
            {
                    ?>
                    <a id='menu_info' class="button" href="<?php echo ($config['url_path']); ?>/index.php?page=info"><?php echo ($lang['info']); ?></a>
                    <?php
            }
            */
		}
	?>            
</div>
<?php
if (!isset($page)) 
{
	$page='home';
}

if ( ($page == "lights") || ($page == "shutters") || ($page == "other") || ($page == "appliances") || ($page == "irrigation") || ($page == "all") )
{
    ?>
    <div id='generated_id_content_for_<?php echo $page;?>' class="panel" selected='true'>
    <?php 
        if (!empty($content))
        {
            echo($content);
        }
        else
        {
         ?>
         <div id="error" title="<?php echo ($lang['error']); ?>" class="white">
         	<div align="center">
                <h2><?php echo ($lang['error']); ?></h2>
                <h5>
                    <p align="center" style="padding-left:10px; text-align:center"><?php echo $lang['error_no_modules']; ?></p>
                </h5>
            </div>
        </div>
        <br>
         <?php
        }
    ?>
    </div>
    <?php
}
else
{
    if (!empty($content))
    {
        ?>
        <span id='generated_content_for_<?php echo $page;?>' selected='true'>
            <?php echo($content); ?>
        </span>
        <?php
    }
    else
    {
        ?>
        <span id='generated_content_for_<?php echo $page;?>' class="panel" selected='true'>    
            <div id="error" title="<?php echo ($lang['error']); ?>" class="white">
                <div align="center">
                    <h2><?php echo ($lang['error']); ?></h2>
                    <h5>
                        <p align="center" style="padding-left:10px; text-align:center"><?php echo $lang['error_no_modules']; ?></p>
                    </h5>
                </div>
            </div>
            <br>
        </span>
        <?php
    }
}
?>
<!-- end content -->
</body>
</html>
<!-- domus.Link - Copyright (c) 2007-2008 - Istvan Cebrian - http://domus.link.co.pt -->
