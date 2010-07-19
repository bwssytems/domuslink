<div id="status" title="<?php echo ($lang['status']); ?>" class="panel">
	<h2><?php echo ($lang['heyustatus']);?>: 
	<?php $isRunning = heyu_running(); ?>
	<?php if ($isRunning): ?>
		<?php echo $lang['running']; ?>
	<?php else:  ?>
		<?php echo $lang['down']; ?>
	<?php endif; ?>
	</h2>
	<fieldset>
		<p align="center">
			<?php if (heyu_running()): ?>
				<img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-ok-128x128.png"><BR>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=restart" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-reload-032x032.png"></a> | 
				<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=stop" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-032x032.png"></a>
				<BR>
				<span style="width:32px"><a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=restart" target="_self"><?php echo ($lang['reload']);?></a></span> |
				<span style="width:32px"><a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=stop" target="_self"><?php echo ($lang['stop']);?></a></span>
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
			<?php echo $_SESSION['frontObj']->getHeyuConfigName()." ".$lang['heyuindir']." ".$config['heyu_base_real'].($config['heyu_subdir'] == "default"?"":$config['heyu_subdir']);?>
		</p>
	</fieldset>
	<h2>Uptime</h2>
	<fieldset style="padding:5px;">
		<p align="left" style="margin:5px;">
			<?php echo (uptime()); ?>
		</p>
	</fieldset>
<?php if($isRunning):?>
<?php 
$lines = heyu_info();
?>
	<h2><?php echo ($lang['info']); ?></h2>
	<fieldset>
		<h5>
		<?php 
			foreach ($lines as $line):
				?>
				<p align="left" style="padding-left:10px;"><?php echo $line;?></p>
				<?php
			endforeach;
		?>
		</h5>
  </fieldset>
<?php endif;?>
</div>	
