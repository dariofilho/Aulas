<?php
	class Automovel {
		
		//Características
		public $cor;
		public $anoFabricacao;
		public $anoModelo;
		public $modelo;
		public $registro;
		public $lugares;
		public $tipoCombustivel;
		public $potencia;
		public $kmLitro;

		//Estados
		public $ligado;
		public $nivelCombustivel;

		function __construct() {
			$this->ligado = FALSE;
		}


		public function ligar() {
			$this->ligado = TRUE;
		}

		public function desligar() {
			$this->ligado = FALSE;
		}

		function movimentar($distancia) {
			$this->consumir($distancia);
		}

		function consumir($distancia) {
			$this->nivelCombustivel = $this->nivelCombustivel- ($distancia/$this->kmLitro);
		}
	}
?>