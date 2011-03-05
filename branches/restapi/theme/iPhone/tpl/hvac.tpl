		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<?php if ($mode != "OFF"): ?>
				    	<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=off&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['OFF']; ?></a></td>
				    <?php endif; ?>
					<?php if ($mode != "AUTO"): ?>
				    	<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=auto&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['AUTO']; ?></a></td>
				    <?php endif; ?>
					<?php if ($mode != "HEAT"): ?>
				    	<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=heat&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['HEAT']; ?></a></td>
				    <?php endif; ?>
					<?php if ($mode != "COOL"): ?>
					    <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=cool&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['COOL']; ?></a></td>
				    <?php endif; ?>
				</tr>
				<tr>
					<td style='width:66%'>t<?php echo $temp; ?>&#176;&nbsp;s<?php echo $setpoint; ?>&#176</td>
					<td><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_hvac_<?php echo $state; ?>.png" /></td>
					<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=inc&code=<?php echo $code; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> dec'><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/arrow-d.gif" /></a></td>
					<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=decc&code=<?php echo $code; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> inc'><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/arrow-u.gif" /></a></td>
				</tr>
			</table>
		</li>