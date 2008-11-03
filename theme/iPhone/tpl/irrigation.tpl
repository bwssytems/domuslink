		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href='javascript:void(0);' name='<?php echo $code;?>' onclick='showUser(this.name)'><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_irrig_<?php echo $state; ?>.png" /></a></td>
					<?php if ($level<=1): ?>
						<td><a href='javascript:void(0);'>&ndash;</a></td>
					<?php else: ?>
						<td><a href='javascript:void(0);' name='<?php echo $code;?> dim' onclick='alert("action=db&state=<?php echo $state; ?>&code=<?php echo $code; ?>&req=<?php echo ($level-1); ?>&curr=<?php echo $level; ?>&page=<?php echo $page; ?>")'>&ndash;</a></td>
					<?php endif; ?>
					<?php if ($level>=1): ?>
						<td><a href='javascript:void(0);'>+</a></td>
					<?php else: ?>
						<td><a href='javascript:void(0);' name='<?php echo $code;?> bright' onclick='alert("action=db&state=<?php echo $state; ?>&code=<?php echo $code; ?>&req=<?php echo ($level+1); ?>&curr=<?php echo $level; ?>&page=<?php echo $page; ?>")'>+</a></td>
					<?php endif; ?>					
				</tr>
			</table>
		</li>