<?php
	header("Content-type: text/plain; charset=utf-8");

	$resultado = array();
	$resultado['nome'] = "Anderson";
	$resultado['email'] = "pablo@reis.com";
	$resultado['idade'] = 18;
	$resultado['telefone'] = "81 9999-8888";

	echo json_encode($resultado);
?>