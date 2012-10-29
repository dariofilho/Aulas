var APP = APP || {};
APP.Camera = {

	setUp: function() {
		var that = this;

		this.habilitarCamera();
		this.ligarCamera();

		window.addEventListener('resize', function() {
			that.centralizar.apply(that, arguments);
		});

		$(window).on('keyup', function() { 
			that.shot.apply(that, arguments);
		})
	},

	Mascara: {
		setUp: function() {

		},

		selecionarHomem: function() {
			$(".mascara").removeClass('ativa').find('#mascaraHomem').addClass('ativa');
		},
		selecionarMulher: function() {
			$(".mascara").removeClass('ativa').find('#mascaraMulher').addClass('ativa');
		}
	},

	centralizar: function(){
		$("#camera, .mascara").css({
			height: window.innerHeight,
			marginTop: ((window.innerHeight/2)*-1)+"px",
			marginLeft: ((window.innerWidth/2) * -1)+"px"
		})
	},

	habilitarCamera: function() {
		window.URL = window.URL || window.webkitURL;

		navigator.getUserMedia  = 
			navigator.getUserMedia || 
			navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia || 
            navigator.msGetUserMedia;
	},

	ligarCamera: function() {
		var midiasNecessarias = {
			audio: true, 
			video: true
		}

		if (navigator.getUserMedia) {
		  navigator.getUserMedia(midiasNecessarias, this.aplicarStream, this.semCamera);
		} else {
		  //video.src = 'somevideo.webm'; // fallback.
		}
	},

	aplicarStream: function(stream) {
		$("#camera").get(0).src = window.URL.createObjectURL(stream);
	},

	semCamera: function() {
		console.debug('Erro na camera');
	},

	shot: function(event) {
		//if(event.which != 13) return false;

		var canvas = $("#canvasShot").get(0),  contexto = canvas.getContext('2d');
		 	contexto.drawImage($("#camera").get(0), 0, 0, 640, 480);
		 	contexto.drawImage($(".mascara.ativa").get(0), 0, 0, 640, 480);

		 	$("#revelacao").attr('src', canvas.toDataUrl());
	}
}

