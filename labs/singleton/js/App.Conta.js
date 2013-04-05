var App = App || {};

App.Conta = {
	setUp: function() {

	},
	
	Acesso: {
		setUp: function() {
			$("input.soNumero")
				.on("focus keyup change", function() {
				var valor = $(this).val().replace(/\D/gi, "");
				$(this).val(valor);
			});

			console.debug("Inicio acesso");
		}
	}
}