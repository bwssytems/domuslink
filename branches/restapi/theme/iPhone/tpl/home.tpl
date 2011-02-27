<ul id="home" title="domus.Link" selected="true">
	<li><a id='menu_all' href="<?php echo ($config['url_path']); ?>/index.php?page=domus_all_page"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_home_on.png">&nbsp;&nbsp;<?php echo ($lang['home']); ?></a></li>
	<?php foreach($groups as $group) : ?>
		<?php if ($group->getVisible() && $_SESSION['frontObj']->getHeyuConf()->groupHasDisplayableModules($group->getType(), $config['themeview'], $sec_level, $sec_level_type)): ?>
			<li><a id='menu_<?php echo $group->getType(); ?>' href="<?php echo ($config['url_path']); ?>/index.php?page=<?php echo $group->getType(); ?>"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_<?php echo $group->getGroupImage(); ?>_on.png">&nbsp;&nbsp;<?php echo $group->getType(); ?></a></li>
		<?php endif; ?>
	<?php endforeach; ?>
	<li><a id='menu_status' href="<?php echo ($config['url_path']); ?>/index.php?page=domus_status_page"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-info-032x032.png">&nbsp;&nbsp;<?php echo ($lang['heyustatus']);?></a></li>
	<li><a id='menu_about' href="<?php echo ($config['url_path']); ?>/index.php?page=domus_about_page"><img src="<?php echo ($config['url_path']);?>/theme/iPhone/images/menu_about_on.png">&nbsp;&nbsp;<?php echo ($lang['about']);?></a></li>
</ul>
