<?php

class Pessoa {
	public $nome;
	public $sexo;
	public $rg;
	public $endereco;

	public __construct($nome, $sexo, $rg, $endereco) {
		$this->nome = $nome;
		$this->sexo = $sexo;
		$this->rg = $rg;
		$this->endereco = $endereco;
	}
}

class Funcionario extends Pessoa {
	public $matricula; 
}

class Cliente extends Pessoa {
	public $ultimaCompra; 
}




?>