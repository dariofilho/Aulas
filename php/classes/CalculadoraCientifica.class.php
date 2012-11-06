<?php

class CalculadoraCientifica extends Calculadora {

	function area($base, $altura) {
		$this->resultado = $base;
		$this->multiplicar($altura);
	}
}

?>