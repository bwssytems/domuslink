<div id="content">

<?php foreach($query->result() as $row): ?>
	<?php echo $row->name; ?><br>
<?php endforeach; ?>

</div>