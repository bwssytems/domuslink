	<form name="form" method="post" class="panel" action="<?php echo($_SERVER['PHP_SELF']); ?>">
        <h2><?php echo ($lang['login']); ?></h2>
		<p>
		<?php if ($_GET['failed'] == "true"): ?><font color="#CB7B7A"><?php echo ($lang['error_wrong_pass']); ?></font><br><?php endif; ?>
		<?php if (!isset($_POST['password'])): ?><?php echo ($lang['enter_password']); ?><?php endif; ?>
		</p>
        <fieldset>
            <div class="row">
                <label><?php echo($lang['password']);?></label>
                <input type="hidden" name="from" value="<?php if ($_GET) echo ($_GET['from']); ?>" />
				<input type="password" name="password" />
            </div>
		</fieldset>
		<input type="submit" name="Submit" value="<?php echo($lang['login']);?>" />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
    </form>