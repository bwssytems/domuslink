<div id="content"><!-- Start Content -->

<div class="english-heading"><?php echo $original_lang; ?></div>
<div class="translation-heading"><?php echo $translated_lang; ?></div>

<?php echo form_open('main/save/'.$this->uri->segment(3)); ?>
<div style="display:none"></div>

<?php foreach ($org_lang_array as $key=>$text):

$len = strlen($text); 
$rows = $len - ($len / 3);

$_text = str_replace("<", "&lt;", $text);
?>

<?php if ($text != $other[$key]): ?>
<!-- translated -->
<div class="row">

<?php if ($len < 50): ?>
<div class="label"><pre><label for="<?php echo $key;?>"><?php echo $_text; ?></label></pre></div>
<div class="translation-div"><input id="<?php echo $key;?>" class="translation" type="text" value="<?php echo $other[$key]; ?>" name="<?php echo $key;?>"/></div>
<?php else: ?>
<div style="height: <?php echo $rows; ?>px;" class="label-textarea" ><pre><label for="<?php echo $key;?>"><?php echo $_text; ?></label></pre></div>
<div class="translation-div"><textarea name="<?php echo $key;?>" class="translation" style="height: <?php echo $rows; ?>px;" id="<?php echo $key;?>"><?php echo $other[$key]; ?></textarea></duv>
<?php endif; ?>

</div>
<!-- end row -->

<?php else: ?>
<!-- un-translated -->
<div class="row-nottranslated">

<?php if ($len < 50): ?>
<div class="label"><pre><label for="<?php echo $key;?>"><?php echo $_text; ?></label></pre></div>
<div class="translation-div"><input id="<?php echo $key;?>" class="translation" type="text" value="<?php echo $other[$key]; ?>" name="<?php echo $key;?>"/></div>
<?php else: ?>
<div style="height: <?php echo $rows; ?>px;" class="label-textarea" ><pre><label for="<?php echo $key;?>"><?php echo $_text; ?></label></pre></div>
<div class="translation-div"><textarea name="<?php echo $key;?>" class="translation" style="height: <?php echo $rows; ?>px;" id="<?php echo $key;?>"><?php echo $other[$key]; ?></textarea></div>
<?php endif; ?>

</div>
<!-- end row-untranslated -->
<?php endif; ?>

<?php endforeach; ?>

<div class="formbuttons"><input type="submit" value="Submit Changes" /></div>

<?php echo form_close(); ?>

</div><!-- End Content -->
