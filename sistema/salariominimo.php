<?php

$jsoncontas = file_get_contents("https://salariominimo.herokuapp.com/");
	$contas= json_decode($jsoncontas);
	
	echo $contas[0]->salary;
?>