<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.sched_file_name.value == "") {
		alert( "No Schedule File Name has been selected, please try again." );
		form.sched_file_name.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" method="post" onsubmit="return validateForm(this);">

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><th><?php echo ($lang['addschedfile']); ?></th></tr>
<tr><td>

<!-- start center table -->
<table cellspacing="0" cellpadding="0" border="0" class="clear">
<!-- status -->
<tr>
<td align="left"><h6><?php echo ("Schedule File");?>:</h6></td>
<td align="left">
<input size="100" type="text" name="sched_file_name" value="" />
</td>
</tr>
</table>


</td></tr>
<tr><td align="center"><input type="submit" value="<?php echo ($lang['add']);?>" /></td></tr>
</table>

</form>
