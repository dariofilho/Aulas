var APP = APP || {};
APP.Lista = {
	setUp: function() {
		console.debug('Executado automaticamente');
	},

	adicionarPosicao: function(lat,lang){
		console.debug(lat, lang);

		$("<li>").text(lat+","+lang).prependTo("#log");

		// var li = document.createElement('li');
		// 	li.textContent = lat+","+lang;

		// var ul = document.getElementById('log');
		// 	ul.appendChild(li);
	}
}