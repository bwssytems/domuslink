<table cellspacing="0" cellpadding="0" border="0" width="640px" align="middle" class="content">
<tr><th><?php echo ($lang['timmers']); ?></th></tr>

<tr><td>

<?php
foreach ($timmers  as $timmer_num):
	list($timmer, $line_num) = split("@", $timmer_num, 2); ?>
line num: <?php echo $line_num; ?> --- macro: <?php echo $timmer; ?><br />
<?php endforeach; ?>

</td></tr>
</table>

<?php 
if (!empty($form)):
 echo($form);
endif; 
?>