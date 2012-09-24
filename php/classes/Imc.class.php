<?php

header("Content-type: text/plain; charset=utf-8");

class Imc {
	//Definição dos atributos com os modificadores de acesso
	private $peso;
	public $altura;
	public $imc;
	public $grupo;

	public function __construct($pesoInformado, $alturaInformada) {
		$this->peso = $pesoInformado;
		$this->altura = $alturaInformada;
		$this->calcular();
	}

	public function calcular() {
		$this->imc = $this->peso / ($this->altura * $this->altura);
	}

	public function getPeso() {
		return $this->peso;
	}
	public function setPeso($peso) {
		if(is_float($peso)) {
			$this->peso = $peso;
			$this->calcular();
		}
	}
}
$objetoDeImc = new Imc(80.0,1.80);
print_r($objetoDeImc);

$objetoDeImc->setPeso("João");
echo $objetoDeImc->getPeso();

print_r($objetoDeImc);


//Executando métodos do objeto
//print_r($objetoDeImc);

//Acessando atributos do objeto
//echo $objetoDeImc->imc;
?>





