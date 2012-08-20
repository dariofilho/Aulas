<?php
	
	header("Content-type: text/plain; charset=utf-8");

	$arrayDeMarcas = array('Oakley','Osklen','Burberry');
	$arrayDeMarcas[] = "Apple";
	$arrayDeMarcas[] = "Nike";
	$arrayDeMarcas[] = "Mizzuno";
	$arrayDeMarcas[] = "CK";
	$arrayDeMarcas[] = "BMW";
	$arrayDeMarcas[] = "Porsche";
	$arrayDeMarcas[] = "D&G";

	print_r($arrayDeMarcas);

	$stringDeMarcas = implode(' e ', $arrayDeMarcas);

	echo "Mandu só usa ".$stringDeMarcas;

?>