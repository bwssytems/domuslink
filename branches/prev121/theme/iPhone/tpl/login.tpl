<div id="content" class="panel">
	<span class="graytitle"><?php echo ($lang['login']); ?></span>
	<?php 
	if ( (isset($_GET['failed']) && $_GET['failed'] == "true") )
	{
		?>		
		<ul class="pageitem">
			<li class="textbox">
				<span class="header"><?php echo ($lang['error']); ?></span>
				<p><font color="#CB7B7A"><?php echo ($lang['error_wrong_pass']); ?></font></p>
			</li>
		</ul>		
		<?php 
	}
	?>	
	<form name="form" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>">
		<?php
		if ($_GET['from']) 
		{
			?>
			<input type="hidden" name="from" value="<?php echo ($_GET['from']);?>" />
			<?php
		}
		else
		{
			?>
			<input type="hidden" name="from" value="index" />
			<?php
		}
		?>
		<fieldset>
			<?php if (!isset($_POST['password'])): ?>
				<ul class="pageitem">
					<li class="textbox">
						<p><?php echo ($lang['enter_password']); ?></p>
					</li>
				</ul>		
			<?php endif; ?>
				<ul class="pageitem">
					<li class="bigfield"><input placeholder="Password" type="password" name="password" /></li>			
					<li class="button"><input name="Submit" type="submit" value="<?php echo($lang['login']);?>" /></li>
				</ul>	
				<ul class="pageitem">
					<li class="checkbox">
						<span class="check">
							<span class="name"><?php echo($lang['keep_login']);?></span>
							<input name="remember" type="checkbox" value="true" />
						</span>
					</li>
				</ul>
		</fieldset>
	</form>
</div>