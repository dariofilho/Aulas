var APP = APP || {};
APP.Voto =  {
	setUp: function() {
		var that = this;
		$(window).on('keyup', function(event) {
			that.interpretarInput.call(that, event);
		});
	},

	interpretarInput: function(event) {
		var calculo, nota, code = event.which;

		if(
			(code >= 48 && code <= 57) || 
			(code >= 96 && code <= 105)) 
		{
			calculo = code - ((code < 96) ? 48 : 96);
			nota = (calculo == 0) ? 10 : calculo;
		
			this.votar(nota);
		}
	}, 

	votar: function(nota) {
		var id = APP.Imagem._id;
		this.Requisicao.enviar(id, nota);
	},

	Requisicao: {
		enviar: function(id, nota) {
			var that = this;
			$.ajax({
				url: 'processarVoto.php',
				dataType: 'JSON',
				data: {
					id: id,
					nota: nota
				},

				beforeSend: function() {
					that.enviando.apply(that, arguments);
				},

				success: function() {
					that.enviou.apply(that, arguments);
				},

				error: function() {
					that.naoEnviou.apply(that, arguments);
				}
			})
		}, 
		enviando: function() {

		}, 
		enviou: function(data, text, xhr) {
			APP.Imagem.atualizar(data.id, data.url)
		}, 
		naoEnviou: function() {

		}
	}
}