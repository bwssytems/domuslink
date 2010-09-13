		<?php
		$type = 'shutter';
		$state  = $_SERVER['PHP_SELF'] . "?action=".$state."&page=".$page."&code=".$code;
		$on  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
		$off = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
		?>
		<li>
			<span class="number"><a href="<?php echo $state ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_<?php echo $state; ?>_<?php echo $state; ?>.png" /></a></span>
			<span class="name"><?php echo $label; ?></span>
			<span class="time"><a href="<?php echo $on ?>">ON</a> | <a href="<?php echo $off ?>">OFF</a></span>
		</li>
