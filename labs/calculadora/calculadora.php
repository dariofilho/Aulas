<?php
header("Content-type: text/plain; charset=utf-8");

interface iCalculadora {
	public function somar($valor);
	public function subtrair($valor);
	public function multiplicar($valor);
	public function dividir($valor);
	public function resultado();
}

class Calculadora implements iCalculadora {
	public function __construct() {
		echo "------------\n";
		$this->resto = 0;
		$this->resultado();
	}

	public function resultado() {
		echo $this->resto."\n";
	}

	public function somar($valor) {
		$this->resto += $valor;
		$this->resultado();
	}
	public function subtrair($valor) {
		$this->resto -= $valor;
		$this->resultado();
	}
	public function multiplicar($valor) {
		$this->resto *= $valor;
		$this->resultado();
	}
	public function dividir($valor) {
		$this->resto /= $valor;
		$this->resultado();
	}
}

class SmartCalculadora extends Calculadora {
	
	public function somar($valor) {
		if(func_num_args() == 1) {
			parent::somar($valor);
		} else if(func_num_args() == 2) {
			$valorB = func_get_arg(1);
			$this->somar2($valor, $valorB);
		}
	}
	
	public function somar2($valorA, $valorB) {
		$this->resto = $valorA + $valorB;
		$this->resultado();
	}

	public function subtrair($valor) {
		if(func_num_args() == 1) {
			parent::subtrair($valor);
		} else if(func_num_args() == 2) {
			$valorB = func_get_arg(1);
			$this->subtrair2($valor, $valorB);
		}
	}
	public function subtrair2($valorA, $valorB) {
		$this->resto = $valorA - $valorB;
		$this->resultado();
	}

	public function multiplicar($valor) {
		if(func_num_args() == 1) {
			parent::multiplicar($valor);
		} else if(func_num_args() == 2) {
			$valorB = func_get_arg(1);
			$this->multiplicar2($valor, $valorB);
		}
	}
	public function multiplicar2($valorA, $valorB) {
		$this->resto = $valorA * $valorB;
		$this->resultado();
	}

	public function dividir($valor) {
		if(func_num_args() == 1) {
			parent::dividir($valor);
		} else if(func_num_args() == 2) {
			$valorB = func_get_arg(1);
			$this->dividir2($valor, $valorB);
		}
	}
	public function dividir2($valorA, $valorB) {
		$this->resto = $valorA / $valorB;
		$this->resultado();
	}
}

$calculadora = new Calculadora();
$calculadora->somar(3);
$calculadora->multiplicar(10);
$calculadora->subtrair(12);
$calculadora->dividir(3);

$SmartCalculadora = new SmartCalculadora();
$SmartCalculadora->somar(5,5);
$SmartCalculadora->multiplicar(10,10);
$SmartCalculadora->subtrair(1100,100);
$SmartCalculadora->dividir(100000,10);

?>