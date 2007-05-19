<h1><?=$header;?></h1>

<?
$count = count($modules); // count num of modules
if($count%2): $result=$count+1; endif; // if odd add 1
$nlines = $count/2; // divide by two, which give number of lines in table
$nlinescount = 0; // initialize counter
$i = 0; //initializize counter for array
?>

<table cellpadding="2" border="0" cellspacing="2" width="100%">

<? while ($nlinescount<$nlines): ?>

<tr>
 <td align="center" width="50%">
	<? list($code, $label) = split(" ", $modules[$i], 2); $i++; ?>
	<table cellpadding="2" border="0" cellspacing="2">
	  <tr>
	    <td width="150px"><?=label_parse($label, false);?></td>
	    <? if (on_state($code, $heyuexec)): ?>
	    	<td><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>">OFF</a></td>
	    <? else: ?>
	    	<td><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>">ON</a></td>
	    <? endif; ?>
	  </tr>
	</table>
 </td>

 <td align="center" width="50%">
	<?
	if ($i != $count):
	list($code, $label) = split(" ", $modules[$i], 2); $i++; ?>
	<table cellpadding="2" border="0" cellspacing="2">
	  <tr>
	    <td width="150px"><?=label_parse($label, false);?></td>
	    <? if (on_state($code, $heyuexec)): ?>
	    	<td><a href="<?=$_SERVER['PHP_SELF'];?>?action=off&device=<?=$code;?>&page=<?=$page;?>">OFF</a></td>
	    <? else: ?>
	    	<td><a href="<?=$_SERVER['PHP_SELF'];?>?action=on&device=<?=$code;?>&page=<?=$page;?>">ON</a></td>
	    <? endif; ?>
	  </tr>
	</table>
	<? endif; ?>
 </td>
</tr>

<? $nlinescount++; endwhile; ?>

</table>