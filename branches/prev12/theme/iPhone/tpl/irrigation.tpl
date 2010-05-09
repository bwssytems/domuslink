		<?php
			$codeState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$codeOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$codeOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $codeState ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_irrigation_<?php echo $state; ?>.png" /></a></td>
					<td><a href="<?php echo $codeOn ?>">On</a></td>					
					<td><a href="<?php echo $codeOff ?>">Off</a></td>
				</tr>
			</table>
		</li>