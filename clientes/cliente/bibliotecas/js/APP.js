//Singleton
var APP = APP || {};

//Método setUp
APP.setUp = function() {
	console.debug("APP.setUp");
}

//Executar TODOS os setUps dos módulos
APP.executarSetUps = function() {
	this.__setUp(APP);
}

APP.__setUp = function(Objeto) {
	var Modulo;
	//Executa o setUp do Objeto, se existir
	if(Objeto.hasOwnProperty('setUp') && typeof Objeto.setUp == "function") {
		Objeto.setUp();
	}
	
	//Procura por mais objetos, que possam ter setUp
	for(Modulo in Objeto) {
		if(Objeto.hasOwnProperty(Modulo)) {
			if(typeof Objeto[Modulo] == "object") {
				if(Objeto[Modulo] !== null) {
					//Objeto[Modulo]['_pai'] = "Referencia do Pai";
					Objeto[Modulo]['pai'] = function() {
						return Objeto;
					}
					this.__setUp(Objeto[Modulo]);
				}
			}
		}
	}
}

APP.Util = {
	String: {
		reverter: function(texto) {
			return texto.split("").reverse().join("");
		}
	}
}