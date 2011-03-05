		<?php
			$codeState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$codeOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$codeOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td><?php echo $label; ?></td>
					<td><button type="button"><a href="<?php echo $codeState ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_irrigation_<?php echo $state; ?>.png" /></a></button></td>
					<td><button type="button"><a href="<?php echo $codeOn ?>"><?php echo $lang['ON']; ?></a></button></td>					
					<td><button type="button"><a href="<?php echo $codeOff ?>"><?php echo $lang['OFF']; ?></a></button></td>
				</tr>
			</table>
		</li>