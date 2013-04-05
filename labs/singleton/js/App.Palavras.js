var App = App || {};

App.Palavras = {
	setUp: function() {
	},

	popular: function(palavras) {
		$("#palavras").empty().append("<ul>");
		
		$(palavras).each(function(i,palavra) {
			$("<li>").text(palavra).appendTo("#palavras ul");
		});

		// var ul = document.getElementById('palavras').getElementsByTagName('ul')[0];
		// var i = 0;
		// for(i; i < palavras.length; i++) {
		// 	var li = document.createElement('li');
		// 		li.innerHTML = palavras[i];
		// 		ul.appendChild(li);
		// }
		// var palavras = document.getElementById('palavras');
		// var palavrasFilhos = palavras.childNodes();
		// var iPalavrasfilhos = 0;
		// 	for(iPalavrasfilhos; iPalavrasfilhos < palavrasFilhos.length; iPalavrasfilhos++) {
		// 		palavras.removeChild(palavrasFilhos[iPalavrasfilhos]);
		// 	}
		// palavras.appendChild('ul');
	},

	Request: {
		setUp: function() {
			this.carregar();
		},
		carregar: function() {
			var that = this;

			$.ajax({
				url: 'data/info.php',
				dataType: 'JSON',
				beforeSend: function() {
					that.carregando.apply(that);
				}, 
				success: function() {
					that.carregou.apply(that, arguments);
				}
			});
		},
		carregando: function() {
			$("#palavras")
				.addClass('loading')
				.text("Carregando...");
		},
		carregou: function(data, text, xhr) {
			this.pai().popular(data.palavras);
		},
		naoCarregou: function() {
			$("#palavras").text("Tentar novamente");
		}
	}
}