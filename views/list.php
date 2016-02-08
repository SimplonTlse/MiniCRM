<?php require 'parts/header.php'; ?>
		

<h1>People</h1>

<ul>
<?php foreach($people as $p) : ?>
<li><a href="?id=<?php echo $p->id; ?>"><?php echo $p->nom; ?> <?php echo $p->prenom; ?></a></li>

<?php endforeach; ?>
</ul>


<?php require 'parts/footer.php'; ?>