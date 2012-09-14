<?php 

	header("Content-type: text/plain; charset=utf-8");

	include("inc.functions.php");

	print_r(gerarObjetoDeIMC(80, 1.80));
	print_r(gerarObjetoDeIMC(60, 1.80));
	print_r(gerarObjetoDeIMC(120, 1.60));

?>