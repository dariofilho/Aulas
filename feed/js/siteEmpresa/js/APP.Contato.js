var APP = APP || {};

APP.Contato = {
	setUp: function(){
		console.debug('Estou em Contato');
	},
	
	Formulario: {
		setUp: function() {
			
			//Adiciona Listener de submit no form
			$("#meuFormulario").bind("submit", function(event){
				//Evita a reação padrão
				event.preventDefault();
				
				//Executa a função de Envio
				//enviarDadosDoFormulario();
				APP.Contato.Formulario.enviar();
			});
		},
		
		enviar: function() {
			this.Enviar.enviar();
		},
		
		Enviar: {
			enviar: function(){ 
				var Enviar = this;
				
				$.ajax({
					url: "form.php",
					data: $("#meuFormulario").serialize(),
					dataType: "JSON",
					type: "POST",
					beforeSend: this.enviando,
					success: this.enviou,
					error: this.naoEnviou
				});
			},
			
			enviando: function() {
				$("#status").text('Enviando...');
			},
			
			enviou: function(data, text, xhr) {
				var mensagem = data.mensagem;

				if(data.status == "true") {
					$("#meuFormulario").get(0).reset();
				}

				$("#status").text(mensagem);

			},
			naoEnviou: function() {
				$("#status").text('Erro desconhecido!');
			}
		}
	}
};