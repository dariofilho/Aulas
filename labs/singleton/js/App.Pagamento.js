var App = App || {};

App.Pagamento = {
	setUp: function() {
		console.debug("Iniciou pagamento");
	},

	Pai: {

		_nome: "Isac",
		setUp: function() {
			console.debug("Iniciou Pai", "Filho: ", this.Filho._nome);
		},

		Filho: {
			_nome: "Rodrigo",
			setUp: function() {
				console.debug("Iniciou filho", "Pai: ", this.pai()._nome);

			}
		}
	}
}