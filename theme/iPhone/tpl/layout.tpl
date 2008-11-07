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
<script>
if (document.getElementById('toolbar')) {
	alert('We hebben al een toolbar');
}
</script>
</head>
<body>
<div id="toolbar" class="toolbar">
	<h1 id="pageTitle"></h1>
	<a id="backButton" class="button" href="/domus.Link/#">Home</a>
	<?php
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
			    <a id='menu_info' class="button" href="<?php echo ($config['url_path']); ?>/index.php?page=<?php echo $page;?>&action=info"><?php echo ($lang['info']); ?></a>
				<?php
		}
	?>            
</div>
<?php 
	if (!empty($content))
	{
		echo($content);
	}
	else
	{
		echo "no content";
	}
?>
<!-- end content -->
</body>
</html>
<!-- domus.Link - Copyright (c) 2007-2008 - Istvan Cebrian - http://domus.link.co.pt -->