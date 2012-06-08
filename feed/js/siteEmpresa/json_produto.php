<?php
	header("Content-type: text/plain");
	$db = array("status" => TRUE);
	
	$produtos = array();
	$produtos[] = array('id' => 1, 'nome' => "Mp3 Player", "descricao" => "Tocador de música", "preco" => "99,00");
	$produtos[] = array('id' => 2, 'nome' => "Tv LED 42", "descricao" => "Televisor", "preco" => "2000,00");
	$produtos[] = array('id' => 3, 'nome' => "BluRay", "descricao" => "Tocador de mídia", "preco" => "400,00");
	$produtos[] = array('id' => 4, 'nome' => "PlayStation 13", "descricao" => "Console de video game", "preco" => "899,00");
	
	
	
	$id = -1;
	if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] <= count($produtos)) {
		$id = $_GET['id'];
		settype($id, 'integer');
		
		$indice = $id - 1;
		$db['produto'] = $produtos[$indice];
	} else {
		$db['status'] = FALSE;
		$db['mensagem'] = "Produto não encontrado";
	}
	
	
	echo json_encode($db);
	
	
	

	
	
?>