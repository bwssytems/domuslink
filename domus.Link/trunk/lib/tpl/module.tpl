<div id="module">
<table cellspacing="0" cellpadding="0" border="1" class="module">
<tr>
<td width="17" valign="top" class="<?php echo $state; ?>"><?php echo $state; ?></td>
<td width="110px" rowspan="2"><input type="text" value="<?php echo label_parse($label, false); ?>" class="module"  /></td>
<td rowspan="2"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=<?php echo $action; ?>&device=<?php echo $code; ?>&page=home"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/switch_<?php echo $state; ?>.gif" border="0" /></a></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</div>