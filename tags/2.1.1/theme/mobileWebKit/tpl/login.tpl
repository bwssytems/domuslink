	<ul class="pageitem">
       <li class="textbox"><span class="header"><?php echo ($lang['login']); ?></span>
	<?php 
       if ( (isset($_GET['failed']) && $_GET['failed'] == "true") )
       {
       	?>
           <font color="#CB7B7A"><?php echo ($lang['error_wrong_pass']); ?></font>
           <?php 
       }
       ?>
	<?php if (!isset($_POST['password'])): ?><?php echo ($lang['enter_password']); ?><?php endif; ?>
	</li>
	</ul>
	<form method="post">
        <fieldset>
			<ul class="pageitem">
				<li class="smallfield"><span class="name"><?php echo($lang['password']);?></span><input placeholder="password" name="password" type="password"/></li>
	            <input type="hidden" name="from" value="index" />
				<li class="checkbox"><span class="name"><?php echo($lang['keep_login']);?></span>
				<input name="remember" type="checkbox" value="true"/> </li>
				<li class="button">
				<input name="Submit" type="submit" value="<?php echo($lang['login']);?>" /></li>
            </ul>            
		</fieldset>
    </form>