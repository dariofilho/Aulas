var APP = APP || {};
APP.Geo = {
	_latitude: "",
	_longitude: "",
	setUp: function() {
		if(navigator.geolocation) {
			navigator
				.geolocation
				.watchPosition(this.localizou, this.naoLocalizou, {
				  //timeout: 20000,
				  //maximumAge: 1000,
				  enableHighAccuracy: true
				});
		}
	},
	
	localizou: function(objeto) {
		
		if(this._latitude == objeto.coords.latitude && this._longitude == objeto.coords.longitude) return false;
		
		var tempo = new Date();
		this._latitude = objeto.coords.latitude;
		this._longitude = objeto.coords.longitude;
		
		APP.Geo.Mapa._minhaLatitudeLongitudeGoogle = new google.maps.LatLng(this._latitude,this._longitude);
		
		if(!APP.Geo.Mapa._meuMapa) APP.Geo.Mapa.criar();
		
		GEO.Mapa._meuMarcador.setVisible(false);
		GEO.Mapa.adicionarMeuMarcador();
		
		console.debug(tempo.getTime(), objeto.coords.latitude, objeto.coords.longitude);
		
		//$("<p>").text([tempo.getTime(), objeto.coords.latitude, objeto.coords.longitude].join(", ")).prependTo("#posicoes");
	},
	
	naoLocalizou: function() {
		console.debug('Não foi possível localizar o posicionamento do usuário no globo.');
	},
	
	Mapa: {
		_meuMapa: null,
		_zoom: 17,
		_minhaLatitudeLongitudeGoogle: null,
		_meuMarcador: null,
		criar: function() {
			
			//1 - Cria o mapa
			var opcoesGoogle = {
				//Nível de zoom
			    zoom: APP.Geo.Mapa._zoom,
			
				//Centro do mapa
			    center: APP.Geo.Mapa._minhaLatitudeLongitudeGoogle,
				
				//Controle de mudança de tipo de mapa
			    mapTypeControl: false,
				
				//Aparência dos controles de mapa
			    navigationControlOptions: {	
					style: google.maps.NavigationControlStyle.SMALL,
					position: google.maps.ControlPosition.LEFT
				},
				
				//Tipo do Mapa
			    mapTypeId: google.maps.MapTypeId.ROADMAP
			  };
			
			//2 - Determina onde o mapa será apresentado
			var elementoMapa = $("#meuMapa").get(0); //.get(0) para retornar o elemento DOM
		 	
			//3 - Mostra o mapa no elemento determinado
			APP.Geo.Mapa._meuMapa = new google.maps.Map(elementoMapa, opcoesGoogle);
			
			this.adicionarMeuMarcador();
		},
		
		adicionarMeuMarcador: function() {
			APP.Geo.Mapa._meuMarcador = new google.maps.Marker({
				animation: google.maps.Animation.BOUNCE,
				position: APP.Geo.Mapa._minhaLatitudeLongitudeGoogle, 
				map: APP.Geo.Mapa._meuMapa,
				title: "Meu Marcador"
			});
		}
	}
}