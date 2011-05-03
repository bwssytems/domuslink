			<?php
			$otherState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$otherOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$otherOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td><?php echo $label; ?></td>
					<td><button type="button"><a href="<?php echo $otherState ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_other_<?php echo $state; ?>.png" /></a></button></td>
					<td><button type="button"><a href="<?php echo $otherOn ?>"><?php echo $lang['ON']; ?></a></button></td>					
					<td><button type="button"><a href="<?php echo $otherOff ?>"><?php echo $lang['OFF']; ?></a></button></td>
				</tr>
			</table>
		</li>