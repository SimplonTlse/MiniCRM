<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<link rel="stylesheet" href="css/semantic.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<div class="container">
		<?php if (isset($flashMessage)) : ?>
			<?php echo $flashMessage; ?>
		<?php endif; ?>

		<nav class="ui menu">
			<a href="index.php" class="item">Liste</a>
			<a href="index.php?page=add" class="item">Nouveau</a>
		</nav>