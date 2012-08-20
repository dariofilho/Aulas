<?php
	
	header("Content-type: text/plain; charset=utf-8");

	$minhaString = "Uva,Laranja,Manga";
	$delimitador = ",";

	$arrayDeFrutas = explode($delimitador,$minhaString);

	print_r($arrayDeFrutas);
	var_dump($arrayDeFrutas);

	

?>