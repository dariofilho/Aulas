<?php
class Calculadora {
	public function soma($valor1, $valor2) {
		return $valor1 + $valor2;
	}
}

$minhaCalculadora = new Calculadora();
echo $minhaCalculadora->soma(200,"20"); //220         
?>
