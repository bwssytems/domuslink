<div id="content"><!-- Start Content -->


<ul>
<?php foreach ($langs->result() as $row): ?>

<li><?php echo anchor('main/translate/'.$row->id, $row->org_name.'/'.$row->int_name); ?></li>

<?php endforeach; ?>
</ul>

</div><!-- End Content -->
