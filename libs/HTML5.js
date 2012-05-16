var HTML5 = HTML5 || {};

HTML5 = {
	
	executarSetUps: function() {
		HTML5.__setUp(HTML5);
	},
	
	setUp: function() {
		
	},
	
	//Procura e executa todos os métodos setUp que encontrar
	__setUp: function(Objeto) {
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
				HTML5.__setUp(Objeto[Filho]);
				objetoFilho._pai = Objeto;
			}
		}
		
		return false;
	},
	
	/**
	 * Funções utilitárias
	 */
	Util: {
		
		//Retorna um objeto { largura: int, altura: int }
		telaCheiaProporcional: function(largura, altura) {
			
			var videoLargura	= largura;
			var videoAltura		= altura;

			var browserLargura 	= $(window).width();
			var browserAltura	= $(window).height();

			var proporcaoLargura = browserLargura / videoLargura;
			var proporcaoAltura  = browserAltura  / videoAltura;

			var diferencaLargura = proporcaoAltura * videoLargura;
			var diferencaAltura  = proporcaoLargura * videoAltura;

			var finalLargura = 0;
			var finalAltura	 = 0;

			if(diferencaAltura > browserAltura) {
				finalLargura = browserLargura;
				finalAltura  = diferencaAltura;
			} else {
				finalLargura = diferencaLargura;
				finalAltura  = browserAltura;	
			}
			
			return {
				largura: finalLargura,
				altura: finalAltura
			};
		}
	}
};