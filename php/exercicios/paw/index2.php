<?php
	header("Content-type: text/plain;charset=utf-8");


	include("Pessoa.class.php");
	include("Avo.class.php");
	include("Pai.class.php");
	include("Filho.class.php");

	$filho = new Filho();
	$filho->nome = "Douglas Coxinha";
	$filho->brincar();
	$filho->brincarComoPai();
	$filho->brincarComoAvo();
	$filho->dizerNome();
	$filho->cumprimentar("Bom dia", "Gustavo");





?>