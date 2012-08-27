<?php
	$texto = "Meu texto";

	function calcularNota($nota1, $nota2, $nota3) {
		return ((($nota1+$nota2)/2)*1.2+$nota3)/3;
	}

	function soma($numero1, $numero2) {
		return $numero1 + $numero2;
	}

	$media1 = calcularNota(6,7,9);
	$media2 = calcularNota(8,7,10);
	$somaDeDoisMaisQuatro = soma(2,4);
?>