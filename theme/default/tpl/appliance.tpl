<div id="module">
<table cellspacing="0" cellpadding="0" border="0" class="module" height="37px">

<tr>
<td width="17" valign="top">
<img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_appliance_<?php echo $state; ?>.png" vspace="2" />
</td>

<td width="110px" rowspan="2"><input type="text" value="<?php echo $label; ?>" class="module_<?php echo $state; ?>"  /></td>
<td rowspan="2"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=<?php echo $action; ?>&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/switch_<?php echo $state; ?>.gif" border="0" /></a></td>
</tr>

<tr>
<td><?php if ($config['codes'] == "ON"): ?><span class="code"><?php echo $code; ?></span><?php endif; ?></td>
</tr>

</table>
</div>
