		<?php
		$type = 'module';
		if ($state == 'on') {
			$toggeled = 'true';
		}
		else {
			$toggeled = '';
		}		
		$state  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
		$on  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
		$off = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
		?>
		<li class="checkbox">
			<span class="check">
				<span class="name"><?php echo $label; ?></span>
				<?php
				if ($toggeled == 'true')
				{
					?>
						<input name="module" type="checkbox" checked="checked" onclick="popup('<?php echo $off?>')" />
					<?php
				} else {
					?>
						<input name="module" type="checkbox" onclick="popup('<?php echo $on?>')" />
					<?php
				}
				?>
			</span>
		</li>

