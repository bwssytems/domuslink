	<form name="form" method="post" class="panel" action="<?php echo($_SERVER['PHP_SELF']); ?>">
        <h2><?php echo ($lang['login']); ?></h2>
		<p>
		<?php 
        if ( (isset($_GET['failed']) && $_GET['failed'] == "true") )
        {
        	?>
            <font color="#CB7B7A"><?php echo ($lang['error_wrong_pass']); ?></font><br>
            <?php 
        }
        ?>
		<?php if (!isset($_POST['password'])): ?><?php echo ($lang['enter_password']); ?><?php endif; ?>
		</p>
        <fieldset>
            <div class="row">
                <label><?php echo($lang['password']);?></label>
                <input type="hidden" name="from" value="index" />
				<input type="password" name="password" />
            </div>
		</fieldset>
         <div id="error" title="<?php echo ($lang['error']); ?>" class="white">
            <br />
            <label><?php echo($lang['keep_login']);?> </label>
            &nbsp;&nbsp;&nbsp;<input type="checkbox" name="remember" value="true" width="5" style="width:5px" />             
            <br />
            <br />
		</div>        
        <br /><br />
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