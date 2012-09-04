<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>Contato</h1>
	<form action="resposta.php" method="POST">
		<input type="hidden" name="dataDoEnvio" 
			value="<?php echo date("d/m/Y H:i:s"); ?>">
		<ul>
			<li><label for="campoNome">Nome</label><input type="text" name="nome" id="campoNome" ></li>
			<li><label for="campoEmail">E-mail</label><input type="text" name="email" id="campoEmail"></li>
			<li><label for="campoTwitter">Twitter</label><input type="text" name="twitter" id="campoTwitter"></li>
			<li><label for="campoMensagem">Mensagem</label><textarea name="mensagem" id="campoMensagem"></textarea></li>
			<li><input type="submit" name="acao" value="Enviar"></li>
		</ul>
	</form>
</body>
</html>