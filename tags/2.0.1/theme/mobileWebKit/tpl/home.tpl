<ul class="pageitem">
	<li class="menu"><a href="<?php echo ($config['url_path']); ?>/index.php?page=domus_all_page">
		<img src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/menu_home_on.png">
		<span class="name"><?php echo ($lang['home']); ?></span><span class="arrow"></span></a></li>
	<?php foreach($groups as $group) : ?>
		<?php if ($group->getVisible() && $_SESSION['frontObj']->getHeyuConf()->groupHasDisplayableModules($group->getType(), $config['themeview'], $sec_level, $sec_level_type)): ?>
			<li class="menu"><a href="<?php echo ($config['url_path']); ?>/index.php?page=<?php echo $group->getType(); ?>">
			<img src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/menu_<?php echo $group->getGroupImage(); ?>_on.png">
			<span class="name"><?php echo $group->getType(); ?></span><span class="arrow"></span></a></li>
		<?php endif; ?>
	<?php endforeach; ?>
	<li class="menu"><a id='menu_status' href="<?php echo ($config['url_path']); ?>/index.php?page=domus_status_page">
	<img src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/icontexto-webdev-info-032x032.png">
	<span class="name"><?php echo ($lang['heyustatus']);?></span><span class="arrow"></span></a></li>
	<li class="menu"><a id='menu_about' href="<?php echo ($config['url_path']); ?>/index.php?page=domus_about_page">
	<img src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/menu_about_on.png">
	<span class="name"><?php echo ($lang['about']);?></span><span class="arrow"></span></a></li>
</ul>
