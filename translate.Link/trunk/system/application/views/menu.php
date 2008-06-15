
<!-- Start Menu -->
<div id="menu">
<?php if (get_cookie('dl_tc')): ?>
<?php echo anchor('', 'Home'); ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor('main/logout', 'Logout'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php endif; ?>
</div>
<!-- End Menu -->
