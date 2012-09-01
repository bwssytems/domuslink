<div id="module">
<table cellspacing="0" cellpadding="0" border="0" class="module" height="37px">

<tr>
<td width="17" valign="top">
<img src="<?php echo $config['url_path'].'/theme/'.$config['theme'].'/images/module_scene_on.png'; ?>" vspace="2" />
</td>

<td width="110px" rowspan="2" valign="center"><input type="text" disabled="disabled" value="<?php echo $label; ?>" class="module_on" /></td>

<td rowspan="2">
<table cellspacing="1" cellpadding="0" border="1" class="onofftb" width="32px">
<tr>
<td class="onoff" align="center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=run&code=<?php echo label_parse($label, true); ?>&page=<?php echo $page; ?>"><?php echo $lang['run']; ?></a></td>
</tr>
</table></td>
</tr>
<tr>
<td align="left"></td>
<td></td>
</tr>
</table>
</div>
