var HTML5 = HTML5 || {};

HTML5.Geolocation = {
	_disponivel: false,
	_latitude: null,
	_longitude: null,
	
	setUp: function() {
		this._disponivel = (navigator.geolocation) ? true : false;
		this.atualizar();
	},
	
	atualizar: function() {
		navigator.geolocation.getCurrentPosition(this.atualizou, this.naoAtualizou);
	},
	
	atualizou: function(resultado) {
		HTML5.Geolocation._latitude = resultado.coords.latitude;
		HTML5.Geolocation._longitude = resultado.coords.longitude;
	}
};