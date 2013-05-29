<?php

//Programa 1 - Cálculo de IMC.

$joaoPeso 		= 80;
$joaoAltura 	= 1.70;
$joaoNome 		= "João da Silva";
$joaoIMC 		= round($joaoPeso/($joaoAltura*$joaoAltura),2);

$mariaPeso 		= 50;
$mariaAltura	= 1.60;
$mariaNome		= "Maria das Dores";	
$mariaIMC 		= round($mariaPeso/($mariaAltura*$mariaAltura),2);

$josePeso 		= 60;
$joseAltura		= 1.50;
$joseNome		= "José das Neves";
$joseIMC 		= round($josePeso/($joseAltura*$joseAltura),2);


echo "O IMC de $joaoNome é $joaoIMC. \n";
echo "O IMC de $mariaNome é $mariaIMC. \n";
echo "O IMC de $joseNome é $joseIMC. \n";

?>

<?php

//Programa 2 - Cálculo de IMC.

function calcularIMC($peso, $altura) {
	return $peso/($altura*$altura);
}

$joaoNome 		= "João da Silva";
$joaoIMC 		= round(calcularIMC(80, 1.70),2);

$mariaNome		= "Maria de Sá";
$mariaIMC 		= round(calcularIMC(50, 1.60),2);

$joseNome		= "José das Neves";
$joseIMC 		= round(calcularIMC(60, 1.50),2);


echo "O IMC de $joaoNome é $joaoIMC. \n";
echo "O IMC de $mariaNome é $mariaIMC. \n";
echo "O IMC de $joseNome é $joseIMC. \n";

?>

<?php
function calcularIMC($peso, $altura) {
	return round($peso/($altura*$altura),2);
}

$dados = array();
$dados[] = array(80, 1.70, "João da Silva");
$dados[] = array(50, 1.60, "Maria de Sá");
$dados[] = array(60, 1.50, "José das Neves");

for($i=0; $i<count($dados); $i++) {
	$nome 		= $dados[$i][2];
	$IMC 		= calcularIMC($dados[$i][0], $dados[$i][1]);

	echo "O IMC de $nome é $IMC. \n";
}
?>




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
	}

	function calcularIMC($peso, $altura) {
		return round($peso/($altura*$altura),2);
	}

	function calcularSituacao() {
		if($this->IMC < 18.5) {
			$this->situacao = "Abaixo do peso";
		} else if($this->IMC >= 18.5 && $this->IMC < 25) {
			$this->situacao = "Saudável";
		}
	}
}

$pessoas	= array();
$pessoas[]	= new Pessoa(80, 1.70, "João da Silva");
$pessoas[]	= new Pessoa(50, 1.60, "Maria de Sá");
$pessoas[]	= new Pessoa(60, 1.50, "José das Neves");


for($i=0; $i<count($pessoas); $i++) {
	$pessoa = $pessoas[$i];
	echo "O IMC de $pessoa->nome é $pessoa->IMC - $pessoa=>situacao. \n";
}
?>


