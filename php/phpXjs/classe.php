<?php
/** 
 * Pessoa
 * - Nome
 * - Idade
 * - Cumprimentar
 * - Andar
 */

class Pessoa {
	public $nome;
	private $idade;

	function __construct($nome = "Anônimo") {
		$this->nome = $nome;
	}

	function __construct($nome = "Anônimo", $idade = 0) {
		$this->nome = $nome;

		$this->idade = $idade;
	}

	function getNome() {
		return $this->nome;
	}

	function setNome($nome) {
		if($nome != "") {
			$this->nome = $nome;
		}
	}

	function cumprimentar($interlocutor) {
		return "\nOlá, $interlocutor\n";
	}

	function andar() {
		echo "\nAndando...\n";
	}
}

header("Content-type: text/plain; charset=utf-8");

//Primeiro cria o objeto
$novaPessoa = new Pessoa();

//Acesso as propriedades disponíveis

echo "O nome da nova pessoa é: ".$novaPessoa->nome;

$novaPessoa->andar();

$cumprimentoDaNovaPessoa = $novaPessoa->cumprimentar("João");
echo $cumprimentoDaNovaPessoa;

$pessoaEspecial = new Pessoa("José");
echo "\n\n";

print_r($novaPessoa); 

echo "\n\n";

print_r($pessoaEspecial); 

?>