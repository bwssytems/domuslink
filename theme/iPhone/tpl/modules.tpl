			<?php
			$moduleState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$moduleOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$moduleOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $moduleOn ?>">On</a></td>					
					<td><a href="<?php echo $moduleOff ?>">Off</a></td>
				</tr>
			</table>
		</li>