var App = App || {};

//Atributos do site
App._tituloDoSite = "Tutorial Singleton Pattern";

//Métodos de inicialização
App.setUp = function() {}

App.executarSetUps = function (Modulo) {
	Modulo = Modulo || App;

	for(propriedade in Modulo) {
		//console.debug('Varreu:', propriedade);

		if(propriedade == 'setUp') {
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

App.Menu = {
	setUp: function() {
		this.iniciar();
	},

	iniciar: function() {
		$("nav#menu").on('click','a', function(event){
			event.preventDefault();
			var articleId = $(event.currentTarget).attr('href');
			$("section#paginas article")
				.hide()
				.filter(articleId)
				.show();
		})
	}
}