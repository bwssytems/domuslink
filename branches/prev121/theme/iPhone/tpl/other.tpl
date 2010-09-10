			<?php
			$otherState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$otherOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$otherOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $otherState ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_other_<?php echo $state; ?>.png" /></a></td>
					<td><a href="<?php echo $otherOn ?>">On</a></td>					
					<td><a href="<?php echo $otherOff ?>">Off</a></td>
				</tr>
			</table>
		</li>