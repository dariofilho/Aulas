<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="library/css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="homem">
	<canvas id="canvas" width="640" height="480"></canvas>
	<video id="video" width="640" height="480" autoplay class="fullscreen"></video>
	
	<div class="centralizar imagem"><img id="imagem" width="640" height="480" src="" /></div>
	<div class="centralizar pessoas homem"><img src="imagens/homem.png" class="carregando" width="640" height="480" alt="" /></div>
	<div class="centralizar pessoas mulher"><img src="imagens/mulher.png" class="carregando" width="640" height="480" alt="" /></div>
	
	<div id="loading"></div>
	<div id="loaded"></div>
	<script src="library/js/jquery-1.8.3.min.js"></script>
	<script src="library/js/APP.js"></script>
	<script src="js/APP.Camera.js?<?php echo md5(rand(1,9999));?>"></script>
	<script src="js/APP.Usuario.js?<?php echo md5(rand(1,9999));?>"></script>
	<script>APP.iniciar();</script>
</body>
</html>