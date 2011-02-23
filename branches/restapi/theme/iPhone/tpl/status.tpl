			<?php
			$otherState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$otherOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$otherOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page; ?>" name="<?php echo $code;?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_status_<?php echo $state; ?>.png" /></a></td>
					<?php if($state == 'on'): ?>
						<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page; ?>" name="<?php echo $code;?>">On</a></td>
					<?php else: ?>					
						<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page; ?>" name="<?php echo $code;?>">Off</a></td>
					<?php endif; ?>
				</tr>
			</table>
		</li>