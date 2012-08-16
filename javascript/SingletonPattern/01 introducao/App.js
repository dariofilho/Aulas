var App = App || {};

//Atributos do site
App._tituloDoSite = "Tutorial Singleton Pattern";

//Métodos de inicialização
App.inicializacao = function() {
	console.debug('Chamou App.inicializacao');
	App.Noticias.inicializacao();
	App.Contato.inicializacao();
	App.Twitter.inicializacao();
}

App.Noticias = {
	inicializacao: function() {
		console.debug('Chamou App.Noticias.inicializacao');
		//$("#Componente").newsWidget();
	}
}

App.Twitter = {
	inicializacao: function() {
		console.debug("Chamou App.Twitter.inicializacao");
	}
}

App.Contato = {
	inicializacao: function() {
		console.debug('Chamou App.Contato.inicializacao');
		$("#contatoForm")
			.on('submit', function(event){
				//alert('Formulario enviado');
				event.preventDefault();
			});

		this.Validacao.inicializacao();
	},

	Validacao: {
		inicializacao: function() {
			console.debug('Chamou App.Contato.Validacao.inicializacao');
			this.EnvioAssincrono.inicializacao();
		},

		EnvioAssincrono: {
			inicializacao: function() {
				console.debug('Chamou App.Contato.Validacao.EnvioAssincrono.inicializacao');
			},
		}
	}
}
//---Contato
