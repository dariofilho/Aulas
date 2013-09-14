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
}

$meuCarro = new Automovel();
$seuCarro = new Automovel();

$meuCarro->marca = "BMW";
$meuCarro->modelo = "Z4";
$meuCarro->cor = "branco";


echo "Estou muito feliz, pois ganhei um $meuCarro->marca $meuCarro->modelo $meuCarro->cor em um sorteio";
?>