//INÍCIO FlipApp.Leitura.Zoom.js
var FlipApp = FlipApp || {};
	FlipApp.Leitura = FlipApp.Leitura || {};
	
FlipApp.Leitura.Zoom = {
	_iScroll: null,
	
	//Construtor
	setUp: function() {
		var that = this;
		$("#controleZoom").on("click","span",function(event){
			var idBotao = $(event.currentTarget).attr('id');
			idBotao == "diminuirZoom" ? that.Nivel.diminuir() : that.Nivel.aumentar();
		});
				
		$("#btnPosteriorZoom").on("click",function(event){
			FlipApp.Leitura.Paginas.proxima();
		});	
		$("#btnAnteriorZoom").on("click",function(event){
			FlipApp.Leitura.Paginas.anterior();
		});	
	},
	atualizar: function() {
		var paginaAtual = this._pai().Atual._pagina;
		this.mostrarPagina(paginaAtual);
		this.atualizariScroll();
	},
	mostrarPagina: function(numero) {
		//Pegar o objeto da página
		var that = this;
		var pagina = FlipApp.Leitura.Impresso.getPaginaByNumero(numero);
		var caminho = FlipApp.Util.caminhoPagina(pagina.edicao.data, pagina.edicao.publicacao, pagina.caderno.dir, pagina.dir, pagina.dir);
		
	
		var box = $("#boxLeituraZoom").empty();
		
		$("<img>")
			.on('load', function(event) {
				that.atualizariScroll();
			})
			.attr("src",caminho)
			.appendTo(box);	
		this.atualizariScroll();
	},
	atualizariScroll: function() {
		var that = this;
		if(that._iScroll === null) {
			that._iScroll = new iScroll('boxLeituraZoom', {
				hScroll: true,
				vScroll: true,
				hScrollbar: false,
				vScrollbar: false,
				lockDirection: false//,bounce: false
			});
		} else {
			that._iScroll.destroy();
			that._iScroll = new iScroll('boxLeituraZoom', {
				hScroll: true,
				vScroll: true,
				hScrollbar: false,
				vScrollbar: false,
				lockDirection: false//,bounce: false
			});
		}
		
	},
	Nivel: {
		_atual: 100,
		_limiteMaximo: 160,
		_limiteMinimo: 100,
		aumentar: function() {			
			this._atual = this._atual + 10 <= this._limiteMaximo ? this._atual + 10 : this._limiteMaximo;
			
			$("#boxLeituraZoom img").css({
				width: this._atual + "%"
			});
			
			if(this._pai()._iScroll) {
				this._pai()._iScroll.refresh();
			}
		}, 
		diminuir: function() {
			this._atual = this._atual - 10 >= this._limiteMinimo ? this._atual - 10 : this._limiteMinimo;
			$("#boxLeituraZoom img").css({
				width: this._atual + "%"
			});
			
			if(this._pai()._iScroll) {
				this._pai()._iScroll.refresh();
			}
		}
	}
};
//FIM FlipApp.Leitura.Zoom.js