var App = App || {};
	//Atenção para SubMódulos
	App.Contato = App.Contato || {};

App.Contato.Validacao = {
	inicializacao: function() {
		console.debug('Chamou App.Contato.Validacao.inicializacao');
		this.EnvioAssincrono.inicializacao();

	},

	EnvioAssincrono: {
		inicializacao: function() {
			console.debug('Chamou App.Contato.Validacao.EnvioAssincrono.inicializacao');
		}
	}
}