<?php
header("Content-type: text/plain; charset=utf-8");
class Ingrediente {
	public $nome;
	public $quantidade;

	public function __construct($nome, $quantidade) {
		$this->nome = $nome;
		$this->quantidade = $quantidade;
	}
}
class Receita {
	public $ingredientes = array();
	public $modoDePreparo = array();

	function adicionarIngrediente($ingrediente, $quantidade) {
		$this->ingredientes[] = new Ingrediente($ingrediente, $quantidade);
	}
	function adicionarInstrucao($instrucao) {
		$this->modoDePreparo[] = $instrucao;
	}
}

class ReceitaDobrada extends Receita {
	function adicionarIngrediente($ingrediente, $quantidade) {
		parent::adicionarIngrediente($ingrediente, $quantidade);
		parent::adicionarIngrediente($ingrediente, $quantidade);
	}
}

$rd = new ReceitaDobrada();
$rd->adicionarIngrediente('Trigo', '300g');
print_r($rd);

$testeReceita = new Receita();

$testeReceita->adicionarIngrediente('Trigo', '3 xícaras');
$testeReceita->adicionarIngrediente('Manteiga', '200g');
$testeReceita->adicionarIngrediente('Açúcar', '1 xícara');


$testeReceita->adicionarInstrucao('Misturar o trigo com a manteiga');
$testeReceita->adicionarInstrucao('Adiciona o açúcar');
$testeReceita->adicionarInstrucao('Levar ao forno por 15 minutos');


print_r($testeReceita);	

class Cobertura extends Receita {
	public $textura;
	public $rigidez;
	public $cor;
}
class Bolo extends Receita {
	public $cobertura;
	public $formato;
}


$cobertura = new Cobertura();
$cobertura->textura = "Granulado";
$cobertura->rigidez = "Cremoso";
$cobertura->cor = "Bem escura";
$cobertura->adicionarIngrediente('Leite condensado', '1 lata');
$cobertura->adicionarIngrediente('Chocolate em pó', '3 colheres');
$cobertura->adicionarIngrediente('Manteiga', '1 colher');

$cobertura->adicionarInstrucao('Mistura tudo em banho maria');

$bolo = new Bolo();
$bolo->cobertura = $cobertura;
$bolo->adicionarIngrediente('Trigo com fermento', '500g');
$bolo->adicionarIngrediente('Açúcar', '300g');
$bolo->adicionarIngrediente('Ovo','6 unidades');
$bolo->adicionarIngrediente('Leite', '1 xícara');

$bolo->adicionarInstrucao('Mistura tudo');
$bolo->adicionarInstrucao('Leva ao forno');
$bolo->formato = "Circular";

print_r($bolo);

?>





