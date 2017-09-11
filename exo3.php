<?php
session_start();

error_reporting(-1);
ini_set('display_errors', 'On');

class DataBase {

	public static function bdd(){
		$host = 'localhost';
		$DBname = 'pooDB';
		$username = 'root';
		$password = 'root';
		try {
		 	return new PDO('mysql:host='.$host.';dbname='.$DBname, $username, $password);
		} catch (PDOException $e){
			print "Erreur : " . $e->getMessage() ."</br>";
		}
	}
}

class User{
	public $id;
	public $username;
	public $email;
	public $password;
	public $connected;

	function __construct($username, $email, $password){
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}

	public function request($query){
		$connected = DataBase::bdd();
		$prepared = $connected->prepare($query);
		$prepared->execute();
		$data = $prepared->fetchAll();
		return $data;
	}

	public function create(){
		$query = "SELECT * FROM users WHERE username = '$this->username' ";
		$connected = DataBase::bdd();
		$prepared = $connected->prepare($query);
		$prepared->execute();
		$data = $prepared->fetchAll();
		if (!isset($data[0])){
			$query = "INSERT INTO users(username, email, password) VALUES('$this->username', '$this->email', '$this->password')";
			$connected = DataBase::bdd();
			$prepared = $connected->prepare($query);
			$prepared->execute();
		} else{
			echo "L'username est déjà connu en DB";
		}

	}

	public function sessionConnect(){
		// Récup l'ID pour enregistrement des session
		$query = "SELECT ID FROM users WHERE username = '$this->username' ";
		$connected = DataBase::bdd();
		$prepared = $connected->prepare($query);
		$prepared->execute();
		$data = $prepared->fetchAll();
		$_SESSION['ID'] = $data[0]['ID'];
		// Enregistrement du statut connected dans la DB
		$query = "UPDATE users SET connected = 1 WHERE email = '$this->email' ";
		$connected = DataBase::bdd();
		$prepared = $connected->prepare($query);
		$prepared->execute();
	}

	public function sessionDeconnect(){
		$query = "UPDATE users SET connected = 0 WHERE email = '$this->email' ";
		$connected = DataBase::bdd();
		$prepared = $connected->prepare($query);
		$prepared->execute();
		session_destroy();
	}

	public function nameUpdate($newUsername){
		$this->username = $newUsername;
		$query = "UPDATE users SET username = '$this->username' WHERE email = '$this->email' ";
		$connected = DataBase::bdd();
		$prepared = $connected->prepare($query);
		$prepared->execute();
	}

	public function emailUpdate($newEmail){
		$this->email = $newEmail;
		$query = "UPDATE users SET email = '$this->email' WHERE username = '$this->username' ";
		$connected = DataBase::bdd();
		$prepared = $connected->prepare($query);
		$prepared->execute();
	}

	public function delete(){
		$query = "DELETE FROM users WHERE username = '$this->username' ";
		$connected = DataBase::bdd();
		$prepared = $connected->prepare($query);
		$prepared->execute();
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exo 2 POO</title>
</head>
<body>
<?php

	echo 'testy </br>';
	$perso = new User('david', 'vdv.david@gmail.com', 'root');
	$perso->create();
	$perso->sessionConnect();


?>
</body>
</html>