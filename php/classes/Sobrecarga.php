<?php
//Ajuda a exibir o resultado como texto, e não como HTML
header("Content-type: text/plain; charset=utf-8");

class Calculadora {
	public $resultado;
	
	/***
	 * Dentro do construtor faremos uma verificação 
	 * da quantidade de parâmetros recebidos
	 * */
	public function __construct() {

		//Caso o construtor não receba nenhum parâmetro
		if(func_num_args() == 0) {
			
			//O método construtorZerada será executado 
			$this->construtorZerada();
		
		} 

		//Caso o construtor receba 1 (um) parâmetro
		else if(func_num_args() == 1) {
			
			//O parâmetro é capturado
			$valorInicial = func_get_arg(0);

			//E o método construtorValorInicial será executado
			$this->construtorValorInicial($valorInicial);
		}


	}

	public function construtorZerada() {
		$this->resultado = 0;
		echo "\n". $this->resultado;
	}

	public function construtorValorInicial($valorInicial) {
		$this->resultado = $valorInicial;
		echo "\n". $this->resultado;
	}

	public function soma() {
		if(func_num_args() == 1) {
			$valor = func_get_arg(0);
			$this->adicionarAoResultado($valor);
		} else if(func_num_args() == 2) {
			$valor0 = func_get_arg(0);
			$valor1 = func_get_arg(1);
			$this->somarDoisValores($valor0, $valor1);
		}
	}

	public function adicionarAoResultado($valor) {
		$this->resultado = $this->resultado + $valor;
		echo "\n".$this->resultado;
	}

	public function somarDoisValores($valor1, $valor2) {
		echo "\n".($valor1 + $valor2);
	}
}


$minhaCalculdadora = new Calculadora();
//0
$minhaCalculdadora->soma(5);
//5
$minhaCalculdadora->soma(3,3);
//6
$minhaCalculdadora->soma(5);
//10

$novaCalculadora = new Calculadora(100);
//100
$novaCalculadora->soma(5);
//105
$novaCalculadora->soma(3,3);
//6
$novaCalculadora->soma(5);
//110

?>
