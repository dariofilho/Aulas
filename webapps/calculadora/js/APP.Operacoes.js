//Vamos usar o APP existente. Caso não exista, criamos um objeto.
var APP = APP || {};

//Agora, vamos criar um módulo do nosso aplicativo
APP.Operacoes = {
	soma: function(a, b) {
		return a + b;
	},

	subtracao: function(a, b) {
		return a - b;
	},

	multiplicacao: function(a, b) {
		return a * b;
	},

	divisao: function(a, b) {
		if(a===0 || b===0) {
			return 0;
		}
		return a / b;
	}
}
