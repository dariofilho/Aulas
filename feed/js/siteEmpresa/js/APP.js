var APP = APP || {};

APP.executarSetUps = function() {
	APP.__setUp(APP);
};

//Procura e executa todos os métodos setUp que encontrar
APP.__setUp = function(Objeto) {
	if(typeof Objeto != "object") return false;
	
	//Recebe um objeto. Se tiver setUp, executa;
	if(typeof Objeto.setUp != "undefined" && typeof Objeto.setUp == "function") Objeto.setUp();
	
	//Verifica se existem objetos com setUp dentro
	for(Filho in Objeto) {
		/**
		 * Verifica se o elemento é diferente de null porque typeof null = object
		 * Verifica se o elemento é typeof == object
		 * Verifica se o object contém o atributo setUp e se setUp é typeof == function
		 */
		if(Objeto[Filho] !== null && typeof Objeto[Filho] == "object" && Objeto[Filho].setUp && typeof Objeto[Filho].setUp == "function") {
			var objetoFilho = Objeto[Filho];
			APP.__setUp(objetoFilho);
			objetoFilho._pai = Objeto;
		}
	}
	
	return false;
}


APP.setUp = function(Modulo){
	//Tuduo que precisa ser executado em todas as páginas
	$("#menu a, .linkLike").bind("mouseover mouseout", function(event) {
		if(event.type == "mouseover") {
			$(this).addClass('hover');
		} else if(event.type == "mouseout"){
			$(this).removeClass('hover');
		}
	});
}

APP.OnLine = {
	_status: true,
	setUp: function() {
		this.atualizar();
		$(window).bind("online offline",function() {
			APP.OnLine._status = window.navigator.onLine;
			APP.OnLine.atualizar();
		})
	},
	inverter: function() {
		this._status = !this._status;
		this.atualizar();
	},
	atualizar: function() {
		if(APP.OnLine._status) {
			console.debug('O APP está online');
		} else {
			console.debug('O APP está offline');
		}
	}
}

APP.Repositorio = {
	_dados: window.localStorage || {},
	
	adicionar: function(categoria, id, dados) {
		//this._dados[categoria] = this._dados[categoria] || {};
		var dbId = categoria+id;
		var dbDados = (typeof dados == "object") ? JSON.stringify(dados) : dados;
		this._dados[dbId] = dbDados;
	},
	
	carregar: function(categoria, id) {
		var dbId = categoria+id;
		
		if(this.existe(categoria, id)) {
			var dados = this._dados[dbId];
			var dbDados = null;
			try {
				dbDados = JSON.parse(dados);
			} catch(e) {
				dbDados = dados;
			}
			return dbDados;
		} else {
			return false;
		}
	}, 
	
	remover: function(categoria, id) {
		var dbId = categoria+id;
		this._dados.removeItem(dbId);
	},
	
	existe: function(categoria, id) {
		var dbId = categoria+id;
		return this._dados[dbId] ? true : false;
	}
	
};

APP.Componentes = {
	setUp: function() {},
	
	Abas: {
		setUp: function() {
			$("div.componente.abas")
				.each(function(indiceComponente, componente) {
					$("li.aba", componente)
						//1 - Adicionar o listener de click nas abas
						.bind('click',APP.Componentes.Abas.click)
						
						//Grava em cada aba a sua posição na lista
						.each(function(indice, aba){
							$(aba).data('indice', indice);
						});
				});
		},
		
		click: function(event) {
			//Processa a aba clica com jQuery - para utilizar o método a seguir
			var abaClicada = $(event.currentTarget)

			//Componente
			var componente = abaClicada.parents('.componente.abas');

			//Buscar todas as abas
			$("li.aba", componente)

				//E remover a classe ativa
				.removeClass("ativa");

			//Adiciona a classe ativa na aba clicada
			abaClicada.addClass('ativa');

			//Localiza todos os conteúdos
			var conteudos = $("div.conteudo", componente)

				//Esconder todos os conteudos
				.hide();

			//Detecta qual é a posição da aba clicada
			var indiceDoConteudo = abaClicada.data('indice');

			//Mostrar o conteúdo específico
			conteudos.eq(indiceDoConteudo).show()

		}
	}
};
