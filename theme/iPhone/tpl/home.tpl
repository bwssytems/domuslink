<ul id="home" title="<?php echo ($lang['home']); ?>">
	<li><a id='menu_all' href="<?php echo ($config['url_path']); ?>/index.php?page=all"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_home_on.png">&nbsp;&nbsp;<?php echo ($lang['floorplan']); ?></a></li>    
	<li><a id='menu_lights' href="<?php echo ($config['url_path']); ?>/index.php?page=lights"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_lights_on.png">&nbsp;&nbsp;<?php echo ($lang['lights']); ?></a></li>
	<li><a id='menu_appliances' href="<?php echo ($config['url_path']); ?>/index.php?page=appliances"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_appliances_on.png">&nbsp;&nbsp;<?php echo ($lang['appliances']); ?></a></li>
	<li><a id='menu_irrigation' href="<?php echo ($config['url_path']); ?>/index.php?page=irrigation"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_irrigation_on.png">&nbsp;&nbsp;<?php echo ($lang['irrigation']); ?></a></li>
	<!--Setup is not yet working correctly-->
	<!--
    <?php
		if ($config['seclevel'] == "2") 
		{
			if (!isset($_COOKIE["dluloged"])) 
			{
				?>
				<li><a id='menu_login' href="<?php echo ($config['url_path']); ?>/admin/login.php?page=login&from=<?php echo $page; ?>"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_setup_on.png">&nbsp;&nbsp;<?php echo ($lang['login']); ?></a></li>
				<?php
			}
			else
			{
				?>
				<li><a id='menu_setup' href="<?php echo ($config['url_path']); ?>/index.php?page=setup"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_setup_on.png">&nbsp;&nbsp;<?php echo ($lang['setup']); ?></a></li>
				<?php
			}
		}
		else
		{
			?>
			<li><a id='menu_setup' href="<?php echo ($config['url_path']); ?>/index.php?page=setup"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_setup_on.png">&nbsp;&nbsp;<?php echo ($lang['setup']); ?></a></li>
			<?php
		}
	?>
	-->
	<li><a id='menu_status' href="<?php echo ($config['url_path']); ?>/index.php?page=status"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_status_on.gif">&nbsp;&nbsp;<?php echo ($lang['heyustatus']);?></a></li>
	<li><a id='menu_about' href="<?php echo ($config['url_path']); ?>/index.php?page=about"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_about_on.png">&nbsp;&nbsp;<?php echo ($lang['about']);?></a></li>
</ul>
