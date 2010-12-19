			<?php
			$shutterState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$shutterOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$shutterOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $shutterState ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_shutter_<?php echo $state; ?>.png" /></a></td>
					<td><a href="<?php echo $shutterOn ?>">On</a></td>					
					<td><a href="<?php echo $shutterOff ?>">Off</a></td>
				</tr>
			</table>
		</li>