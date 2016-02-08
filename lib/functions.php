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

function start (){
	if(!isset($_GET['id'])) {
		$people = getPeople();
		require '../views/list.php';
	} else {
		$user = getUser();
		require '../views/show.php';
	}
}