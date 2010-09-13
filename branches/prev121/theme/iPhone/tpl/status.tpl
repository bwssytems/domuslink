<div id="status" title="<?php echo ($lang['status']); ?>" class="panel">
	<span class="graytitle">
	<?php echo ($lang['heyustatus']);?>: 
	<?php $isRunning = heyu_running(); ?>
	<?php if ($isRunning): ?>
		<?php echo $lang['running']; ?>
	<?php else:  ?>
		<?php echo $lang['down']; ?>
	<?php endif; ?>
	</span>
	<ul class="pageitem">
		<li class="textbox">
			<p class="center" align="center" style="text-align:center">
			<?php if (heyu_running()): ?>
				<img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-ok-128x128.png">
				<BR>
				<div class="left">
					<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=restart" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-reload-032x032.png"></a>
					<br />
					<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=restart" target="_self"><?php echo ($lang['reload']);?></a>
				</div>
				<div class="vert_divider">&nbsp;</div>
				<div class="right">
					<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=stop" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-032x032.png"></a>
					<br />
					<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=stop" target="_self"><?php echo ($lang['stop']);?></a>
				</div>
			<?php else:  ?>
				<img alt="<?php echo $lang['down']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-128x128.png"><BR>
				<BR>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=start" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-ok-032x032.png"></a>
				<BR>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=start" target="_self"><?php echo ($lang['start']);?></a>
			<?php endif; ?>
			</p>
		</li>
	</ul>

	<span class="graytitle"><?php echo $lang['heyucurrentconfig'] ?></span>
	<ul class="pageitem">
		<li class="textbox">
			<p>
				<?php echo $_SESSION['frontObj']->getHeyuConfigName()." ".$lang['heyuindir']." ".$config['heyu_base_real'].($config['heyu_subdir'] == "default"?"":$config['heyu_subdir']);?>
			</p>
		</li>
	</ul>

	<span class="graytitle">Uptime</span>
	<ul class="pageitem">
		<li class="textbox">
			<p>
				<?php echo (uptime()); ?>
			</p>
		</li>
	</ul>
<?php if($isRunning):?>
<?php 
$lines = heyu_info();
?>
	<span class="graytitle"><?php echo ($lang['info']); ?></span>
	<ul class="pageitem">
		<li class="textbox">
			<p>
			<?php 
				foreach ($lines as $line):
					?>
					<p align="left" style="padding-left:10px;"><?php echo $line;?></p>
					<?php
				endforeach;
			?>
			</p>
		</li>
	</ul>
<?php endif;?>
</div>	
