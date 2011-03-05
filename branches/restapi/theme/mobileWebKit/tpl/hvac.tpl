		<li>
			<table>
				<tr>
					<td><?php echo $label; ?></td>
					<?php if ($mode != "OFF"): ?>
				    	<td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=off&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['OFF']; ?></a></button></td>
				    <?php endif; ?>
					<?php if ($mode != "AUTO"): ?>
				    	<td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=auto&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['AUTO']; ?></a></button></td>
				    <?php endif; ?>
					<?php if ($mode != "HEAT"): ?>
				    	<td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=heat&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['HEAT']; ?></a></button></td>
				    <?php endif; ?>
					<?php if ($mode != "COOL"): ?>
					    <td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=cool&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['COOL']; ?></a></button></td>
				    <?php endif; ?>
				</tr>
				<tr>
					<td>t<?php echo $temp; ?>&#176;&nbsp;s<?php echo $setpoint; ?>&#176</td>
					<td><button type="button"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_hvac_<?php echo $state; ?>.png" /></button></td>
					<td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=inc&code=<?php echo $code; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> dec'><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/arrow-d.gif" /></a></button></td>
					<td><button type="button"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=decc&code=<?php echo $code; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> inc'><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/arrow-u.gif" /></a></button></td>
				</tr>
			</table>
		</li>