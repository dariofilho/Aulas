var APP = APP || {};

APP.log = function() {
	//console.debug(arguments)
}

APP.Usuario = {

	_iniciou: false,

	setUp: function() {
		var that = this;
		$(window).on('keyup', function(event) {
			if(event.which == 13) {
				that.sim();
			} else if(event.which == 27) {
				that.nao();
			} else if(event.which == 72) {
				that.homem();
			} else if(event.which == 77) {
				that.mulher();
			}
		});

		if(this._iniciou===false) $(document.body).removeClass('inicio');
		this._iniciou = true;
	},

	homem: function() {
		$(document.body).addClass('homem');
	},

	mulher: function() {
		$(document.body).removeClass('homem');
	},

	sim: function() {
		if(APP._modo == "camera") {
			APP.Camera.Foto.capturar();
		} else if(APP._modo == "avaliacao") {
			APP.Camera.Foto.Avaliacao.positiva();
		} else if(APP._modo == "enviando") {
			APP.Camera.Foto.Salvar.Requisicao.recomecar();
		}
	}, 

	nao: function() {
		if(APP._modo == "camera") {

		} else if(APP._modo == "avaliacao") {
			APP.Camera.Foto.Avaliacao.negativa();
		} else if(APP._modo == "enviando") {
			APP.Camera.Foto.Salvar.Requisicao.cancelar();
		}
	}
}