<?php

	$idInicial = rand(1,3);
	$urlInicial = "imagens/foto$idInicial.jpg";

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<h1>Hot or Not</h1>

	<img height="320" widht="auto" id="imagem" data-id="<?php echo $idInicial; ?>" src="<?php echo $urlInicial; ?>" alt="Hot or Not">

	<script src="library/js/jquery-1.8.2.min.js"></script>
	<script src="library/js/APP.js"></script>
	<script src="js/APP.Imagem.js"></script>
	<script src="js/APP.Voto.js"></script>
	<script>APP.iniciar();</script>
</body>
</html>