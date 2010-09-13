<div id="content" class="panel">
	<span class="graytitle"><?php echo ($lang['diagnostic']); ?></span>
	<ul class="pageitem">
		<li class="textbox">
			<p><?php echo ($lang['diagnostictext']);?></p>
		</li>
	</ul>
	<?php
	foreach($fileCheck as $fileValidation):
		?>	
		<span class="graytitle"><?php echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$fileValidation["targetname"]);?></span>
		<ul class="pageitem">
			<li class="textbox" style="padding:0;margin:0">
				<div class="row">
					<label>Existing</label>
					<p><?php if($fileValidation["exists"]) echo ("<font color='green'>YES</font>"); else echo ("<font color='red'>NO</font>");?></p>
				</div>
				<?php if(isset($fileValidation["writable"])): ?>
					<div class="row">
						<label>Writeable</label>
						<p><?php if($fileValidation["writable"]) echo ("<font color='green'>YES</font>"); else echo ("<font color='red'>NO</font>");?></p>
					</div>
				<?php endif; ?>
				<?php if(isset($fileValidation["executable"])): ?>				
					<div class="row">
						<label>Executable</label>
						<p><?php if($fileValidation["executable"]) echo ("<font color='green'>YES</font>"); else echo ("<font color='red'>NO</font>");?></p>
					</div>
				<?php endif; ?>
			</li>
		</ul>
		<?php 
	endforeach;
	?>				
	<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=cancel" method="post">		
	<ul class="pageitem">
		<li class="button"><input type="button" onClick="window.location='<?php echo($_SERVER['PHP_SELF']); ?>?action=cancel'" value="<?php echo ($lang['continue']); ?>" /></li>
	</ul>
	</form>
</div>
<?php 
if (!empty($form)):
 echo($form);
endif; 
?>