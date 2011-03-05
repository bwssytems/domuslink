			<?php
			$shutterState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$shutterOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$shutterOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td><?php echo $label; ?></td>
					<td><button type="button"><a href="<?php echo $shutterState ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_shutter_<?php echo $state; ?>.png" /></a></button></td>
					<td><button type="button"><a href="<?php echo $shutterOn ?>"><?php echo $lang['ON']; ?></a></button></td>					
					<td><button type="button"><a href="<?php echo $shutterOff ?>"><?php echo $lang['OFF']; ?></a></button></td>
				</tr>
			</table>
		</li>