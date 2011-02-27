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
					<td><?php echo $label; ?></td>
					<td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=<?php echo $action; ?>&code=<?php echo $code; ?>&page=<?php echo $page; ?>" name="<?php echo $code;?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_hvac_<?php echo $state; ?>.png" /></a></button></td>
					<td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=sp&change=decc&code=<?php echo $config['hvac_house_code']; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> dim'>&ndash;</a></button></td>
					<td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=sp&change=inc&code=<?php echo $config['hvac_house_code']; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> bright'>+</a></button></td>
				</tr>
			</table>
		</li>