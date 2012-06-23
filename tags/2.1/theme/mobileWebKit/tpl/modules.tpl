<?php
	$moduleOn  = $_SERVER['PHP_SELF'] . "?action=on&page=".$page."&code=".$code;
	$moduleOff = $_SERVER['PHP_SELF'] . "?action=off&page=".$page."&code=".$code;
?>
<li>
	<table>
		<tr>
			<td><?php echo $label; ?></td>
			<td><button type="button"><a href="<?php echo $moduleOn ?>"><?php echo $lang['ON']; ?></a></button></td>					
			<td><button type="button"><a href="<?php echo $moduleOff ?>"><?php echo $lang['OFF']; ?></a></button></td>
		</tr>
	</table>
</li>