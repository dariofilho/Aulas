<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<?php
	//Abertura

		/***
	     * Resumo de PHP
	     * Arquivo, dados, repetição
		 ***/


		$variavel = "Dado tipo String";

		//echo valor; 
		//Imprimindo conteúdo no documento html

		//As as aspas simples não permite a interpretação de variáveis
		echo 'Valor de $variavel: '.$variavel;
		
		//As as aspas duplas permitem a interpretação de variáveis
		echo nl2br("\nValor de $variavel: ".$variavel);

		echo nl2br("\n\n\n\n\n\n");
		//Array
		$frutas = array('Uva', 'Maçã', 'Goiaba');
		//Uva, maçã, goiaba

		$frutas[2] = "Manga";
		//Uva, maçã, manga

		$frutas[] = "Jaca";
		$frutas[] = "Laranja";
		$frutas[] = "Kiwi";
		//Uva, maçã, manga, jaca

		$frutas['tipo'] = 'Cítricas';

		//var_dump($frutas);
	
		//Reaproveitar o código e fazer um processamento de dados com a possibilidade de passar parâmetros ou não.
		function printer($parametro1) {
			echo "<br><pre>";
			print_r($parametro1);
			echo "</pre><br>";
		}
		printer($frutas);

		echo "Aniversário de Suzy!!";
		$lista = array('Inácio', 'Flávio', 'Ailton');

		printer($lista);

		for($i=0; $i<count($frutas); $i = $i+1) 
		{ 
			if(isset($frutas[$i])) {
				$fruta = $frutas[$i];
				echo $fruta."<br/>";
			} 
		}


		$carros = array();
		$carros['MVE0657'] = "Fit";
		$carros['KKK1986'] = "Civic";
		$carros['KHE6382'] = "Fox";

		echo "\n\n";
		foreach($carros as $placa => $carro) 
		{ echo "\nPlaca $placa: $carro"; }









	












	//Fechamento
	?>




</body>
</html>