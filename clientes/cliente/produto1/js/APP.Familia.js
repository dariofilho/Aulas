//INÍCIO de APP.Home
var APP = APP || {};
APP.Familia = {
	_nome: "Marista",
	setUp: function() {
		console.debug('Família '+this._nome);
	},
	
	Diretoria: {
		_diretores: ['Dennis', 'Pablo'],
		setUp: function() {
			console.debug("Diretores: "+this._diretores.join(" e "));
		}
	},
	
	Coordenadores: {
		_coordenadores: ['Brenda','Morgana'],
		setUp: function() {
			console.debug("Coordenadores: "+this._coordenadores.join(" e "));
		},
		Assistencia: {
			_assistentes: ['Ciclone', 'Adso'],
			setUp: function() {
				var textoAssistencia = this._assistentes.join(" e ");
					textoAssistencia += "são assistentes de ";
					textoAssistencia += this.pai()._coordenadores.join(" e ");
					
				console.debug(textoAssistencia);
			}
		}
	},
	
	Professores: {
		_professores: ['Klayton', 'Leo'],
		setUp: function() { 
		
		}
	}
};
//FIM de APP.Home
