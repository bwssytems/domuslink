			<?php
			$moduleState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$moduleOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$moduleOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $moduleOn ?>"><?php echo $lang['ON']; ?></a></td>					
					<td><a href="<?php echo $moduleOff ?>"><?php echo $lang['OFF']; ?></a></td>
				</tr>
			</table>
		</li>