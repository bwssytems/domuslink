<div id="module">
<table cellspacing="0" cellpadding="0" border="0" class="module" height="37px">
<tr>
<td width="17" valign="top">
<img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_hvac_<?php echo $state; ?>.png" vspace="2" />
</td>
<td width="110px" valign="center"><input type="text" disabled="disabled" value="t<?php echo $temp; ?>&#176;&nbsp;&nbsp;<?php echo $label; ?>&nbsp;&nbsp;s<?php echo $setpoint; ?>&#176" class="module_<?php echo $state; ?>"  /></td>
<td rowspan="2">
<table cellspacing="1" cellpadding="0" border="1" class="onofftb" width="32px">
<tr>
<td class="onoff" align="center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=inc&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/arrow-u.gif" border="0" /></a></td>
</tr>
<tr>
<td class="onoff" align="center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=dec&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/arrow-d.gif" border="0" /></a></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<?php if ($config['codes'] == "ON"): ?>
	<p class="code"><?php echo $code; ?></p>
<?php endif; ?></td>
<td valign="center" align="center">

<!-- HVAC control table start -->
<table cellspacing="1" cellpadding="0" border="1" class="onofftb" align="center">
<tr>
	<?php if ($mode != "OFF"): ?>
    	<td class="onoff"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=off&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['OFF']; ?></a></td>
    <?php endif; ?>
	<?php if ($mode != "AUTO"): ?>
    	<td class="onoff"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=auto&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['AUTO']; ?></a></td>
    <?php endif; ?>
	<?php if ($mode != "HEAT"): ?>
    	<td class="onoff"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=heat&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['HEAT']; ?></a></td>
    <?php endif; ?>
	<?php if ($mode != "COOL"): ?>
	    <td class="onoff"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=hvac_control&req=cool&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><?php echo $lang['COOL']; ?></a></td>
    <?php endif; ?>
</tr>
</table>
<!-- HVAC control table end -->

</td>
</tr>
</table>
</div>
