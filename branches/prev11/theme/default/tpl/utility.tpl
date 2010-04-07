<!--
/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
 -->
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=execute" method="post">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['utilitytool']); ?></th></tr>
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr>
<td align="center"><h6><?php echo ($lang['command']); ?></h6></td>
<td width="700px" align="center"><h6><?php echo ($lang['output']); ?></h6></td>
</tr>
<tr>
<td align="center">
<!-- command -->
<select name="command" size="10">
<?php foreach ($commands as $command): ?>
		<option value="<?php echo $command;?>"><?php echo $command;?></option>
<?php endforeach; ?>
</select>
<!-- end command -->
</td>
<td>

<?php
if (!is_array($out_lines)) $out_lines = array($out_lines);
foreach ($out_lines as $out_line) {
	echo "$out_line<br>";
	}
?>

</td></tr>
<tr>
<td><h6><?php echo ($lang['arguments']); ?>:</h6></td>
<td> </td>
</tr>
<tr>
<td align="left">
<input size="30" type="text" name="arguments" value="" />
</td>
</tr>

</table>
</td>
</tr>
<tr><td align="center"><input type="submit" value="<?php echo ($lang['execute']);?>" /></td></tr>
</table>
</form>
