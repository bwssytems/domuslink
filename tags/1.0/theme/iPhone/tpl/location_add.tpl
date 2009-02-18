<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.location.value == "") {
		alert( "The field is empty, please try again." );
		form.location.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<BR />
<h2><?php echo ($lang['addlocation']); ?></h2>
<div class="white">
<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=add" class="panel" method="post" onsubmit="return validateForm(this);">
	<fieldset>
		<div class="row">
			<label><?php echo ($lang['location']); ?>:</label>
			<input type="text" name="location" value="" size="25" />
		</div>
	</fieldset>
	<input type="submit" name="Submit" value="<?php echo ($lang['add']);?>" />
</form>
</div> 