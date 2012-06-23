			<?php
			$otherOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$otherOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_status_<?php echo $state; ?>.png" /></td>
					<?php if($state == 'on'): ?>
						<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page; ?>" name="<?php echo $code;?>"><?php echo $lang['ON']; ?></a></td>
					<?php else: ?>					
						<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page; ?>" name="<?php echo $code;?>"><?php echo $lang['OFF']; ?></a></td>
					<?php endif; ?>
				</tr>
			</table>
		</li>