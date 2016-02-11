<?php require 'parts/header.php'; ?>
		<h1><?php echo $user->nom ?> <?php echo $user->prenom ?></h1>
		<ul>
			<li>Téléphone : <?php echo $user->telephone ?></li>
			<li>Date de naissance : <?php echo $user->date ?></li>
			<li>Identifiant : <?php echo $user->id ?></li>
			<li>Adresse : <?php echo $user->adresse ?></li>
		</ul>

		<div class="ui menu">
			<div class="item">
				<a href="?id=<?php echo $user->id ?>&page=edit" class="ui blue button">Editer</a>
			</div>
			<form action="index.php" class="item" method="post">
				<input type="hidden" name="id" value="<?php echo $user->id ?>">
				<input type="hidden" name="_method" value="delete">
				<button class="ui red button">Supprimer</button>
			</form>
		</div>
		<form method="post" action="index.php?id=<?php echo $user->id ?>" class="ui segment attached top">
			<h3>Nouveau message</h3>
			<input type="hidden" name="user_id" value="<?php echo $user->id ?>">
			<div class="item">
				<textarea name="content" id="" cols="30" rows="10"></textarea>
			</div>
			<button class="ui button">Ajouter</button>
		</form>
		<div class="ui segment">
			<?php if(count($messages) === 0): ?>
				Aucun message
			<?php endif ?>
			
			<?php foreach($messages as $msg): ?>
			<div class="ui segment attached">
				<?php echo $msg->content ?>	
			</div>
			<div class="ui segment secondary attached">
				<?php echo humanDate($msg->created_at) ?>
			</div>
			<?php endforeach; ?>
		</div>
<?php require 'parts/footer.php'; ?>