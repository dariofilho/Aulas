<?php
	header("Content-type: text/plain; charset=utf-8");
	$url = "http://search.twitter.com/search.json?q=recife";
	$conteudo = file_get_contents($url);
	echo $conteudo;
	//print_r(json_decode($conteudo));
?>