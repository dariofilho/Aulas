<?php
	header("Content-type: image/png");

	$imagem = file_get_contents("tela.png");
	echo $imagem;
?>
