<?php
//Ajuda a exibir o resultado como texto e não como HTML
header("Content-type: text/plain; charset=utf-8");

class Produto {
	public $nome;
	public $descricao;
	public $preco;
	public $tipo;

	public function __construct($nome, $descricao, $preco, $tipo) {
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->preco = $preco;
		$this->tipo = $tipo;
	}

	public function imprimir_caracteristicas() {
		echo "Nome: ".$this->nome;
		echo "\nTipo: ".$this->tipo;
		echo "\nDescrição: ".$this->descricao;
		echo "\nPreço: ".$this->preco;
	}
}

class DVD extends Produto {
	public $artista;
	public $genero;

	public function __construct($nome, $descricao, $preco, $artista, $genero) {
		parent::__construct($nome, $descricao, $preco, "DVD");
		$this->artista = $artista;
		$this->genero = $genero;
	}

	public function imprimir_caracteristicas() {
		parent::imprimir_caracteristicas();
		echo "\nArtista: ".$this->artista;
		echo "\nGênero: ".$this->genero;
	}
}

$meuDVD = new DVD("Chico e as Cidades", "Show As cidades", "R$42,90", "Chico Buarque", "MPB/Samba");
$meuDVD->imprimir_caracteristicas();

/* Será apresentado na tela:

Nome: Chico e as Cidades
Tipo: DVD
Descrição: Show As cidades
Preço: R$42,90
Artista: Chico Buarque
Gênero: MPB/Samba

 */

?>
