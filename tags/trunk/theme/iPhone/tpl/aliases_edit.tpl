<?php $label; $code; $module; $type; $loc; ?>
<h2><?php echo ($lang['editalias']);?>: HIERO</h2>
<div class="white">
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=save" class="panel" method="post">
    <input type="hidden" name="line" value="<?php echo $linenum; ?>" / >
        
        <fieldset>
            <div class="row">
                <label><?php echo ($lang['code']); ?>:</label>
                <input type="text" name="code" value="<?php echo $code; ?>" size="25" />
                <label><?php echo ($lang['label']);?>:</label>
                <input type="text" name="label" value="<?php echo $label; ?>" size="25" />
                <label><?php echo ($lang['module']);?>:</label>
                <select name="module">
                <?php foreach (load_file(MODULE_FILE_LOCATION) as $modulenf): ?>
                <?php $modulef = rtrim($modulenf); ?>
                    <?php if ($module == $modulef): ?>
                        <option value="<?php echo $modulef; ?>" selected><?php echo $modulef; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $modulef; ?>"><?php echo $modulef; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
                <br clear="all" />
                <br clear="all" />
                <label><?php echo ($lang['type']); ?>:</label>
                <select name="type">
                <?php foreach ($modtypes as $key => $typenf): ?>
                <?php $typef = rtrim($typenf); ?>
                    <?php if (rtrim($type) == $typef): ?>
                        <option value="<?php echo $typef; ?>" selected><?php echo $typef; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $typef; ?>"><?php echo $typef; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
                <br clear="all" />
                <br clear="all" />
                <label><?php echo ($lang['location']);?>:</label>
                <select name="loc">
                <?php foreach (load_file(FPLAN_FILE_LOCATION) as $locnf): ?>
                <?php $locf = rtrim($locnf); ?>
                    <?php if (rtrim($loc) == $locf): ?>
                        <option value="<?php echo $locf; ?>" selected><?php echo $locf; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $locf; ?>"><?php echo $locf; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
                <br clear="all" />
                <br clear="all" />
            </div>                             
        </fieldset>
        <input type="submit" name="Submit" value="<?php echo ($lang['save']); ?>" />
    </form>
</div> 