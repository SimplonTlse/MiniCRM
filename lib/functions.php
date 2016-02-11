<?php

function connect(){
	ORM::configure('mysql:host=localhost;dbname=fake');
	ORM::configure('username', 'root');
	ORM::configure('password', 'root');
	ORM::configure('error_mode', PDO::ERRMODE_WARNING);
}

function flash($msg, $state='success') {
	$out = '<div class="ui message '. $state .'">';
	$out .= $msg;
	$out .= '</div>';

	return $out;
}


function getUserMessages($id){
	return ORM::for_table('messages')->where('user_id', $id)->order_by_desc('created_at')->find_many();
}

function createMessage($data){
	$msg = ORM::for_table('messages')->create();
	$msg->content = $data['content'];
	$msg->user_id = $data['user_id'];
	$msg->save();
}

function getUser($id){
	return ORM::for_table('users')->find_one($id);
}

function getPeople(){
	return ORM::for_table('users')->find_many();
}

function createUser($data){
	$newUser = ORM::for_table('users')->create();
	
	$newUser->nom = $data['nom'];
	$newUser->prenom = $data['prenom'];
	$newUser->date = $data['date'];
	$newUser->telephone = $data['telephone'];
	$newUser->adresse = $data['adresse'];

	$newUser->save();
}

function editUser($data) {
	$id = intval($data['id'], 10);

	$user = ORM::for_table('users')->find_one($id);
	$user->nom = $data['nom'];
	$user->prenom = $data['prenom'];
	$user->date = $data['date'];
	$user->telephone = $data['telephone'];
	$user->adresse = $data['adresse'];

	$user->save();
}

function removeUser($id){
	$user = ORM::for_table('users')->find_one($id);
	$user->delete();
}

function start (){
	if(!empty($_POST)) {
		if(isset($_POST['_method']) && $_POST['_method'] === 'delete'){
			removeUser($_POST['id']);
			$flashMessage = flash('L\'utilisateur a bien été supprimé');
		} elseif(isset($_POST['content'])){
			createMessage($_POST);
			$flashMessage = flash('Le message a bien été ajouté !');
			return go2page('user', $_POST['user_id']);
		} elseif(!isset($_POST['id'])) {
			createUser($_POST);
			$flashMessage = flash('L\'utilisateur a été créé avec succès');
		}else {
			editUser($_POST);
			$flashMessage = flash('L\'utilisateur a bien été modifié !');
		}

		return go2page('list');
	}


	if(!isset($_GET['id']) && !isset($_GET['page'])) {
		return go2page('list');
	} 
	if(isset($_GET['page']) && $_GET['page'] === 'add') {
		require '../views/add.php';
		return; 
	} 
	if(isset($_GET['page']) && $_GET['page'] === 'edit') {
		if(!isset($_GET['id'])){
			die('veuillez spécifier un id d\'utilisateur');
		}
		$id = $_GET['id'];
		$editable = ORM::for_table('users')->find_one($id);
		require '../views/edit.php';
		return; 
	} 

	$id = $_GET['id'];
	return go2page('user', $id);
}

function go2page($view, $param=null){
	if($view === 'user'){
		return viewUser($param);
	}
	return viewList();
}

function viewList(){
	$people = getPeople();
	require '../views/list.php';
	return;
}

function viewUser($id){
	$user = getUser($id);
	$messages = getUserMessages($user->id);
	require '../views/show.php';
}

function humanDate($date){
	$t = new DateTime($date);
	return $t->format('d-m-Y H:i:s');
}

function dd($var){
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
	die();
}