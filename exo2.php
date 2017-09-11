<?php
class Voiture {
	function __construct($immat, $dateMiseCircu, $km, $modele, $marque, $couleur, $weight, $picPath){
		// Attribution des propriétés à l'initialisation
		$this->setImmat($immat);
		$this->setDateMiseCircu($dateMiseCircu);
		$this->setKm($km);
		$this->modele = $modele;
		$this->setMarque($marque);
		$this->couleur = $couleur;		
		$this->setWeight($weight);
		$this->picPath = $picPath;

	}

	private function setImmat($newImmat){
		$this->immat = $newImmat;
		$immatPrefix = substr($newImmat, 0, 2);
		switch ($immatPrefix) {
			case 'BE':
				$this->country = "Belgium";
				break;
			case 'FR':
				$this->country = "France";
				break;
			case 'DE':
				$this->country = "Germany";
				break;
			default:
				$this->country = "Foreign";
				break;
		}

	}

	private function setMarque($newMarque){
		$this->marque = $newMarque;
		if ($newMarque == "Audi"){
			$this->status = 'reserved';
		} else{
			$this->status = 'free';
		}
	}

 	public function setWeight($newWeight){
		$this->weight = $newWeight;
		if ($newWeight > 3500){
			$this->categorie = "utilitaire";
		} else{
			$this->categorie = "commerciale";
		}
	}

	public function setKm($newKm){
		$this->km = $newKm;
		if ($newKm > 100000 AND $newKm < 200000) {
			$this->usage = "middle";
		} elseif ($newKm > 200000){
			$this->usage = "high";
		} else{
			$this->usage = 'low';
		}
	}

	private function setDateMiseCircu($newDate){
		$this->dateMiseCircu = $newDate;
		$thisYear = date('Y');

		$this->age = $thisYear - $newDate;
	}

	public function rouler(){
		$this->setKm($this->km + 100000);
	}

	public function display(){
		return (' <table>
					<tr>
					<th>Marque</th>
					<th>Modèle</th>
					<th>Couleur</th>
					<th>Mise en circu</th>
					<th>Nombre de KM</th>
					<th>Usure</th>
					<th>Poids</th>
					<th>Pays</th>
					<th>Status</th>
					<th>Catégorie</th>
				  </tr>
				  <tr>
				  	<td>'.$this->modele.'</td>
				  	<td>'.$this->marque.'</td>
				  	<td>'.$this->couleur.'</td>
				  	<td>'.$this->dateMiseCircu.'</td>
				  	<td>'.$this->km.'</td>
				  	<td>'.$this->usage.'</td>
				  	<td>'.$this->weight.'</td>
				  	<td>'.$this->country.'</td>
				  	<td>'.$this->status.'</td>
				  	<td>'.$this->categorie.'</td>
				  	<img src="'.$this->picPath.'" alt="car"/>
				  </tr>
				  </table>'
				  );
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
	$myCar = new Voiture('BE12311223', '2010', '230000', 'Audi', 'A8', 'verte', '7000', 'audi_a8.jpg');
	echo $myCar->display();
?>
</body>
</html>