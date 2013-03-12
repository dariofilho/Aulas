window.APPNotasRM = {
	_frame: window.frames.CLMain.document,

	iniciar: function() {
		$(window.APPNotasRM._frame).find("#dgAlunos tr").css('cursor', 'pointer')
			.toggle(function(event) {
				if(event.target.tagName != 'INPUT') {
					$(event.currentTarget).addClass('alunoSelecionado').css('background-color', '#fcc'); 
				}
			}, function(event) { 
				if(event.target.tagName != 'INPUT') {
					$(event.currentTarget).removeClass('alunoSelecionado').css('background-color', '');
				}
			});
	},

	aplicarATodos: function() {
		var nota = prompt('Digite a nota');
		if(!nota) return false;
		$(window.frames.CLMain.document)
			.find('input[type=text][name$=Nota]')
			.val(nota);
	
	},

	aplicarAMarcados: function() {
		var nota = prompt('Digite a nota');
		if(!nota) return false;

		$(window.frames.CLMain.document)
			.find("#dgAlunos tr.alunoSelecionado")
			.find("input[type=text][name$=Nota]")
			.val(nota)
			.end().removeClass('alunoSelecionado');
	}
};
window.APPNotasRM.iniciar();
alert('Notas RM instalado com sucesso!');