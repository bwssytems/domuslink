<?php
if ( ($page=='lights') || ($page=='shutters') || ($page=='other') || ($page=='irrigation') || ($page=='appliances') || ($page=='all') )
{
?>
	<h2><?php echo ($header); ?></h2>
	<div class="white">
		<ul class="shortbutul">
			<?php echo ($modules); ?>
		</ul>
	</div>
	<br />
<?php
}
else
{
?>
    <form id="<?php echo ($header); ?>" title="<?php echo ($header); ?>" class="panel">
        <h2><?php echo ($header); ?></h2>
        <fieldset>
			<?php echo ($modules); ?>
		</fieldset>
    </form>
<?php
}
?>
