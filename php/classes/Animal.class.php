<?php

abstract class Animal {
	public $nome;
	public $idade;

	public function __construct($nome,$idade) {
		$this->nome = $nome;
		$this->idade = $idade;
	}

	abstract public function comunicar();
}


class Cachorro extends Animal {
	public function comunicar() {
		echo "Au au!";
	}
}

class Gato extends Animal {
	public function comunicar() {
		echo "Miau!";
	}
}

$meuCachorro = new Cachorro("Totó", 1);
$meuGato = new Gato("Mingau", 2);


$meuCachorro->comunicar();
$meuGato->comunicar();

?>




