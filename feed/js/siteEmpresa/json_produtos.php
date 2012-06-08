<?php

	$db = array("status" => TRUE, "produtos" => array());
	$db['produtos'][] = array('id' => 1, 'nome' => "Mp3 Player", "descricao" => "Tocador de música", "preco" => "99,00");
	$db['produtos'][] = array('id' => 2, 'nome' => "Tv LED 42", "descricao" => "Televisor", "preco" => "2000,00");
	$db['produtos'][] = array('id' => 3, 'nome' => "BluRay", "descricao" => "Tocador de mídia", "preco" => "400,00");
	$db['produtos'][] = array('id' => 4, 'nome' => "PlayStation 13", "descricao" => "Console de video game", "preco" => "899,00");

	//$db = array("status"=>FALSE);
	header("Content-type: text/plain");
	echo json_encode($db);
	
	//print_r($db);
?>