<?php
//Ajuda a exibir o resultado como texto, e não como HTML
header("Content-type: text/plain; charset=utf-8");

class MinhaClasse {
	public $resultado;
	
	//Método a ser trabalhado
	public function metodo() {

		//Verifica a quantidade de parâmetros passados
		$quantidadeDeParametros = func_num_args();

		//Nenhum parâmetro informado
		if($quantidadeDeParametros == 0) {
			$this->metodo0();
		}

		//Com apenas 1 (um) parâmetro informado
		if($quantidadeDeParametros == 1) {
			$parametro0 = func_get_arg(0);
			$this->metodo1($parametro0);
		}

		//Com 2 (dois) parâmetros informados
		if($quantidadeDeParametros == 2) {
			$parametro0 = func_get_arg(0);
			$parametro1 = func_get_arg(1);
			$this->metodo2($parametro0, $parametro1);
		}
	}

	public function metodo0() {
		echo "\nExecutando metodo() sem parâmetros";
	}
	public function metodo1($parametro0) {
		echo "\nExecutando metodo() com o parâmetro $parametro0";
	}
	public function metodo2($parametro0, $parametro1) {
		echo "\nExecutando metodo() com os parâmetros $parametro0 e $parametro1";
	}
}

$minhaClasse = new MinhaClasse();
$minhaClasse->metodo();
$minhaClasse->metodo("Param A");
$minhaClasse->metodo("Param 1", "Param 2");
?>
