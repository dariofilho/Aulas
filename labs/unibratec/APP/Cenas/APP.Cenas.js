var APP = APP || {};
APP.Cenas = {
	_classeDeAtivacao: 'ativa',

	setUp: function() {
		var that = this;
		$('[data-cena]').on("click", function(event){
			var cena = $(event.currentTarget).attr('data-cena')

			if(cena === "proxima") {
				that.proxima();
			} else if(cena === "anterior") {
				that.anterior();
			} else {
				that.mostrar(cena);
			}
		});
	},

	aCadaCena: function() {

	},

	mostrar: function(cena) {
		//Esconde todas as cenas
		$(".cena")
			.removeClass(this._classeDeAtivacao)

			//Mostra a cena solicitada
			.eq(cena-1)
			.addClass(this._classeDeAtivacao);

		this.aCadaCena();
	},


	proxima: function() {
		var cenas, cenaAtiva, proximaCena;
			cenas = $(".cena");
			cenaAtiva = cenas.filter('.ativa').removeClass('ativa');


			if(cenaAtiva.length == 0) {
				cenas.first().addClass('ativa');
			} else {
				proximaCena = cenaAtiva.next('.cena');
				if(proximaCena.length > 0) {
					proximaCena.addClass('ativa');
				} else {
					cenas.first().addClass('ativa');
				}
			}
		this.aCadaCena();
	},

	anterior: function() {
		var cenas, cenaAtiva, cenaAnterior;
			cenas = $(".cena");
			cenaAtiva = cenas.filter('.ativa').removeClass('ativa');


			if(cenaAtiva.length == 0) {
				cenas.last().addClass('ativa');
			} else {
				cenaAnterior = cenaAtiva.prev('.cena');
				if(cenaAnterior.length > 0) {
					cenaAnterior.addClass('ativa');
				} else {
					cenas.last().addClass('ativa');
				}
			}
		this.aCadaCena();
	},

	Paginas: {

		setUp: function() {
			var that = this;
			$("[data-pagina]").on('click', function(event) {
				that.clique.apply(that, arguments);
			});
		},

		pagina: function(cena, pagina) {
				var panorama;
					panorama = this.panorama(cena);
					panorama.paginas.removeClass('ativa').eq(pagina-1).addClass('ativa');
		},

		clique: function(event) {
			event.stopPropagation();
			var botao, pagina, cena;
				botao = $(event.currentTarget);
				pagina = botao.attr('data-pagina');
				cena = botao.parents('.cena');

				if(cena.length == 1){
					cena = cena.attr('id').replace(/\D/g,"");
				} else {
					if($(event.currentTarget).attr('data-cena')) {
						cena = $(event.currentTarget).attr('data-cena');
					}
				}


			if(pagina == "proxima") {
				this.proxima(cena);
			} else if(pagina  == "anterior"){
				this.anterior(cena);
			} else {
				this.pagina(cena, pagina);
			}
		},

		panorama: function(cena) {
			var panorama = {};
			
				panorama.cena = $("#cena"+cena);
				panorama.paginas = panorama.cena.find(".pagina");
				panorama.paginaAtiva = panorama.paginas.filter(".ativa");
				panorama.quantidadeDePaginas = panorama.paginas.length;

				return panorama;
		},

		proxima: function(cena){
			var panorama, proxPagina;
				panorama = this.panorama(cena);
				proxPagina = panorama.paginaAtiva.next('.pagina');

				panorama.paginas.removeClass('ativa');

				if(proxPagina.length > 0) {
					proxPagina.addClass('ativa');
				} else {
					panorama.paginas.eq(0).addClass('ativa');
				}
		},

		anterior: function(cena) {
			var panorama, prevPagina;
				panorama = this.panorama(cena);
				prevPagina = panorama.paginaAtiva.prev('.pagina');

				panorama.paginas.removeClass('ativa');

				if(prevPagina.length > 0) {
					prevPagina.addClass('ativa');
				} else {
					panorama.paginas.last().addClass('ativa');
				}
		}
	}
}