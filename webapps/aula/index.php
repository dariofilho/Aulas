<!doctype html>
<html lang="en" manifest="cache.appcache">
<head>
	<script>
	applicationCache.onchecking = function(){
		console.debug("Verificando cache");
	}

	applicationCache.ondownloading = function(){ 
		console.debug("Começou o download os arquivos...");

	}

	applicationCache.onprogress = function(e){
	    console.debug(e, 'Baixados ' + e.loaded + ' de ' + e.total);
	}
	
	applicationCache.onupdateready = function(){
		console.debug("Encontrou alterações");
		applicationCache.swapCache();
		window.location.reload();
	}

	applicationCache.onnoupdate = function(){ 
		console.debug("Não tem alterações");
	}
	</script>
	<meta charset="UTF-8">
	<title>AppCache</title>
</head>
<body>
	<?php echo date("H:i:s"); ?>
</body>
</html>