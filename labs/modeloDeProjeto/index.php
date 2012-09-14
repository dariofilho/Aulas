<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/reset.css">
</head>
<body>
	<?php if($_SERVER['SERVER_NAME']=="localhost" || $_SERVER['SERVER_NAME']=="aulas" ) { ?>
	<script src="library/js/head.min.js"></script>	
	<script>
		head.js("library/js/jquery-1.8.0.min.js", 
				"library/js/APP.js",
				"js/APP.Modulo.js",
				function() {
				  APP.iniciar();
				});
	</script>
	<?php } else { ?>
	<script src="APP.combined.js"></script>	
	<script>APP.iniciar();</script>
	<?php } ?>
</body>
</html>