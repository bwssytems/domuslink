
<div id="menu">
<?php if (get_cookie('dl_tca')): ?>
<?php echo anchor('admin/', 'Home'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
|&nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor('admin/user_new/', 'Add User'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
|&nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor('admin/lang_new/', 'Add Language'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
|&nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor('admin/view_log/', 'View Log'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
|&nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor('admin/logout/', 'Logout'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php endif; ?>
</div>
