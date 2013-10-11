<span class="graytitle"><?php echo ($lang['diagnostic']); ?></span>
<ul class="pageitem">
<li class="textbox"><span class="header"><?php echo ($lang['diagnostictext']);?></span><p>
	</p>
	</li>
<?php
foreach($fileCheck as $fileValidation):
?>
	<li class="textbox">
		<p align="center">

<tr>
  <td><?php echo $fileValidation["targetname"];?></td>
  <td>&nbsp;</td>
  <td><?php if($fileValidation["exists"]) echo ("<font color='green'>Exists</font>"); else echo ("<font color='red'>File needs to exist</font>");?></td>
  <td>&nbsp;</td>
  <td>
  <?php if(isset($fileValidation["writable"])): ?>
			<?php if($fileValidation["writable"])  echo("<font color='green'>Writable</font>"); else echo ("<font color='red'>File needs to be writable</font>"); ?>
  <?php endif; ?>
  <?php if(isset($fileValidation["executable"])): ?>
			<?php if ($fileValidation["executable"])  echo("<font color='green'>Executable</font>"); else echo ("<font color='red'>File needs to be executable</font>"); ?>
  <?php endif; ?>
  </td>
</tr>
		</p>
	</li>
<?php endforeach; ?>
<li class="textbox"><span class="header">
</td></tr>
<tr>
  <td align="center">
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=cancel" method="post">
    	<input type="button" onClick="window.location='<?php echo($_SERVER['PHP_SELF']); ?>?action=cancel'" value="<?php echo ($lang['continue']); ?>" />
    </form>
  </td>
</tr>
		</p>
	</li>
<?php 
if (!empty($form)):
 echo($form);
endif; 
?>
</ul>