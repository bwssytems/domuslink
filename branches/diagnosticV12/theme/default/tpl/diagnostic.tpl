<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['diagnostic']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
<td colspan="7" align="center" style="border-bottom: 1px dotted #e5e5e5;">
<h6><?php echo ($lang['diagnostictext']);?></h6>
</td>
</tr>

<?php
foreach($fileCheck as $fileValidation):
?>
<tr class="row">
  <td><?php echo $fileValidation["targetname"];?></td>
  <td>&nbsp;</td>
  <td><?php if($fileValidation["exists"]) echo ("Exists"); else echo ("File needs to exist");?></td>
  <td>&nbsp;</td>
  <td>
  <?php if(isset($fileValidation["writable"])): ?>
			<?php if($fileValidation["writable"])  echo("Writable"); else echo ("File needs to be writable"); ?>
  <?php endif; ?>
  <?php if(isset($fileValidation["executable"])): ?>
			<?php if ($fileValidation["executable"])  echo("Executable"); else echo ("File needs to be executable"); ?>
  <?php endif; ?>
  </td>
</tr>
<?php endforeach; ?>
</table>

</td></tr>
<tr>
  <td align="center">
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=cancel" method="post">
    	<input type="button" onMouseOver="popup('<?php echo ("test"); ?>')" onmouseout="kill()" onfocus="this.blur()" onClick="window.location='<?php echo($_SERVER['PHP_SELF']); ?>?action=cancel'" value="<?php echo ($lang['continue']); ?>" />
    </form>
  </td>
</tr>

</table>

<?php 
if (!empty($form)):
 echo($form);
endif; 
?>