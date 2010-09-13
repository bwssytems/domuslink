<div id="status" title="<?php echo ($lang['status']); ?>" class="panel">
	<span class="graytitle"><?php echo ($lang['setupverify']); ?></span>
	<ul class="pageitem">
		<li class="textbox">
			<p><?php echo ($lang['aliaslocationtext']);?></p>
		</li>
	</ul>
	<ul class="pageitem">
		<li class="textbox">
				<div class="left_4col"><strong><?php echo ($lang['label']);?></strong></div>
				<div class="vert_divider_4col">&nbsp;</div>
				<div class="left_4col"><strong><?php echo ($lang['type']);?></strong></div>
				<div class="vert_divider_4col">&nbsp;</div>
				<div class="left_4col"><strong><?php echo ($lang['location']);?></strong></div>
				<div class="vert_divider_4col">&nbsp;</div>
				<div class="left_4col"><strong><?php echo ($lang['home']);?></strong></div>
		</li>
		<?php
		$aliasMapElement = new AliasMapElement();
		foreach($aliasMaps as $aliasMapLine)
		{
			$aliasMapElement->parseMapLine($aliasMapLine);
			?>		
			<li class="textbox">
				<div class="left_4col"><?php echo $aliasMapElement->getAliasLabel();?></div>
				<div class="vert_divider_4col">&nbsp;</div>
				<div class="left_4col"><?php echo rtrim($aliasMapElement->getType());?></div>
				<div class="vert_divider_4col">&nbsp;</div>
				<div class="left_4col"><?php echo rtrim($aliasMapElement->getFloorPlanLabel());?></div>
				<div class="vert_divider_4col">&nbsp;</div>
				<div class="left_4col"><?php echo $aliasMapElement->getHiddenFromHome();?></div>
			</li>	
			<?php
		}
		?>	
	</ul>
	<form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=edit" method="post">
	<span class="graytitle"><?php echo ($lang['convert']);?>/<?php echo ($lang['continue']); ?></span>
	<ul class="pageitem">
		<li class="button">
			<input type="submit" onMouseOver="popup('<?php echo ($lang['converttext']); ?>')" onmouseout="kill()" onfocus="this.blur()" value="<?php echo ($lang['convert']);?>" />
		</li>
		<li class="button">
			<input type="button" onMouseOver="popup('<?php echo ($lang['continuetext']); ?>')" onmouseout="kill()" onfocus="this.blur()" onClick="window.location='<?php echo($_SERVER['PHP_SELF']); ?>?action=cancel'" value="<?php echo ($lang['continue']); ?>" />
		</li>		
	</ul>	
	</form>
<?php 
if (!empty($form)):
 echo($form);
endif; 
?>