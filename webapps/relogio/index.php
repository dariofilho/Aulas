<!doctype html>
<html lang="en" manifest="cache.appcache">
<head>
	<script>
	/**
	 * CONTROLE DE CACHE
	 */
	window.addEventListener('load', function(e) {
		// Checa se um novo cache está disponível para o WebApp
		window.applicationCache.addEventListener('updateready', function(e) {
			if (window.applicationCache.status == window.applicationCache.UPDATEREADY) {

				//Faz o download do novo cache e remove o antigo
				window.applicationCache.swapCache();
				window.location.reload();
			}
		}, false)
		
	}, false);

	setInterval(function(){
	    applicationCache.update();  
	}, 1000);
	</script>
	<meta charset="UTF-8">
	<title>WebApp Relógio</title>
	<link href='css/fonts.css' rel='stylesheet' type='text/css'>
	<style>
	body {
		margin: 0;
	}
	
	#hora{ 
		font-family: 'Droid Sans', sans-serif;
		font-size: 5em;
		position: fixed;
		top: 1em;
		right: 1em;
	}
	#relogio {
		position: fixed;
		bottom: 0;
		left: 0;
		opacity: 0.1;
	}
	</style>
</head>
<body>
	<img id="relogio" src="imagens/relogio.jpg" alt="">
	<div id="hora"><?php echo date("H:i:s"); ?></div>
</body>
</html>