//INÍCIO FlipApp.Leitura.js
var FlipApp = FlipApp || {};
FlipApp.Leitura = {
	Atual: {
		_data: null,
		_pagina: 1,
	},
	
	//Construtor
	setUp: function() {
		var that = this;
			
		$(document).on('click', "[data-edicao]", function(event) { 
			
			var target = $(event.target),
				elemento = $(event.currentTarget),
				data = elemento.attr('data-edicao'),
				Tela = FlipApp.Tela,
				telaAtual = Tela.Atual._id,
				SubTela = Tela.SubTela,
				pagina = 1,
				modo = "flip";
			
			
			if(target.is('[data-download]') || target.parents().is('[data-download]')) {
				return false;
			}
			
			if(elemento.attr('data-pagina') != undefined) {
				pagina = elemento.attr('data-pagina');
			}
			
			if(elemento.attr('data-modo') != undefined) {
				modo = elemento.attr('data-modo');
			}		
			new FlipApp.Leitura.Ticket(data, pagina, modo);
		});
		
		$(document).on('keyup', function(event){		
			if(FlipApp.Tela.SubTela.Atual._id == "subTelaLeituraZoom") { 
				if(event.which == 37) {
					FlipApp.Leitura.Paginas.anterior();
				}else if(event.which == 39) {
					FlipApp.Leitura.Paginas.proxima();
				}
			}
		});
		
	},
	
	atualizar: function() {
		this.BottomBar.atualizar();
		
		var subTela = FlipApp.Tela.SubTela.Atual._id;
		
		switch(subTela) {
			case "subTelaLeituraZoom": 
				this.Zoom.atualizar(); 
			break;
			
			case "subTelaLeituraMiniaturas": 
				this.Miniaturas.atualizar(); 
			break;
			
			case "subTelaLeituraTexto": 
				this.Texto.atualizar(); 
			break;
			
			case "subTelaLeituraFlip": 
				this.Flip.atualizar(); 
			break;
			
			default: break;
		}
		
		/*if(subTela == "subTelaLeituraZoom") {
			this.Zoom.atualizar();
		}
		if(subTela == "subTelaLeituraMiniaturas") {
			this.Miniaturas.atualizar();
		}
		if(subTela == "subTelaLeituraTexto") {
			this.Texto.atualizar();
		}
		if(subTela == "subTelaLeituraTexto") {
			this.Texto.atualizar();
		}*/
		
		
		if(FlipApp.Leitura.Atual._pagina > 1){
			$("#btnAnteriorZoom").show();
		}else{
			$("#btnAnteriorZoom").hide();
		}
		
		if(FlipApp.Leitura.Atual._pagina == this.Paginas._total){
			$("#btnPosteriorZoom").hide();
		}else{
			$("#btnPosteriorZoom").show();
		}
	},
	
	montarModos: function(dados) {
		this.Paginas.atualizar(dados);
		this.Flip.montar(dados);
		this.Miniaturas.montar(dados);
		this.Texto.montar(dados);
		this._pai().TopBar.montar(dados);
		

		//this.Zoom.mostrarPagina(this.Atual._pagina);
	},
	
	mostrarPagina: function(pagina) {
		var idSubTela = FlipApp.Tela.SubTela.Atual._id;
		this.Atual._pagina = parseInt(pagina, 10);
		
		if(idSubTela == "subTelaLeituraZoom") {
			this.Zoom.mostrarPagina(pagina);
		} else if(idSubTela == "subTelaLeituraFlip") {
			this.Flip.mostrarPagina(pagina);
		}
		if(pagina > 1){
			$("#btnAnteriorZoom").show();
		}else{
			$("#btnAnteriorZoom").hide();
		}
		
		if(pagina == this.Paginas._total){
			$("#btnPosteriorZoom").hide();
		}else{
			$("#btnPosteriorZoom").show();
		}
	},
	
	
	Paginas: {
		_total: 0,
		atualizar: function(dados) {
			var cadernos = dados.impresso.cadernos;
			var totalDeCadernos = cadernos.length;
			var ultimoCaderno = cadernos[totalDeCadernos-1];
			var totalDePaginasDoUltimoCaderno = ultimoCaderno.paginas.length;
			var ultimaPagina = ultimoCaderno.paginas[totalDePaginasDoUltimoCaderno-1];
			var totalDePaginas = ultimaPagina.ordem;
			this._total = parseInt(totalDePaginas, 10);
		},
		proxima: function() {
			var Atual = this._pai().Atual;
			var paginaAtual = parseInt(this._pai().Atual._pagina, 10);
			var proxima = paginaAtual + 1;
				proxima = (proxima > this._total) ? 1 : proxima;
				Atual._pagina = proxima;
			this._pai().mostrarPagina(proxima);
		},
		anterior: function() {
			var Atual = this._pai().Atual;
			var paginaAtual = parseInt(this._pai().Atual._pagina, 10);
			var anterior = paginaAtual - 1;
				anterior = (anterior < 1) ? this._total : anterior;
				Atual._pagina = anterior;
			this._pai().mostrarPagina(anterior);
		}
	},
	
	Impresso: {
		_totalDePaginas: 0,
		getPaginaByNumero: function(numero) {
			var Leitura = FlipApp.Leitura, objetoPagina = {};
			
			if(Leitura.Atual._data === null) return null;
			
			var dados = FlipApp.Repositorio.carregar('edicao',Leitura.Atual._data), objetoPagina = null;
			$(dados.impresso.cadernos).each(function(indiceCaderno, caderno) {
				$(caderno.paginas).each(function(indicePagina, pagina) {
					if(parseInt(pagina.ordem,10) == parseInt(numero,10)) {
						//Clona a referência do objeto página;
						objetoPagina = pagina;
						
						//Incrementa o objeto com mais informações
						objetoPagina.conteudoMultimidia = pagina.hasOwnProperty('qtdMultimidia');
						objetoPagina.caderno = caderno;
						objetoPagina.edicao = {
							data: dados.data,
							publicacao: dados.impresso.publicacao
						}
					}
				});
			});
			
			return objetoPagina;
		}
	},
	
	Download: {
		setUp: function() {
			$(document).on("click","[data-download]", function(event) {
				var parametro = $(event.currentTarget).attr('data-download');
				var data;
				
				if(parametro == "atual") {
					if(FlipApp.Leitura.Atual._data === null) {
						data = $("#capaUltimaEdicao").attr('data-edicao');
					} else {
						data = FlipApp.Leitura.Atual._data;
					}
				} else if(parametro.match(/\d{2}\/\d{2}\/\d{4}/)) {
					data = parametro;
				}
				
				if(data != undefined) {
					var arquivo = "JC_" + data.replace(/\//g,"_");
					document.location.href = "../edicao/"+arquivo+".pdf";
				}
			});
		}
	},

	BottomBar: {
		_tela : "",
		setUp: function() {
			
		},
		atualizar: function() {
			var tela = FlipApp.Tela.SubTela.Atual._id
			if(tela == "subTelaLeituraZoom"){
				$("#controleZoom").css("display","inline-block");
			}else {
				$("#controleZoom").hide();
			}
			this.modoLeitura(tela.replace("subTelaLeitura",""));
			
		},
		modoLeitura: function(tela){
			this._tela = tela;
			$("#modoLeitura").text(tela);
		},
	}
};
//FIM FlipApp.Leitura.js