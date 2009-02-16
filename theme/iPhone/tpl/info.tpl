<?php 
if (!isset($lang['info'])) 
{
	$lang['info']='Info';
}
?>
<div id="info" title="<?php echo ($lang['info']); ?>" class="panel">
	<h2><?php echo ($lang['info']); ?></h2>
	<fieldset>
		<h5>
		<?php 
			foreach ($lines as $line):
				?>
				<p align="left" style="padding-left:10px;"><?php echo $line;?></p>
				<?php
			endforeach;
		?>
		</h5>
  </fieldset>
</div>
