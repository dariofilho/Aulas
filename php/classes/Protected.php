<?php
//Ajuda a exibir o resultado como texto e não como HTML
header("Content-type: text/plain; charset=utf-8");

class ClassePai {
	protected $atributoProtegido = "Atributo protegido da ClassePai.\n";
	private $atributoPrivado = "Atributo privado da ClassePai.\n";

	protected function acessoProtegidoParaAtributoPrivado() {
		echo $this->atributoPrivado;
	}
}


class ClasseFilho extends ClassePai {
	public function acessoPublicoParaAtributoProtegido() {
		echo $this->atributoProtegido;
	}

	public function acessoPublicoParaMetodoProtegido() {
		$this->acessoProtegidoParaAtributoPrivado();
	}
}

$filho = new ClasseFilho();

$filho->acessoPublicoParaAtributoProtegido(); 
//Retorna Atributo privado da ClassePai.

$filho->acessoPublicoParaMetodoProtegido(); 
//Retorna Atributo privado da ClassePai.

echo $filho->atributoProtegido; 
//Erro fatal. Não é possível acessar publicamente um atributo protegido.

$filho->acessoProtegidoParaAtributoPrivado(); 
//Erro fatal. Não é possível acessar publicamente um método protegido.
?>
