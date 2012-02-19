			<?php
			$applianceState  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
			$applianceOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
			$applianceOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
			?>
		<li>
			<table>
				<tr>
					<td><?php echo $label; ?></td>
					<td><button type="button"><a href="<?php echo $applianceState ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_appliance_<?php echo $state; ?>.png" /></a></button></td>
					<td><button type="button"><a href="<?php echo $applianceOn ?>"><?php echo $lang['ON']; ?></a></button></td>					
					<td><button type="button"><a href="<?php echo $applianceOff ?>"><?php echo $lang['OFF']; ?></a></button></td>
				</tr>
			</table>
		</li>