<div id="module">
<table cellspacing="0" cellpadding="0" border="0" class="module" height="37px">

<tr>
<td width="17" valign="top">
<img src="<?php echo $config['url_path'].'/theme/'.$config['theme'].'/images/module_other_'.$state.'.png'; ?>" vspace="2" />
</td>

<td width="110px" rowspan="2"><input type="text" value="<?php echo $label; ?>" class="module_<?php echo $state; ?>"  /></td>

<td class="onoff" align="center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=on&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/connect.png" border="0" /></a></td>
</tr>
<tr>
<td><?php if ($config['codes'] == "ON"): ?><span class="code"><?php echo $code; ?></span><?php endif; ?></td>
<td class="onoff" align="center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=off&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/disconnect.png" border="0" /></a></td>
</tr>

</table>
</div>
