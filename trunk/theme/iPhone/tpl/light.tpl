			<?php 
			if ($state == 'on')
			{
				$toggeled = 'true';
			}
			else
			{
				$toggeled = '';
			}
			?>
		<li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $label; ?></td>
					<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=<?php echo $action; ?>&code=<?php echo $code; ?>&page=<?php echo $page; ?>" name="<?php echo $code;?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_light_<?php echo $state; ?>.png" /></a></td>
					<?php if ($level<=1): ?>
						<td><a href='javascript:void(0);'>&ndash;</a></td>
					<?php else: ?>
						<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=db&state=<?php echo $state; ?>&code=<?php echo $code; ?>&req=<?php echo ($level-1); ?>&curr=<?php echo $level; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> dim'>&ndash;</a></td>
					<?php endif; ?>
					<?php if ($level>=1): ?>
						<td><a href='javascript:void(0);'>+</a></td>
					<?php else: ?>
						<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=db&state=<?php echo $state; ?>&code=<?php echo $code; ?>&req=<?php echo ($level+1); ?>&curr=<?php echo $level; ?>&page=<?php echo $page; ?>" name='<?php echo $code;?> bright'>+</a></td>
					<?php endif; ?>					
				</tr>
			</table>
		</li>