<?php

//Ajuda a exibir o resultado como texto e não como HTML
header("Content-type: text/plain; charset=utf-8");

class Cliente {
	public $nome;

	public function __construct($nome) {
		$this->nome = $nome;
	}
}

class Produto {
	public $nome;
	public $preco;

	public function __construct($nome, $preco) {
		$this->nome = $nome;
		$this->preco = $preco;
	}
}


class Pedido {
	public $numero;
	public $cliente;
	public $produtos;

	public function __construct($numero, $cliente){
		$this->numero = $numero;
		$this->cliente = $cliente;
		$this->produtos = array();
	}

	public function incluirProduto($produto) {
		array_push($this->produtos, $produto);
	}
}



$produto1 = new Produto("Console de video game", 300);
$produto2 = new Produto("TV LCD 42", 2000);
$produto3 = new Produto("Celular", 600);

$cliente = new Cliente("João da Silva");
$pedido = new Pedido(12345,$cliente);

$pedido->incluirProduto($produto1);
$pedido->incluirProduto($produto2);
$pedido->incluirProduto($produto3);


print_r($pedido);

/* Será exibido na tela:
Pedido Object
(
    [numero] => 12345
    [cliente] => Cliente Object
        (
            [nome] => João da Silva
        )

    [produtos] => Array
        (
            [0] => Produto Object
                (
                    [nome] => Console de video game
                    [preco] => 300
                )

            [1] => Produto Object
                (
                    [nome] => TV LCD 42
                    [preco] => 2000
                )

            [2] => Produto Object
                (
                    [nome] => Celular
                    [preco] => 600
                )

        )

)
*/


class Olho {
	public $cor;
	public $lado;

	public function __construct($cor, $lado){
		$this->cor = $cor;
		$this->lado = $lado;
	}
}

class Pessoa {
	public $olhos;
	public $nome;

	public function __construct($nome, $corDosOlhos) {
		$this->olhos = array();
		$this->nome = $nome;

		$this->criarOlho($corDosOlhos, "direito");
		$this->criarOlho($corDosOlhos, "esquerdo");
	}

	public function criarOlho($cor, $lado) {
		//Criando o objeto olho
		$olho = new Olho($cor, $lado);

		//Adicionando na lista de olhos
		array_push($this->olhos, $olho);
	}
}

$novaPessoa = new Pessoa("Enilza Calazans", "Castanho");
print_r($novaPessoa);
?>