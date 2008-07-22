<div id="content">
<br />
Are you sure you want to remove user <b><?php echo $user_name; ?></b> including logs and language associations? &nbsp; <?php echo anchor('admin/user_delete/confirmed/'.$this->uri->segment(3), 'Yes'); ?>/<?php echo anchor('admin/', 'No'); ?>
<br /><br />
</div>