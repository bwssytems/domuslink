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
			<div class="row">
				<label><?php echo str_replace(" ","&nbsp;",$label); ?></label>
				<div class="toggle" onclick="<?php echo $_SERVER['PHP_SELF']; ?>?action=<?php echo $action; ?>&code=<?php echo $code; ?>&page=<?php echo $page; ?>" name="<?php echo $code;?>" toggled="<?php echo $toggeled;?>" selected=''><span class="thumb"></span><span class="toggleOn">ON</span><span class="toggleOff">OFF</span></div>
			</div>	
