<table cellspacing="0" cellpadding="0" border="0" align="center" class="content">
<tr><th><?php echo ($lang['setupverify']); ?></th></tr>

<tr><td>

<table cellspacing="0" cellpadding="0" border="0" class="clear">
<tr>
<td colspan="7" align="center" style="border-bottom: 1px dotted #e5e5e5;">
<h6><?php echo ($lang['aliaslocationtext']);?></h6>
</td>
</tr>
<tr>
  <td><h6><?php echo ($lang['label']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['type']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['location']);?></h6></td>
  <td style="width:10px;"></td>
  <td><h6><?php echo ($lang['home']);?></h6></td>
</tr>

<?php
$aliasMapElement = new AliasMapElement();
foreach($aliasMaps as $aliasMapLine):
	$aliasMapElement->parseMapLine($aliasMapLine);
?>
<tr class="row">
  <td><?php echo $aliasMapElement->getAliasLabel();?></td>
  <td>&nbsp;</td>
  <td><?php echo rtrim($aliasMapElement->getType());?></td>
  <td>&nbsp;</td>
  <td><?php echo rtrim($aliasMapElement->getFloorPlanLabel());?></td>
  <td>&nbsp;</td>
  <td><?php echo $aliasMapElement->getHiddenFromHome();?></td>
</tr>
<?php endforeach; ?>
</table>

</td></tr>
<tr>
  <td align="center">
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>?action=edit" method="post">
    	<input type="submit" onMouseOver="popup('<?php echo ($lang['converttext']); ?>')" onmouseout="kill()" onfocus="this.blur()" value="<?php echo ($lang['convert']);?>" />
    	<input type="button" onMouseOver="popup('<?php echo ($lang['continuetext']); ?>')" onmouseout="kill()" onfocus="this.blur()" onClick="window.location='<?php echo($_SERVER['PHP_SELF']); ?>?action=cancel'" value="<?php echo ($lang['continue']); ?>" />
    </form>
  </td>
</tr>

</table>

<?php 
if (!empty($form)):
 echo($form);
endif; 
?>