		<li>
			<table>
				<tr>
					<td><?php echo $label; ?></td>
					<td><button type="button"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_status_<?php echo $state; ?>.png" /></button></td>
					<?php if($state == 'on'): ?>
						<td><button type="button"><?php echo $lang['ON']; ?></button></td>
					<?php else: ?>					
						<td><button type="button"><?php echo $lang['OFF']; ?></button></td>
					<?php endif; ?>
				</tr>
			</table>
		</li>