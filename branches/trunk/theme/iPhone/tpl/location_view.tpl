	<h2><?php echo ($lang['floorplan']); ?></h2>
	<div class="white">
		<ul class="shortbutul">		
        <?php
        foreach($locations as $line_num => $loc):
          $locf = rtrim($locnf); ?>
            <li>
			<table>
				<tr>
					<td style='width:66%'><?php echo $loc;?></td>
					<td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=edit&line=<?php echo $line_num;?>"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-config-024x024.png" /></a></td>
					<td><a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=del&line=<?php echo $line_num;?>" onclick="return confirm('<?php echo ($lang['deleteconfirm']);?>')"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-remove-024x024.png" /></a></td>
					<td>
                    <?php if ($line_num != 0): ?>
                    	<a href="<?php echo ($_SERVER['PHP_SELF']); ?>?action=move&dir=up&line=<?php echo $line_num;?>"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-up-024x024.png" /></a>
                    <?php else: ?>
                    	<a href="javascript:return false;"><img width=20 height=20 src="<?php echo ($config['url_path']);?>/theme/iPhone/images/icontexto-webdev-arrow-up_bw-024x024.png" /></a>

                    <?php endif; ?>
                    </td>
					<td>
                    <?php if ($line_num != $locsize-1): ?>
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
