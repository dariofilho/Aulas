<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
	
	#menu li {
		color: blue;
		text-decoration: underline;
		cursor: pointer;
	}
	#menu li:hover {
		text-decoration: none;
	}
	#menu li.ativo {
		color: red
	}
	
	.tela {
		display: none;
	}
	.tela.ativo {
		display: block;
	}
	</style>
</head>
<body>
	
	<ul id="menu">
		<li data-tela="1" class="ativo">Notícias</li>
		<li data-tela="2">Opção 2</li>
		<li data-tela="3">Opção 3</li>
		<li data-tela="4">Opção 4</li>
		<li data-tela="5">Opção 5</li>
	</ul>
	
	<div id="tela1" class="tela ativo">
		<h1>Notícias</h1>
		<div id="noticias">
			<div class="noticia"></div>
			<div class="noticia"></div>
			<div class="noticia"></div>
		</div>
	</div>
	<div id="tela2" class="tela">Conteúdo da tela 2</div>
	<div id="tela3" class="tela">Conteúdo da tela 3</div>
	<div id="tela4" class="tela">Conteúdo da tela 4</div>
	<div id="tela5" class="tela">Conteúdo da tela 5</div>
	
	<script src="../bibliotecas/js/APP.combined.js"></script>
	<script src="js/APP.combined.js"></script>
	<script>
		APP.executarSetUps();
	</script>
</body>
</html>