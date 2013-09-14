<?php
//Ajuda a exibir o resultado como texto e não como HTML
header("Content-type: text/plain; charset=utf-8");

class Pessoa {

	public $nome;

	public function __construct($nome) {
		$this->nome = $nome;
	}

	public function apresentar() {
		echo "Olá, eu me chamo ".$this->nome."! E você?";
	}
}


class Cantora extends Pessoa {
	public function apresentar() {
		echo "\nOlá, meus fãs! ".$this->nome." chegou! Vocês estão animados?";
	}
}


class Apresentacao {
	public function apresentar(Pessoa $pessoa) {
		$pessoa->apresentar();
	}
}

$joaoDaSilva = new Pessoa("João da Silva");
$iveteSangalo = new Cantora("Ivete Sangalo");

$novaApresentacao = new Apresentacao();
$novaApresentacao->apresentar($joaoDaSilva);
$novaApresentacao->apresentar($iveteSangalo);

?>


<?php

//Ajuda a exibir o resultado como texto e não como HTML
header("Content-type: text/plain; charset=utf-8");

class Carro {
	public function ligar() {
		echo "Caror ligado"; 
	}
}

class CarroConversivel extends Carro {
	public function ligar() {
		parent::ligar();
		echo "Carro chique conversível ligado. Gostou?";
	}
}

?>