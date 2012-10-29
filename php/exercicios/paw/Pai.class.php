<?php

class Pai extends Avo {
	function __construct() {
		parent::__construct();
		echo "Método construtor de Pai executado.\n";
	}

	function brincar() {
		echo "Brincar jogando pião.\n";
	}

	function brincarComoAvo() {
		parent::brincar();
	}
}

?>