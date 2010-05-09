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
				<a href="<?php echo ($config['url_path']);?>/index.php?page=info"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-info-032x032.png"></a> | 
				<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=restart" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-reload-032x032.png"></a> | 
				<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=stop" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-032x032.png"></a>
				<BR>
				<span style="width:32px"><a href="<?php echo ($config['url_path']);?>/index.php?page=info"><?php echo ($lang['info']);?></a></span> | 
				<span style="width:32px"><a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=restart" target="_self"><?php echo ($lang['reload']);?></a></span> |
				<span style="width:32px"><a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=stop" target="_self"><?php echo ($lang['stop']);?></a></span> |
			<?php else:  ?>
				<img alt="<?php echo $lang['down']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-128x128.png"><BR>
				<BR>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=start" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-ok-032x032.png"></a>
				<BR>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=start" target="_self"><?php echo ($lang['start']);?></a>
			<?php endif; ?>
		</p>
	</fieldset>
	<h2><?php echo $lang['heyucurrentconfig'] ?></h2>
	<fieldset style="padding:5px;">
		<p align="left" style="margin:5px;">
			<?php echo $config['heyu_config_name']." ".$lang['heyuindir']." ".$config['heyu_base_real'].($config['heyu_subdir'] == "default"?"":$config['heyu_subdir'])?>
		</p>
	</fieldset>
	<h2>Uptime</h2>
	<fieldset style="padding:5px;">
		<p align="left" style="margin:5px;">
			<?php echo (uptime()); ?>
		</p>
	</fieldset>
</div>	
