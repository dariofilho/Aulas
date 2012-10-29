<?php

class Pessoa {
	public $nome;

	function cumprimentar() {

		if(func_num_args() == 0) {

			echo "Olá, meu amigo\n";
		
		} else if(func_num_args() == 1) {
			
			$this->cumprimentar1(func_get_arg(0));
		
		} else if(func_num_args() == 2) {
			
			$cumprimento = func_get_arg(0);
			$nome = func_get_arg(1);

			$this->cumprimentar2($cumprimento,$nome);
		
		}
	}

	function cumprimentar1($saudacao) {
		echo "$saudacao, meu amigo!\n";
	}

	function cumprimentar2($saudacao, $nome) {
		echo "$saudacao, $nome!\n";
	}
}

?>