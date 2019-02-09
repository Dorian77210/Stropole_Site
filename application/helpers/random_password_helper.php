<?php

function random_password($longueur = 10){

	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$password = '';
	for($i = 0; $i < $longueur; $i++){

		$password .= $caracteres[rand(0, strlen($caracteres) - 1)];
	}

	return $password;

}

?>