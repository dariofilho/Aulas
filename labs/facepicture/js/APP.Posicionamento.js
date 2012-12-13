var APP = APP || {};

APP.Posicionamento = {

	setUp: function() {

	},

	Centralizar: {
		
		_baseLargura: 640,
		_baseAltura: 480,

		_janelaLargura: 0,
		_janelaAltura: 0,
		
		_finalLargura: 0,
		_finalAltura: 0,

		_finalLargura1: 0,
		_finalAltura1: 0,
		
		_finalLargura2: 0,
		_finalAltura2: 0,

		setUp: function() {
			var that = this;

			$(window).on('resize', function() {
				that.calcular();
			});

			this.calcular();
		},

		alterarPropriedades: function() {
			$('.centralizar').css({
				marginLeft: (Math.ceil(this._finalLargura/2))*-1,
				marginTop: (Math.ceil(this._finalAltura/2))*-1,
				height: this._finalAltura,
				width: this._finalLargura
			})
		}

		medirJanela: function() {
			var janela = $(window);
			this._janelaLargura = janela.width();
			this._janelaAltura = janela.height();
		},

		calcular: function() {
			//Medir janela

			this.medirJanela();


		}
	}
}