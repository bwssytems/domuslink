<script language="JavaScript" type="text/javascript">
<!--
function validateForm(form)
{
	if (form.code.value == "") {
		alert( "The code field is empty, please try again." );
		form.code.focus();
		return false ;
	}
	
	if (form.label.value == "") {
		alert( "The label field is empty, please try again." );
		form.label.focus();
		return false ;
	}

  return true ;
}
//-->
</script>
<BR />
<?php $label; $code; $module; $type; $loc; ?>
<h2><?php echo ($lang['addalias']);?></h2>
<div class="white" id="addform">
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" class="panel" method="post"  onsubmit="return validateForm(this);">
        <fieldset>
            <div class="row">
                <label><?php echo ($lang['code']); ?>:</label>
                <input type="text" name="code" value="" size="25" />
                <label><?php echo ($lang['label']);?>:</label>
                <input type="text" name="label" value="" size="25" />
                <label><?php echo ($lang['module']);?>:</label>
                <select name="module">
                <?php foreach (load_file(MODULE_FILE_LOCATION) as $modulenf): ?>
                <?php $modulef = rtrim($modulenf); ?>
                        <option value="<?php echo $modulef; ?>"><?php echo $modulef; ?></option>
                <?php endforeach; ?>
                </select>
                <br clear="all" />
                <br clear="all" />
                <label><?php echo ($lang['type']); ?>:</label>
                <select name="type">
                <?php foreach ($modtypes as $key => $typenf): ?>
                <?php $typef = rtrim($typenf); ?>
                    <option value="<?php echo $typef; ?>"><?php echo $typef; ?></option>
                <?php endforeach; ?>
                </select>
                <br clear="all" />
                <br clear="all" />
                <label><?php echo ($lang['location']);?>:</label>
                <select name="loc">
                <?php foreach (load_file(FPLAN_FILE_LOCATION) as $locnf): ?>
                <?php $locf = rtrim($locnf); ?>
                    <option value="<?php echo $locf; ?>"><?php echo $locf; ?></option>
                <?php endforeach; ?>
                </select>
                <br clear="all" />
                <br clear="all" />
            </div>                             
        </fieldset>
        <input type="submit" name="Submit" value="<?php echo ($lang['add']);?>" />
    </form>
</div> 
