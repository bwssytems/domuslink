			<?php
			$otherState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$otherOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$otherOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td><?php echo $label; ?></td>
					<td><button type="button"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_status_<?php echo $state; ?>.png" /></button></td>
					<?php if($state == 'on'): ?>
						<td><button type="button">On</button></td>
					<?php else: ?>					
						<td><button type="button">Off</button></td>
					<?php endif; ?>
				</tr>
			</table>
		</li>