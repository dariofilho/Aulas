<?php
	header("Content-type: text/plain;charset=utf-8");


	include("Automovel.class.php");
	include("Carro.class.php");

	$car = new Carro();

	var_dump($car);

?>