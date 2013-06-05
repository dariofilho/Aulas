var APP = APP || {};
APP.Popup = {

	setUp: function() {
		var that = this;
		
		$(".botao.fechar, [data-popupAcao=fechar]", ".popup").on("click", function(event){
			$(event.currentTarget)
				.parents('.popup')
				.removeClass('visivel');
		});




		$("[data-popup]").on("click", function(event){
			var elementoDeGatilho, idDoPopup;
				elementoDeGatilho = $(event.currentTarget);
				idDoPopup = elementoDeGatilho.attr('data-popup');
				$("#"+idDoPopup).addClass('visivel');
		});


		$("[data-popupFechar]").on("click", function(event){
			var elementoDeGatilho, ids;
				elementoDeGatilho = $(event.currentTarget);
				ids = elementoDeGatilho.attr('data-popupFechar');

				$(ids.split(",")).each(function(iId, id) {
					$("#"+id.trim()).removeClass('visivel');	
				})
		});
	},

	fecharTodos: function() {
		$(".popup").removeClass('visivel');
	},

	fechar: function(id) {
		$("#"+id).removeClass('visivel');
	}
}