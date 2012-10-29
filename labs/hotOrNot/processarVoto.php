<?php
	header('Content-type: text/json; charset=utf-8');
	$dados = array();
	$dados['id'] = rand(1,3);
	$dados['url'] = 'imagens/foto'.$dados['id'].'.jpg';

	echo json_encode($dados);
?>