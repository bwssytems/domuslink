<div id="content">

<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td width="50%" valign="top">

<h1>Compare</h1>

<table cellspacing="0" cellpadding="1" border="0">
<form action="">
<tr><td></td><td><font size="-2">(select all)</font></td></tr>
<?php foreach($query->result() as $row): ?>
	<tr>
	<td><input type="checkbox" name="provider" value="<?php echo $row->id; ?>"></td>
	<td><?php echo anchor('main/provider/'.$row->id, $row->name); ?></td>
	</tr>
<?php endforeach; ?>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" value="Compare"></td></tr>
</form>
</table>

</td>

<td>&nbsp;&nbsp;</td>

<td width="50%" valign="top">

<h1>Statistics</h1>

</td></tr>
</table>

</div>