<?php require 'parts/header.php'; ?>
<h1>Ajout d'un nouvel utilisateur</h1>

<form action="index.php" class="ui form" method="post">
	<div class="field">
		<label for="nom">Nom</label>
		<input type="text" id="nom" name="nom">
	</div>
	<div class="field">
		<label for="prenom">Prénom</label>
		<input type="text" id="prenom" name="prenom">
	</div>
	<div class="field">
		<label for="naissance">Date de naissance</label>
		<input type="date" id="naissance" name="date"> 
	</div>
	<div class="field">
		<label for="phone">Téléphone</label>
		<input type="text" id="phone" name="telephone">
	</div>
	<div class="field">
		<label for="adr">Adresse</label>
		<textarea name="adresse" id="adr" cols="30" rows="10"></textarea>
	</div>
	<div>
		<button class="ui button green"><i class="icon checkmark"></i> All right !</button>
	</div>
</form>

<?php require 'parts/footer.php'; ?>