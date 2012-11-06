<?php

class Calculadora {

	//Atributo
	public $resultado;

	//Método construtor
	function __construct() {
		$this->resultado = 0;	
	} 

	//Método
	function somar($valorA) {
		$this->resultado += $valorA;
	}

	function subtrair($valorA) {
		$this->resultado -= $valorA;
	}

	function multiplicar($valorA) {
		$this->resultado *= $valorA;
	}

	function dividir($valorA) {
		$this->resultado /= $valorA;
	}

	function mostrarResultado() {
		echo $this->resultado . "<br />";
	}
}

?>