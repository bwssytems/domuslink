<div id="error" title="<?php echo ($lang['error']); ?>" class="panel">
	<span class="graytitle"><?php echo ($lang['error']); ?></span>
	<ul class="pageitem">
		<li class="textbox">
			<p style="padding:10px">
				<?php foreach ($errormsgs as $msg): ?>
				<?php echo $msg; ?><br />
				<?php endforeach; ?>			
			</p>
		</li>
	</ul>
/div>
<br>
