<?php
	include("Calculadora.class.php");
	include("CalculadoraCientifica.class.php");
	$calcCi = new CalculadoraCientifica();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php

		$calcCi->mostrarResultado();
		$calcCi->area(10, 20);
		$calcCi->mostrarResultado();
		$calcCi->somar(100);
		$calcCi->mostrarResultado();


	?>
</body>
</html>