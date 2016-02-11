<?php require 'parts/header.php'; ?>
<h1>Edit user</h1>
<form action="index.php" class="ui form" method="post">
	<input type="hidden" name="id" value="<?php echo $editable->id; ?>">
	<div class="field">
		<label for="nom">Nom</label>
		<input type="text" id="nom" name="nom" value="<?php echo $editable->nom; ?>">
	</div>
	<div class="field">
		<label for="prenom">Prenom</label>
		<input type="text" name="prenom" id="prenom" value="<?php echo $editable->prenom; ?>">
	</div>
	<div class="field">
		<label for="date">Date</label>
		<input type="date" name="date" id="date" value="<?php echo $editable->date ?>">
	</div>
	<div class="field">
		<label for="telephone">Tél.</label>
		<input type="text" name="telephone" id="telephone" value="<?php echo $editable->telephone ?>">
	</div>
	<div class="field">
		<label for="adr">Adresse</label>
		<textarea name="adresse" id="adr" cols="30" rows="10"><?php echo $editable->adresse ?></textarea>
	</div>
	<div>
		<button class="ui green button">Modifier</button>
	</div>
</form>
<?php require 'parts/footer.php';