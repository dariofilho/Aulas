var APP = APP || {};

APP.propriedade1 = "valor da propriedade 1";
APP.propriedade2 = "valor da propriedade 2";

//Módulo1 de APP é um Object
APP.Modulo1 = {
	
	//Propriedade 1 - Tipo String
	atributo1: "valor da propriedade 1",
	
	//Propriedade 2 - Tipo Object
	propriedadesPadraoParaChamadaAjax: {
		url: "",
		type: "GET"
	},
	
	//Propriedade 3 - Tipo Object - Módulo porque é uma parte do meu projeto
	Ajax: {
		carregar: function() {
			
		},
		carregando: function() {
			
		}
	}
	
	//Propriedade 2
	metodo1: function() {
		
	}
}
