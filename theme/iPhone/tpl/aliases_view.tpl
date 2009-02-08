	<div class="white">
		<ul class="shortbutul">		
        <?php
        list($temp, $first_line) = split("@", $aliases[0], 2);
        list($temp, $last_line) = split("@", $aliases[$size-1], 2);
        
        foreach($aliases as $alias_num):
            list($alias, $line_num) = split("@", $alias_num, 2);
            list($alias, $label, $code, $module_type) = split(" ", $alias, 4);
            list($module, $typenloc) = split(" # ", $module_type, 2);
            list($type, $loc) = split(",", $typenloc, 2); ?>
            <li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $code;?></td>
					<td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=showeditform&line=<?php echo $line_num;?>&page=<?php echo $page;?>"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-config-024x024.png" /></a></td>
					<td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-remove-024x024.png" /></a></td>
					<td>
                    <?php if ($line_num != $first_line): ?>
                    	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $line_num;?>"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-up-024x024.png" /></a>
                    <?php else: ?>
                    	<a href="javascript:return false;"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-up_bw-024x024.png" /></a>

                    <?php endif; ?>
                    </td>
					<td>
                    <?php if ($line_num != $last_line): ?>
                    	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=down&line=<?php echo $line_num;?>"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-down-024x024.png" /></a>
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
