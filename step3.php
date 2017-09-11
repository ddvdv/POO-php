<?php
// Créer une class Validator qui va servir à valider les données envoyer par le formulaire. Cette classe contiendra des méthodes qui pourront valider : - une chaine de caractère - un entier - un nombre à virgule - etc.


class Validator {
	public function string($string){
		$string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
		if ($string != ''){
			return true;
		} else{
			return false;
		}
	}

	public function integer($integer){
		if (filter_var($integer, FILTER_VALIDATE_INT)){
			return true;
		} else{
			return false;
		}
	}

	public function float($float){
		if (filter_var($float, FILTER_VALIDATE_FLOAT)){
			return true;
		} else{
			return false;
		}
	}

}

$Validator = new Validator();

echo $Validator->float(9.8);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
</head>
<body>

<?php

	
?>

</body>
</html>