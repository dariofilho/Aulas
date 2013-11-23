var APP = APP || {};
APP.Produtos = {
	setUp: function() {

		//Produtos
		$("#galeria")
			.text("Galeria ativada")
			.on("click", APP.Produtos.interacaoComAGaleria);
	}, 
	interacaoComAGaleria: function() {
		$("#galeria").text("O usuário interagiu");
	}, 
	lightbox: function() {

	}
}