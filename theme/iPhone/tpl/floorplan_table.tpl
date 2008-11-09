<?php
if ($page=='lights')
{
?>
	<h2><?php echo ($header); ?>/<?php echo ($page); ?></h2>
	<div class="white">
		<ul class="shortbutul">
			<?php echo ($modules); ?>
		</ul>
	</div>
	<br />
<?
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
