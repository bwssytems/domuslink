			<?php
			$applianceState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$applianceOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$applianceOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $applianceState ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_appliance_<?php echo $state; ?>.png" /></a></td>
					<td><a href="<?php echo $applianceOn ?>">On</a></td>					
					<td><a href="<?php echo $applianceOff ?>">Off</a></td>
				</tr>
			</table>
		</li>