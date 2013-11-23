var APP = APP || {};
APP.FormularioDeContato = {

	_elementoEstados: null,
	_elementoCidades: null,

	setUp: function() {
		var that = this;
		this._elementoEstados = document.getElementById('estados');
		this._elementoCidades = document.getElementById('cidades');
	

		this.preencherEstados();

		this._elementoEstados.addEventListener('change', function() {
			that.limparCidades();
			that.preencherCidades(this.value);
		}, true);

	},

	preencherEstados: function() {
		var i,
			option,
			estado,
			fragmento, 
			estados = APP._dados.estados;

		fragmento = document.createDocumentFragment();
		
		for(i = 0; i < estados.length; i++) {
			estado = estados[i];

			option = document.createElement('option');
			option.value = estado[0];
			option.textContent = estado[1];

			fragmento.appendChild(option);
		}

		this._elementoEstados.appendChild(fragmento);
	},

	limparCidades: function() {

		var i, cidades = this._elementoCidades.childNodes;

		for(i = 0; i < cidades.length; i++) {
			this._elementoCidades.removeChild(cidades[i]);
		}

	},

	preencherCidades: function(estadoSelecionado){
		var iEstado, 
			iCidade,
			cidade, 
			cidades, 
			estado,
			estados = APP._dados.estados,  
			option, 
			fragmento;

		cidades = [estados][estadoSelecionado];
		fragmento = document.createDocumentFragment();

		for(iEstado = 0; iEstado < estados.length; iEstado++) {
			estado = estados[iEstado];

			if(estado[0] == estadoSelecionado) {
				cidades = APP._dados.cidades[iEstado];
				
				for(iCidade=0; iCidade<cidades.length; iCidade++){
					cidade = cidades[iCidade]; 
					option = document.createElement('option');
					option.value = cidade;
					option.textContent = cidade;
					fragmento.appendChild(option);
				}
			} 
		}
		console.debug(estadoSelecionado);
		this._elementoCidades.appendChild(fragmento);
	}
};