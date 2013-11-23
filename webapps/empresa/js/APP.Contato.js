var APP = APP || {};
APP.Contato = {
	setUp: function() {
		//Contato
		$("#formulario").text("Formulário ativado");
	},

	Validacao: {
		setUp: function() {
			$("#formulario").append("Formulário foi validado");
		}
	}
}