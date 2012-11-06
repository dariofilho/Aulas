<?php

	$resultado = 0;

	function somar($valorA) {
		global $resultado;

		$resultado += $valorA;
	}

	function subtrair($valorA) {
		global $resultado;

		$resultado -= $valorA;
	}

	function multiplicar($valorA) {
		global $resultado;

		$resultado *= $valorA;
	}

	function dividir($valorA) {
		global $resultado;

		$resultado /= $valorA;
	}

	function mostrarResultado() {
		global $resultado;
		echo $resultado."<br />";
	}



?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php

		mostrarResultado();
		somar(3);
		mostrarResultado();
		dividir(2);
		mostrarResultado();
		multiplicar(3);
		mostrarResultado();



	?>
</body>
</html>