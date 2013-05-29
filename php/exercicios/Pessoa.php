<?php 

class Pessoa {
	public $nome;
	public $peso;
	public $altura;
	public $IMC;
	public $situacao;

	function __construct($peso, $altura, $nome) {
		$this->peso		= $peso;
		$this->altura	= $altura;
		$this->nome		= $nome;
		$this->IMC 		= $this->calcularIMC($peso, $altura);
		
		$this->situacao = $this->calcularSituacao($this->IMC);
	}

	function calcularIMC($peso, $altura) {
		return round($peso/($altura*$altura),2);
	}

	function calcularSituacao($IMC) {
		if($IMC < 18.6) {
			return "Abaixo do peso";
		} else if($IMC >= 18.6 	&& $IMC < 25) {
			return "Saudável";
		} else if($IMC >= 25 	&& $IMC < 30) {
			return "Sobrepeso";
		} else if($IMC >= 30 	&& $IMC < 35) {
			return "Obesidade Grau I";
		} else if($IMC >= 35 	&& $IMC < 40) {
			return "Obesidade Grau II";
		} else if($IMC >= 40) {
			return "Obesidade Grau III";
		}
	}
}

$pessoas	= array();
$pessoas[]	= new Pessoa(60, 1.80, "João da Silva");
$pessoas[]	= new Pessoa(50, 1.60, "Maria de Sá");
$pessoas[]	= new Pessoa(60, 1.50, "José das Neves");


for($i=0; $i<count($pessoas); $i++) {
	$pessoa = $pessoas[$i];
	echo "O IMC de $pessoa->nome é $pessoa->IMC - $pessoa->situacao. \n";
}
?>