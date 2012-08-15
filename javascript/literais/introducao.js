var objetoLiteral = {};
	objetoLiteral.cor = "vermelho";

var objeto = new Object();
	objeto.cor = "vermelho";

//------------------------------------------------------

var objetoLiteralCarro = {
	cor: "branco",
	ano: 2012
}
var objetoLiteralCarro2 = {
	cor: "azul",
	ano: 2011
}

function Carro(cor, ano) {
	this.cor = cor;
	this.ano = ano;
}
var objetoCarro = new Carro("branco", 2012);
var objetoCarro2 = new Carro("azul", 2011);

//-------

var Conteudo = {
	conteudos: ['Conteudo 1', 'Conteudo 2', 'Conteudo 3'],
	mostrar: function() {},
	esconder: function() {},
	alterar: function() {}
}

var conteudos = ['Conteudo 1', 'Conteudo 2', 'Conteudo 3'];
function mostrarConteudo() {}
function esconderConteudo() {}
function alterarConteudo() {}

function Pessoa(propriedades) {
	for(propriedade in propriedades) {
		this[propriedade] = propriedades[propriedade];
	}
}
//--------------------------------
var propriedadesDaPessoa = {
	nome: 'João'
}
var novaPessoa = new Pessoa();



function ClassePessoa() {
	this.nome = "";
	this.idade = 0;
}
var Pessoa = Pessoa || new ClassePessoa();

var Carro = Carro || {};
Carro.cor = "Vermelho";


