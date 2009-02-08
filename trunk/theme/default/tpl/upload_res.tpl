
<table cellspacing="0" cellpadding="0" border="0" align="middle" class="content">
<tr><th><?php echo $uptitle; ?></th></tr>

<tr><td>

<?php echo $msg; ?>
<div id="uplog" style="<?php echo $divstate; ?>">
<br /><br />
<?php 
foreach ($out as $line): 
if (substr($line, 0, 5) == "....."):
$line = "################################################################"; 
endif; ?>

<?php echo trim($line); ?><br />
<?php endforeach; ?>
</div>

</td></tr>
</table>