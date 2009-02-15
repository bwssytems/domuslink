<div id="module">
<table cellspacing="0" cellpadding="0" border="0" class="module" height="37px">
<tr>
<td width="17" valign="top"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/module_light_<?php echo $state; ?>.png" vspace="2" />

</td>
<td width="110px" valign="bottom" height="22"><input type="text" value="<?php echo $label; ?>" class="module_<?php echo $state; ?>"  /></td>
<td rowspan="2"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=<?php echo $action; ?>&code=<?php echo $code; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/switch_<?php echo $state; ?>.gif" border="0" /></a></td>
</tr>
<tr>
<td><?php if ($config['codes'] == "ON"): ?>
<p class="code"><?php echo $code; ?></p>
<?php endif; ?></td>
<td valign="bottom" align="center">

<!-- dimmer table start -->
<table cellspacing="0" cellpadding="0" border="0" class="dimlevel" align="center">
<tr>
<?php for($i = 1; $i <= 5; $i++): ?>
  <?php if ($i <= $level): ?>
    <td class="dimlevelon"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=db&state=<?php echo $state; ?>&code=<?php echo $code; ?>&req=<?php echo $i; ?>&curr=<?php echo $level; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/1px.gif" border="0" height="1px" width="1px" /></a></td>
    <?php if ($i != 5): // dont display if last level ?>
      <td style="border: 0; width: 5px;"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/1px.gif" border="0" height="1px" width="1px" /></td>
    <?php endif; ?>
  <?php else: ?>
    <td class="dimleveloff"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=db&state=<?php echo $state; ?>&code=<?php echo $code; ?>&req=<?php echo $i; ?>&curr=<?php echo $level; ?>&page=<?php echo $page; ?>"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/1px.gif" border="0" height="1px" width="1px" /></a></td>
    <?php if ($i != 5): // dont display if last level ?>
      <td style="border: 0; width: 5px;"><img src="<?php echo $config['url_path']; ?>/theme/<?php echo $config['theme']; ?>/images/1px.gif" border="0" height="1px" width="1px" /></td>
    <?php endif; ?>
  <?php endif; ?>
<?php endfor; ?>
<tr>
</table>
<!-- dimmer table end -->

</td>
</tr>
</table>
</div>
