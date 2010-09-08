<div id="error" title="<?php echo ($lang['error']); ?>" class="panel">
        <h2><?php echo ($lang['error']); ?></h2>
        <fieldset>
		<h5>
			<p align="left" style="padding-left:10px;">
				<?php foreach ($errormsgs as $msg): ?>
				<?php echo $msg; ?><br />
				<?php endforeach; ?>			
			</p>
		</h5>
      </fieldset>
</div>
<br>
