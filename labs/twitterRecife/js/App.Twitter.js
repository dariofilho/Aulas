var APP = APP || {};
APP.Twitter = {
	setUp: function() {
		console.debug('teste')
	}, 

	Twits: {
		setUp: function() {
			this.carregar();
		},

		carregar: function() {
			var that = this;
			$.ajax({
				url: 'proxy.php',
				dataType: 'json',
				beforeSend: function() { 
					that.carregando.apply(that, arguments) 
				},
				success: function() { 
					that.carregou.apply(that, arguments) 
				},
				error: function() { 
					that.naoCarregou.apply(that, arguments) 
				} 
			});
		},

		carregando: function() {
			$("#twits").text('Carregando twits...');
			console.debug('carregando twits');
		},
		carregou: function(data, text, xhr) {
			console.debug('Carregou', data, this);
			this.apresentar(data.results);
		},
		naoCarregou: function() {
			console.debug('Erro!');
		},


		apresentar: function(twits) {
			var fragmento = document.createDocumentFragment();
			console.debug('Mostrando twits', twits);

			$(twits).each(function(twitIndex, twit) {
				var mioloDoTwit = '<h2>'+twit.from_user_name+'</h2>';
					mioloDoTwit += '<img src="'+twit.profile_image_url+'" />';
					mioloDoTwit += '<p>'+twit.text+'</p>';

				var elementoTwit = $("<article>")
										.append(mioloDoTwit)
										.get(0);

				fragmento.appendChild(elementoTwit);
			});
			
			$("#twits").empty().get(0).appendChild(fragmento);
		}
	}
}







