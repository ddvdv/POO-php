<?php

// Le début d'un formulaire <form ...>
// Un input text <input type="text"...>
// Un select <select ...> ...</select>
// Un bouton submit <button type="submit"></button>
// Un textarea <textarea ...> ...</textarea>
// Un radio button <textarea ...> ...</textarea>
// Une checkbox <input type="radio"...>

class Form {
	function create($actionType){
		return "<form action='".$actionType."'>";
	}
	function input($placeHolder){
		return "<input type='text' placeholder='".$placeHolder."'>";
	}
	function select($arrayChoices){
		$nbChoices = count($arrayChoices);
		$choicesList = '';
		for($i = 0; $i < $nbChoices; $i++){
			$choicesList .= "<option value=".$arrayChoices[$i].">".$arrayChoices[$i]."</option>";
		}
		return "<select>".$choicesList."</select>";
	}
	function submit($buttonName){
		return "<input type='submit' value='".$buttonName."'>";
	}
	function textArea(){
		return "<input type='textarea'>";
	}
	function radio(){
		return "<input type='radio'>";
	}
	function checkbox(){
		return "<input type='checkbox'>";
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php
	$form = new Form();
	echo $form->create('post');
	$cars = ['merco', 'renaud', 'citro'];
	echo $form->select($cars);
	echo $form->submit('hi there');
	echo $form->textArea();
	echo $form->radio();
	echo $form->checkbox();
	echo $form->input('you wouldn say');


?>

</body>
</html>