<h1><?php echo $header; ?></h1>

<table cellpadding="0" border="0" cellspacing="10" width="100%">

<?php 
	$arraypos = 0; 
	for ($i = 0; $i != $rows; $i++): ?>
	<tr>

	<?php for ($ii = 0; $ii != $cols; $ii++): ?>
		<td align="center" valign="middle">
			<?php if ($arraypos < $arraysize):
				echo switch_table($modules[$arraypos], $type, $config, $page);
			endif; ?>
		</td>
	<?php $arraypos++; endfor; ?>
	
	</tr>
<?php endfor; ?>

</table>