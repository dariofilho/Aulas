var APP = APP || {};
APP.Raw = {
	setUp: function() {
		console.debug('Módulo RAW iniciado');
	},

	Requisicao: {
		setUp: function() {
			this.enviar({nome:"Melissa", idade: 21, hobby: 'Dançar', profissao: 'dzain'})
		},

		enviar: function(dados) {
			var that = this;

			$.ajax({
				type: 'POST',
				url: 'getRawPostData.php',
				contentType: 'application/json',
				data: JSON.stringify(dados),
				beforeSend: function() { that.enviando.apply(that, arguments); },
				success: function() { that.enviou.apply(that, arguments); },
				error: function() { that.naoEnviou.apply(that, arguments); }
			})
		},
		enviando: function() {
			console.debug('Enviando dados');
		},
		enviou: function(data, text, xhr) {
			console.debug('retorno do servidor', data);
		},
		naoEnviou: function() {
			console.debug('deu erro');
		},

	}
}