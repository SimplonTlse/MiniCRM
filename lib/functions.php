<?php

function connect(){
	ORM::configure('mysql:host=localhost;dbname=fake');
	ORM::configure('username', 'root');
	ORM::configure('password', 'root');
	ORM::configure('error_mode', PDO::ERRMODE_WARNING);
}

function getUser(){
	$id = $_GET['id'];
	$person = ORM::for_table('users')->find_one($id);

	return $person;
}

function getPeople(){
	$people = ORM::for_table('users')->find_many();
	return $people;
}

function createUser($data){
	$newUser = ORM::for_table('users')->create();
	
	$newUser->nom = $data['nom'];
	$newUser->prenom = $data['prenom'];
	$newUser->date = $data['date'];
	$newUser->telephone = $data['telephone'];

	$newUser->save();
}

function editUser($data) {
	$user = ORM::table('users')->find_one($data['id']);

	$user->nom = $data['nom'];
	$user->prenom = $data['prenom'];
	$user->date = $data['date'];
	$user->telephone = $data['telephone'];

	$user->save();
}

function start (){
	if(!empty($_POST)) {
		if(!isset($_POST['id'])) {
			createUser($_POST);
		} else {
			editUser($_POST);
		}
		require '../views/list.php';
		return;
	}


	if(!isset($_GET['id']) && !isset($_GET['page'])) {
		$people = getPeople();
		require '../views/list.php';
		return; 
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

	$user = getUser();
	require '../views/show.php';
}