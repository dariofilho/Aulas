var APP = APP || {};

APP.Imagem = {
	
	_id: 0,
	
	_url: '',
 
	setUp: function() {
		this.capturarValorInicial();
	},

	atualizar: function(id, url) {
		//Atualiza o objeto
		this._id = id;
		this._url = url;

		var novosValores = {
			"data-id": id,
			"src": url
		}
		
		$("#imagem").attr(novosValores);
	},

	capturarValorInicial: function() {
		this._id = $("#imagem").attr('data-id');
		this._url = $("#imagem").attr('src');
	}
}