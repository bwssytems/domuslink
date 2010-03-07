<table cellspacing="0" cellpadding="0" border="0" width="600px" align="center" class="content">
<tr><th><?php echo ($lang['heyustatus']);?>: <?php if (heyu_running()): ?><?php echo $lang['running']; ?><?php else:  ?><?php echo $lang['down']; ?><?php endif; ?></th></tr>

<tr><td align="center">

		<?php if (heyu_running()): ?>
			<img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-ok-128x128.png">
			<br /><br />
			<table cellspacing="0" cellpadding="0" border="0" class="clear" width="120px">
			<tr>
			<td><a href="<?php echo ($config['url_path']);?>/index.php?page=info"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-info-032x032.png" border="0"></a> </td>
			<td><a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=restart" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-reload-032x032.png" border="0"></a></td>
			<td><a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=stop" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-032x032.png" border="0"></a></td>
			</tr>
			<tr>
			<td><a href="<?php echo ($config['url_path']);?>/index.php?page=info"><?php echo ($lang['info']);?></a></td>
			<td><a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=restart" target="_self"><?php echo ($lang['reload']);?></a></td>
			<td><a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=stop" target="_self"><?php echo ($lang['stop']);?></a></td>
			</tr>
			</table>
			
		<?php else:  ?>
			<img alt="<?php echo $lang['down']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-cancel-128x128.png">
			<br />
			<?php echo ($lang['error_not_running']); ?>
			<br /><br />
			<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=start" target="_self"><img alt="<?php echo $lang['running']; ?>" src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-ok-032x032.png" border="0"></a>
			<br />
			<a href="<?php echo ($config['url_path']);?>/index.php?page=status&daemon=start" target="_self"><?php echo ($lang['start']);?></a>
		<?php endif; ?>

</td></tr>
</table>