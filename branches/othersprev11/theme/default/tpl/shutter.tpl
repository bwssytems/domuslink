<div id="module">
<table cellspacing="0" cellpadding="0" border="0" class="module" height="37px">

<tr>
<td width="17" valign="top">
<img src="<?php echo $config['url_path'].'/theme/'.$config['theme'].'/images/module_shutter_'.$state.'.png'; ?>" vspace="2" />
</td>

<td width="110px"><input type="text" value="<?php echo $label; ?>" class="module"  /></td>
<td rowspan="2">
<table cellspacing="1" cellpadding="0" border="1" class="onofftb" width="32px">
<tr>
<td class="onoff" align="center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=on&code=<?php echo $code; ?>&page=<?php echo $page; ?>">ON</a></td>
</tr>
<tr>
<td class="onoff" align="center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=off&code=<?php echo $code; ?>&page=<?php echo $page; ?>">OFF</a></td>
</tr>
</table>
</td>
</tr>

<tr>
<td><?php if ($config['codes'] == "ON"): ?><span class="code"><?php echo $code; ?></span><?php endif; ?></td>
</tr>

</table>
</div>
