<?php
class DataBase {
	function __constructor($username, $password, $DBname, $localhost){
		$this->username = $username;
		$this->password = $password;
		$this->connection = new PDO('mysql:host=$localhost;dbname=$DBname', $username, $password);
	}

	function query(requete){
		$this->connection->query(requete);

	}
}

class User{
	function __constructor($id, $username, $email, $password){
		$this->id = $id;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
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
	$DB = new DataBase('root', 'root');
	$DB->connection->query('SELECT * FROM users');



?>
</body>
</html>