<?php
class Matematica {
	//public static $pi = 3.14;

	public function multiplicacao($a, $b) {
		return $a*$b;
	}
	public static function quadrado($a) {
		return self::multiplicacao($a, $a);
	}
	public function divisao($a, $b) {
		return $a/$b;
	}
	public function soma($a, $b) {
		return $a+$b;
	}
	public function subtracao($a, $b) {
		return $a-$b;
	}
}


//echo Matematica::$pi; //3.14
echo Matematica::quadrado(2); //3.14

$mat = new Matematica();
//echo $mat->pi; //Erro!
echo $mat->quadrado(2);



class Automovel {
	private $chassi;	
}

class Carro extends Automovel {
	public function setChassi($numero) {
		$this->chassi = $numero;
	}
	public function getChassi() {
		echo "Chassi do meu carro: ".$this->chassi;
	}
}


$meuCarro = new Carro();
$meuCarro->setChassi(1234567890);
$meuCarro->getChassi(); //1234567890
$meuCarro->chassi; //Erro!



class ClasseA {
	private function metodoPrivado() {
		echo "metodoPrivado executado";
	}

	public function interfaceMetodoPrivado() {
		$this->metodoPrivado();
	}
}

class ClasseB extends ClasseA {
	public function executarMetodoPrivado1() {
		$this->metodoPrivado();
	}
	public function executarMetodoPrivado2() {
		parent::metodoPrivado();
	}
	public function executarMetodoPrivado3() {
		$this->interfaceMetodoPrivado();
	}
}
/*
$a = new ClasseA();
$a->metodoPrivado(); //Erro!
$a->interfaceMetodoPrivado(); //Ok

$b = new ClasseB();
$b->executarMetodoPrivado1(); //Erro!
$b->executarMetodoPrivado2(); //Erro!
$b->executarMetodoPrivado3(); //OK
*/


class Pessoa {
	public $nome;

	public function __construct($nome) {
		$this->nome = $nome;

		echo $this->nome." nasceu!";
		$this->abrirOlhos();
		$this->chorar();
	}


	public function abrirOlhos() {
		echo $this->nome." abriu os olhos.";
	}

	public function chorar() {
		echo "Buaaa!";
	}

	public function fecharOlhos() {
		echo $this->nome. " fechou os olhos.";
	}

	public function __destruct() {
		echo $this->fecharOlhos();
		echo $this->nome ." se foi.";
	}
}

$eu = new Pessoa("Dennis");
$voce = new Pessoa("João");

?>