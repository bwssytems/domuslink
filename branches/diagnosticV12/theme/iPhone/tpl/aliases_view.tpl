	<div class="white">
		<ul class="shortbutul">		
        <?php
		$arrayEnd = count($aliases) - 1;
		foreach($aliases as $alias): ?>
            <li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $alias->getHouseDevice(); ?></td>
					<td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=showeditform&line=<?php echo $alias->getLineNum();?>&page=<?php echo $page;?>"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-config-024x024.png" /></a></td>
					<td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $alias->getLineNum();?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-remove-024x024.png" /></a></td>
					<td>
                    <?php if ($alias->getLineNum() != 0): ?>
                    	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $alias->getLineNum();?>"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-up-024x024.png" /></a>
                    <?php else: ?>
                    	<a href="javascript:return false;"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-up_bw-024x024.png" /></a>

                    <?php endif; ?>
                    </td>
					<td>
                    <?php if ($alias->getLineNum() != $arrayEnd): ?>
                    	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $alias->getLineNum();?>"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-down-024x024.png" /></a>
                    <?php else: ?>
                    	<a href="javascript:return false;"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-down_bw-024x024.png" /></a>
                    <?php endif; ?>
                    </td>				
                 </tr>
			</table>
			</li>
		<?php endforeach; ?>
        </ul>
    </div>      
<?php 
if (!empty($form)):
 echo($form);
endif; 
?>
