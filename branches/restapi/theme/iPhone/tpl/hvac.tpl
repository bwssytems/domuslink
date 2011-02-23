			<?php 
			if ($state == 'on') {
				$toggeled = 'true';
			}
			else {
				$toggeled = '';
			}
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=<?php echo $action; ?>&code=<?php echo $code; ?>&page=<?php echo $page; ?>" name="<?php echo $code;?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_hvac_<?php echo $state; ?>.png" /></a></td>
					<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=sp&change=decc&code=<?php echo $config['hvac_house_code']; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> dim'>&ndash;</a></td>
					<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=sp&change=inc&code=<?php echo $config['hvac_house_code']; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> bright'>+</a></td>
				</tr>
			</table>
		</li>