var App = App || {};

//Atributos do site
App._tituloDoSite = "Tutorial Singleton Pattern";

//Métodos de inicialização
App.inicializacao = function() {
	console.debug('Chamou App.inicializacao');
	//App.Noticias.inicializacao();
	//App.Contato.inicializacao();
	//App.Twitter.inicializacao();
}

App.executarSetUps = function (Modulo) {
	var propriedade;
	Modulo = Modulo || App;

	for(propriedade in Modulo) {
		//console.debug('Varreu:', propriedade);

		if(propriedade == 'inicializacao') {
			if(typeof Modulo[propriedade] == 'function') {
				
				//BY denniscalazans.com
				//(Modulo[propriedade])();

				//BY KLAYTON
				Modulo[propriedade]();

				//By SERGIO
				//var funcaoDeInicializacao = Modulo[propriedade];
				 //funcaoDeInicializacao();
			}
		}

		if(typeof Modulo[propriedade] == 'object') {
			App.executarSetUps(Modulo[propriedade]);
		}
	}
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