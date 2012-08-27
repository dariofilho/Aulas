<?php

	//1 - Criar um array de meses a partir de uma string
	//2 - Criar uma função que recebe um numero e retorna o nome do mês
	//3 - Criar um elemento select com os meses do ano com auxilio da função

	$mesesDoAnoString = "Janeiro Fevereiro Março Abril Maio Junho Julho Agosto Setembro Outubro Novembro Dezembro";

	$mesesDoAnoArray = explode(" ", $mesesDoAnoString);

	function mes($numero) {
		global $mesesDoAnoArray;
		return $mesesDoAnoArray[--$numero];
	}
?>