<?php
// Créer une class Html ( dans un fichier séparé ) qui va générer différents éléments HTML :

// Lier des Fichiers CSS <link rel="stylesheet" ...>
// Créer des Balises meta <meta ...>
// Lier des Images <img src="...">
// Créer des Liens <a href="...">
// Lier des Fichiers Javascript

class Html {
	public function cssLink($path){
		return ('<link rel="stylesheet" type="text/css" href="'.$path.'">');
	}
	public function meta($metaType, $name = null, $content = null){
		if ($metaType == "charset"){
			return '<meta charset="UTF-8">';
		} elseif ($metaType == "name"){
			return '<meta name="'.$name.'" content="'.$content.'">';
		}
	}
	public function image($path, $description){
		return '<img src="'.$path.'" alt="'.$description.'"/>';
	}
	public function href($path, $description){
		return '<a href="'.$path.'">'.$description.'</a>';
	}
	public function linkJs($path){
		return '<script src="'.$path.'"></script>';
	}
}

$Html = new Html();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		echo $Html->cssLink('./style.css');
		echo $Html->meta('charset');
		echo $Html->meta('name', 'author', 'michael');
	?>
	<title>Document</title>
</head>
<body>

<?php
	echo $Html->image("coucou.jpg", "pas coucou");
	echo $Html->href("coucou.html", "lien vers le coucou");
	echo $Html->linkJs('app.js');
	

?>

</body>
</html>