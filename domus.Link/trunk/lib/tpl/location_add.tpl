<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post">

<table cellspacing="0" cellpadding="0" border="0" width="200px" class="content">
<tr><th><?php echo ($lang['addlocation']); ?></th></tr>

<tr><td align="center">

<table cellspacing="0" cellpadding="0" border="0" class="clear">
  <tr><td align="center"><h6><?php echo ($lang['location']); ?>:</h6></td></tr>
  <tr>
    <td width="150px"><input type="text" name="location" value="" size="20" /></td>
  </tr>
</table>

</td></tr>

<tr>
<td align="center">
<input type="submit" value="<?php echo ($lang['add']);?>" />
</td>
</tr>
</table>

</form>