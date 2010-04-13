<h2><?php echo ($lang['editlocation']); ?></h2>
<div class="white">
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" class="panel" method="post">
    	<input type="hidden" name="line" value="<?php echo $linenum; ?>" / >
        <fieldset>
            <div class="row">
                <label><?php echo ($lang['location']); ?>:</label>
                <input type="text" name="location" value="<?php echo $loc; ?>" size="25" />
            </div>
        </fieldset>
        <input type="submit" name="Submit" value="<?php echo ($lang['save']); ?>" />
    </form>
</div> 