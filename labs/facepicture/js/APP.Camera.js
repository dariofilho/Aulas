var APP = APP || {};

APP.log = function() {
	//console.debug(arguments)
}

APP.Camera = {
	
	_idVideo: "#video",
	_idCanvas: "#canvas",
	_idImagem: "#imagem",
	
	setUp: function() {
		APP.log("Ligando camera...");
		APP._modo = "camera";
	},


	Requisicao:  {

		_src: null,

		setUp: function() {
			window.URL = window.URL 
			|| window.webkitURL;

			navigator.getUserMedia = navigator.getUserMedia 
				|| navigator.webkitGetUserMedia 
				|| navigator.mozGetUserMedia 
				|| navigator.msGetUserMedia;


			this.ligar();
		},

		ligar: function() {
			var that = this,

			ligou = function() {
				that.ligou.apply(that, arguments);
			},
			
			naoLigou = function() {
				that.naoLigou.apply(that, arguments);
			};


			if (navigator.getUserMedia) {
				navigator.getUserMedia({audio: false, video: true}, ligou, naoLigou);
			} else {
			  this.indisponivel();
			}
		},

		ligou: function(stream) {
	 	 	$(APP.Camera._idVideo).get(0).src = window.URL.createObjectURL(stream);
		},

		naoLigou: function() {
			console.debug("Não foi possível ligar a câmera");
		},

		indisponivel: function() {
			console.debug("A câmera está indisponivel");
		}
	},

	

	Foto: {

		setUp: function() {
			$("img").on('load', function(event) {
				$(event.currentTarget).removeClass('carregando');
			})
		},

		capturar: function() {
			var canvas = $(APP.Camera._idCanvas).get(0), 
				contexto = canvas.getContext("2d"), 
				video = $(APP.Camera._idVideo);
				contexto.drawImage(video.get(0), 0, 0, 640, 480);

			var mascara = $(".pessoas").filter($(document.body).hasClass('homem') ? '.homem' : '.mulher').find('img');

				contexto.drawImage(video.get(0), 0, 0, 640, 480);
				contexto.drawImage(mascara.get(0), 0, 0, 640, 480);
				
			this.apresentar();
		},

		apresentar: function() {
			var canvas = $(APP.Camera._idCanvas),
				dados = canvas.get(0).toDataURL('image/jpeg', 0.9),
				imagem = $(APP.Camera._idImagem);
				imagem.attr('src', dados);

		
			this.Avaliacao.abrir();
		},

		Avaliacao: {
			setUp: function() {

			},

			positiva: function() {
				APP.Camera.Foto.gravar();
			},

			negativa: function() {
				this.fechar();
			},

			abrir: function() {
				APP._modo="avaliacao";
				$("body").addClass('avaliacao');
			},

			fechar: function() {
				$("body").removeClass('avaliacao');
				APP._modo="camera";
			}
		},

		gravar: function() {
			this.Salvar.Requisicao.enviar();
		},

		Salvar: {
			setUp: function() {

			},

			Requisicao: {
				_url: "salvar.php",

				_chamada: null,

				setUp: function() {},

				enviar: function() {

					//localStorage.setItem('foto', $(APP.Camera._idImagem).attr('src'));

					var that = this;


					var canvas = $(APP.Camera._idCanvas).get(0),
						contexto = canvas.getContext("2d");

						contexto.scale(-1,1);
						contexto.drawImage(canvas, canvas.width * -1, 0, canvas.width, canvas.height);
						//contexto.scale(-1,1);

					var dados = canvas.toDataURL('image/jpeg',0.9);

					this._chamada = $.ajax({
						type: 'POST',
						data: dados,
						contentType: 'application/upload',
						url: this._url,
						beforeSend: function() {
							that.enviando.apply(that, arguments);
						},
						success: function() {
							that.enviou.apply(that, arguments);
						},
						error: function() {
							that.naoEnviou.apply(that, arguments);
						}
					})


						contexto.scale(-1,1);
				},

				recomecar: function() {
					
					APP.Camera.Foto.Avaliacao.fechar();
					$(document.body).removeClass('enviando');

					$("#loading").fadeOut(100);

					APP._modo = "camera";
				},

				confirmar: function() {
					$("#loaded").fadeIn(300).delay(2000).fadeOut();
				},
				cancelar: function() {
					this._chamada.abort();
					this.recomecar();
				},


				enviando: function() {
					APP.log('Salvando foto');
					APP._modo = "enviando";
					$(document.body).addClass('enviando');
					$("#loading").fadeIn();
				},	

				enviou: function(data, text, xhr) {
					if(data.status === true) {
						APP.log('A foto foi salva com sucesso');
						console.debug(data);
					} else {
						APP.log('Ocorreu um erro e a foto não foi salva');
					}

					this.recomecar();
					this.confirmar();
				},

				naoEnviou: function() {
					APP.log('Erro ao enviar a foto para o servidor');
					this.recomecar();
				}
			}
		}
	}
}