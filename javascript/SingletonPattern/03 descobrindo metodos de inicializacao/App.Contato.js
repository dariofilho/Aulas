var App = App || {};
App.Contato = {
	inicializacao: function() {
		console.debug('Chamou App.Contato.inicializacao');
		$("#contatoForm")
			.on('submit', function(event){
				//alert('Formulario enviado');
				event.preventDefault();
			});
		//this.Validacao.inicializacao();
	}
}