<?php
	class Carro extends Automovel {
		function __construct() {
			parent::__construct();
			$this->lugares = 5;
		}
	}
?>