<?php

class Avo extends Pessoa {


	function __construct() {
		echo "Método construtor de Avô executado.\n";
	}


	function brincar() {
		echo "Brincar jogando bola.\n";
	}

	function dizerNome() {
		echo "Bom dia! Meu nome é, ".$this->nome."\n";
	}


}

?>