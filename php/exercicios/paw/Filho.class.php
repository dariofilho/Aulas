<?php

class Filho extends Pai {

	function __construct() {
		echo "Nasceu um filho\n";
		parent::__construct();
		echo "Método construtor de Filho executado.\n";
	}

	function brincar() {
		echo "Brincar jogando video game.\n";
	}

	function brincarComoPai() {
		parent::brincar();
	}

	function dizerNome() {
		Avo::dizerNome();
	}

}

?>