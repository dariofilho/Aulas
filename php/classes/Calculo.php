<?php
Class Automovel {
	 public $marca;
	 public $modelo;
	 public $cor;

	 function mover() {
	 	//Procedimentos de movimento aqui
	 }
	 function parar() {
	 	//Procedimentos de parada aqui
	 }
	 function buzinar() {
	 	//Procedimentos de buzina aqui
	 }

	 function ligarSeta($lado) {
	 	if($lado == "esquerda") {
	 		//Procedimentos para ligar seta do lado esquerdo aqui.
	 	} else if($lado == "direita") {
	 		//Procedimentos para ligar seta do lado direito aqui.
	 	}
	 }

	 function ligarAlerta() {
	 	$this->ligarSeta("esquerda");
	 	$this->ligarSeta("direita");
	 }

	 function desligarSetas() {
	 	//Procedimento para desligar as setas aqui.
	 }
}
?>