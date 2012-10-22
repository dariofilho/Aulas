/** 
 * Pessoa
 * - Nome
 * - Idade
 * - Cumprimentar
 * - Andar
 */

function Pessoa(nome) {
	this.nome = nome;
	var idade;

	this.getIdade = function() {
		return idade;
	}

	this.setIdade = function(idadeRecebida) {
			idade = idadeRecebida;
	}

	this.getNome = function() {
		return this.nome;
	}

	this.setNome = function(nome) {
		if(nome != "") {
			this.nome = nome;
		}
	}

	this.cumprimentar = function(interlocutor) {
		return "Olá, "+interlocutor;
	}

	this.andar = function() {
		return 'Andando...';
	}
}