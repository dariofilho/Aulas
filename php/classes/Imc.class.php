<?php

header("Content-type: text/plain; charset=utf-8");

class Imc {
	public $peso;
	public $altura;
	public $imc;
	public $grupo;

	public function __construct($peso, $altura) {
		$this->peso = $peso;
		$this->altura = $altura;
	}
}

$objetoDeImc = new Imc(80,1.80);
print_r($objetoDeImc);
?>