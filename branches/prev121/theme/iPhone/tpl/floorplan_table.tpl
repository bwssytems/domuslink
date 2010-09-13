	<?php
	if ( ($page=='lights') || ($page=='shutters') || ($page=='other') || ($page=='irrigation') || ($page=='appliances') || ($page=='all') )
	{
		?>
		<ul class="pageitem">	
			<?php echo ($modules); ?>
		</ul>
		<?php
	}
	else
	{
		?>
		<form id="<?php echo ($header); ?>" title="<?php echo ($header); ?>" class="panel">
			<span class="graytitle"><?php echo ($header); ?></span>
			<ul class="pageitem">
				<li class="textbox">
					<p><?php echo ($modules); ?></p>
				</li>
			</ul>		
		</form>
		<?php
	}
	?>
