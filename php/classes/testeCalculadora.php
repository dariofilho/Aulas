<?php
	include("Calculadora.class.php");
	$calc = new Calculadora();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php

		$calc->mostrarResultado();
		$calc->somar(3);
		$calc->mostrarResultado();
		$calc->somar(5);
		$calc->mostrarResultado();
		$calc->subtrair(2);
		$calc->mostrarResultado();


	?>
</body>
</html>