<div id="module">
<table cellspacing="0" cellpadding="0" border="0" class="module" height="37px">
<tr>
<td width="17" valign="top"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_hvac_<?php echo $state; ?>.png" vspace="2" />

</td>
<td width="110px" valign="bottom" height="22"><input type="text" disabled="disabled" value="<?php echo $label; ?>" class="module_<?php echo $state; ?>"  /></td>
<td rowspan="2"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=<?php echo $action; ?>&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/switch_<?php echo $state; ?>.gif" border="0" /></a></td>
</tr>
<tr>
<td><?php if ($config['codes'] == "ON"): ?>
<p class="code"><?php echo $code; ?></p>
<?php endif; ?></td>
<td valign="bottom" align="center">

<!-- dimmer table start -->
<table cellspacing="2" cellpadding="0" border="0" align="center">
<tr>
    <td class="code"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=sp&change=inc&page=<?php echo $page; ?>">+ </a></td>
    <td class="code"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=sp&change=dec&page=<?php echo $page; ?>">- </a></td>
<td border="0">
</td>
</tr>
</table>
<!-- dimmer table end -->

</td>
</tr>
</table>
</div>
