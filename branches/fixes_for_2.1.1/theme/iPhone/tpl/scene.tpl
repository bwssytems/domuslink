<?php
	$sceneRun  = $_SERVER['PHP_SELF'] . "?action=run&code=".$label."&page=".$page;
?>
<li>
	<table>
		<tr>
			<td style='width:66%'><?php echo $label; ?></td>
			<td><a href="<?php echo $sceneRun ?>"><?php echo $lang['run']; ?></a></td>					
		</tr>
	</table>
</li>