var APP = APP || {};
APP.Repositorio = {
	_dados: {},
	
	setUp: function(){
		
	},
	
	formatarDataParaId: function(data) {
		data = data.replace(/[^\d]/g,"_").split("_");
		data = (data[0].length > 2) ? data.reverse() : data;
		data = data.join("")
		return data;
	},

	//Gera um ID de acordo com o tipo e identificador
	id: function(tipo, identificador) {
		var id = tipo + identificador;
		
		if(tipo == 'edicao') {
			id = tipo+this.formatarDataParaId(identificador);
		}
		
		return id;
	},
	
	//Adiciona no repositório
	adicionar: function(tipo, identificador, dados) {
		var id = this.id(tipo, identificador);
		if(!this._dados[tipo]) this._dados[tipo] = {};
		this._dados[tipo][id] = dados;
	},
	
	
	//Carregar do repositório 
	carregar: function(tipo, identificador) {
		var id = this.id(tipo, identificador);
		return (this.existe(tipo, identificador)) ? this._dados[tipo][id] : false;
	},
	
	//Verifica se existe no repositório
	existe: function(tipo, identificador) {
		var id = this.id(tipo, identificador);
		if(tipo == 'edicao') {
			if(this.LocalStorage.existe(identificador)) {
				this.LocalStorage.carregar(identificador);
			}
		} 
		return (this._dados[tipo] && this._dados[tipo][id]) ? true : false;
	},
	
	LocalStorage: {
		existe: function(data) {
			var id = 'edicao' + APP.Repositorio.formatarDataParaId(data);
			return localStorage.getItem(id) ? true : false;
		},
		
		adicionar: function(dados) {
			var id = 'edicao' + APP.Repositorio.formatarDataParaId(dados.lista.data);
			
			try {
				localStorage.setItem(id, JSON.stringify(dados));
			} catch (e) {
				 if (e == QUOTA_EXCEEDED_ERR) {
				 	 alert('O limite de memória offline para este aplicativo foi excedido!');
				}
			}
		},
		
		carregar: function(data) {
			var id = 'edicao' + APP.Repositorio.formatarDataParaId(data);
			if(this.existe(data)) {
				var dados = JSON.parse(localStorage.getItem(id));
				APP.Repositorio.adicionar('edicao', data, dados.lista);
				$(dados.noticias).each(function(indice, noticia){
					APP.Repositorio.adicionar('noticia', noticia.news.id, noticia);
				});
			}
		},
		
		listar: function() {
			var datas = [];
			for(chave in localStorage) {
				if(!chave.match('edicao')) continue;
				var edicao = JSON.parse(localStorage[chave]);
				var data = edicao.lista.data.split('-').reverse().join('/');
				datas.push(data);
			}
			return datas;
		},
		
		remover: function(data) {
			var id = 'edicao' + APP.Repositorio.formatarDataParaId(data);
			localStorage.removeItem(id);
		}
	}
};