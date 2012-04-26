<?php
	$sceneRun  = $_SERVER['PHP_SELF'] . "?action=run&code=".$code."&page=".$page;
?>
<li>
	<table>
		<tr>
			<td><?php echo $label; ?></td>
			<td><button type="button"><a href="<?php echo $sceneRun ?>"><?php echo $lang['run']; ?></a></button></td>					
		</tr>
	</table>
</li>