<span class="graytitle"><?php echo ($lang['status']); ?></span>
<ul class="pageitem">
	<li class="textbox"><span class="header"><?php echo ($lang['heyustatus']);?></span><p>
	<?php $isRunning = heyu_running(); ?>
	<?php if ($isRunning): ?>
		<?php echo $lang['running']; ?>
	<?php else:  ?>
		<?php echo $lang['down']; ?>
	<?php endif; ?>
	</p>
	</li>
	<li class="textbox">
		<p align="center">
			<?php if (heyu_running()): ?>
			    <table>
			    <tr>
			    <td>
				<img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/icontexto-webdev-ok-128x128.png"><BR>
				</td>
				</tr>
				<?php if ($sec_level <= 1): ?>
			    <tr>
			    <td>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_status_page&daemon=restart" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/icontexto-webdev-reload-032x032.png"></a>
				</td>
			    <td>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_status_page&daemon=stop" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/icontexto-webdev-cancel-032x032.png"></a>
				</td>
				</tr>
				<tr>
				<td>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_status_page&daemon=restart" target="_self"><?php echo ($lang['reload']);?></a>
				</td>
			    <td>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_status_page&daemon=stop" target="_self"><?php echo ($lang['stop']);?></a>
				</td>
				</tr>
			    </table>
				<?php endif; ?>
			<?php elseif($sec_level <= 2):  ?>
			    <table>
			    <tr>
			    <td>
				<img alt="<?php echo $lang['down']; ?>" src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/icontexto-webdev-cancel-128x128.png"><BR>
				</td>
				</tr>
				<tr>
				<td>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_status_page&daemon=start" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/mobileWebKit/images/icontexto-webdev-ok-032x032.png"></a>
				</td>
				</tr>
				<tr>
				<td>
				<a href="<?php echo ($config['url_path']);?>/index.php?page=domus_status_page&daemon=start" target="_self"><?php echo ($lang['start']);?></a>
				</td>
				</tr>
				</table>
			<?php endif; ?>
		</p>
	</li>
	<li class="textbox"><span class="header"><?php echo $lang['heyucurrentconfig'] ?></span><p>
			<?php echo $_SESSION['frontObj']->getHeyuConfigName()." ".$lang['heyuindir']." ".$config['heyu_base_real'].($config['heyu_subdir'] == "default"?"":$config['heyu_subdir']);?>
		</p>
	</li>
	<li class="textbox"><span class="header">Uptime</span><p>
			<?php echo (uptime()); ?>
		</p>
	</li>
<?php if($isRunning):?>
<?php 
$lines = heyu_info();
?>
	<li class="textbox"><span class="header"><?php echo ($lang['info']); ?></span><p>
		<?php 
			foreach ($lines as $line):
				?>
				<p align="left" style="padding-left:10px;"><?php echo $line;?></p>
				<?php
			endforeach;
		?>
	</p>
	</li>
<?php endif;?>
</ul>