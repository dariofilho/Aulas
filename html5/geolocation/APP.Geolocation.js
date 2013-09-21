var APP = APP || {};
APP.Geolocation = {
	setUp: function() {
		//Pede a localização do usuário
		this.localizar();

		//Adicionar o Watch
		navigator.geolocation
			.watchPosition(this.localizou, this.naoLocalizou);
	},

	localizar: function() {
		navigator.geolocation
			.getCurrentPosition(this.localizou, this.naoLocalizou);
	},

	localizou: function(resposta) {
		var coords = resposta.coords;

		var lat = coords.latitude;
		var lang = coords.longitude;

		APP.Lista.adicionarPosicao(lat, lang);
	},

	naoLocalizou: function(resposta) {
		console.debug('Não foi possível capturar a localização do usuário');
	}
}