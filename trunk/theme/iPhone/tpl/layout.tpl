<html>
<head>
<title>domus.Link</title>
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
	<a id="backButton" class="button" href="#"></a>
	<a class="button" href="<?php echo $config['url_path']; ?>/index.php?page=domus_themeview_page" target="_self"><?php echo $config['themeview']; ?></a>
</div>
<?php
if (!isset($page)) 
{
	$page='domus_home_page';
}

if ($page != "domus_home_page" || $login == "login")
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
}
?>
<!-- end content -->
</body>
</html>
<!-- domus.Link - Copyright (c) 2007-2008 - Istvan Cebrian - http://domus.link.co.pt -->
