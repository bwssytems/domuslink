<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" method="post">
<input type="hidden" name="line" value="<?php echo $linenum; ?>" / >

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th colspan="2"><?php echo ($lang['editlocation']); ?></th></tr>

<tr><td align="center" colspan="2">

<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td align="center"><h6><?php echo ($lang['location']); ?>:</h6></td></tr>
  <tr><td align="center"><input type="text" name="location" value="<?php echo $loc; ?>" size="30" /></td></tr>
</table>

</td></tr>

<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['save']); ?>" />
<input type="button" onClick="window.location='<?php echo ($_SERVER['PHP_SELF']); ?>'" value="<?php echo ($lang['cancel']); ?>" />
</td>
</tr>
</table>

</form>