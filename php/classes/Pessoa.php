<?php
//Ajuda a exibir o resultado como texto e não como HTML
header("Content-type: text/plain; charset=utf-8");

class Pessoa {
	public $nome;

	public function __construct($nome) {
		$this->nome = $nome;
	}
}

class Funcionario extends Pessoa {
	public $matricula; 

	public function __construct($nome, $matricula) {
		parent::__construct($nome);
		$this->matricula = $matricula;
	}
}

$novoFuncionario = new Funcionario("João da Silva","123456");

print_r($novoFuncionario);

/* É apresentado na tela o seguinte resultado:

Funcionario Object
(
    [matricula] => 123456
    [nome] => João da Silva
)
*/

class Cliente extends Pessoa {
	public $ultimaCompra; 

	public function __construct($nome, $ultimaCompra) {
		parent::__construct($nome);
		$this->ultimaCompra = $ultimaCompra;
	}
}

$novoCliente = new Cliente("Maria das Neves", "20/12/2012");

print_r($novoCliente);

/* É apresentado na tela o seguinte resultado:

Cliente Object
(
    [ultimaCompra] => 20/12/2012
    [nome] => Maria das Neves
)
*/

?>
