var HTML5 = HTML5 || {};

HTML5.Canvas = {
	_canvas: null,
	_contexto: null,
	_ct: null,
	_debug: false,
	
	//Configuração geral
	setUp: function() {
		
		//Cria o canvas
		this.criar();
		this.definirEstiloPadrao();
		
		//Redimensiona o canvas no resize da janela ou se o dispositivo mudar de orientação
		$(window).bind('resize orientationchange', function() { 
			HTML5.Canvas.redimensionar(); 
		});
	},
	
	/**
	 * Executa uma função assim que o browser achar que é melhor pra ele.
	 * Isso resulta no melhor framerate possível sem sobrecarregar o navegador
	 */
	
	_ultimaAnimacao: null,
	_animacaoFPSMax: null,
	_animacaoFPSMin: null,
	_animacaoFPSMedia: null,
	_animacaoContagem: 0,
	_animacaoGapContagem: 30,
	_animacaoFrames: 0,
	_animacaoFPS: null,
	
 	animar: function(callback) {
		var AtualizacaoManual = function(callback){
	        window.setTimeout(callback, 1000 / 60);
	    }
		var executar =  window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.requestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || AtualizacaoManual;
		//var executar = AtualizacaoManual;
		executar(callback);
		
		
		
		if(this._ultimaAnimacao) {
			var fpsAtual = Math.round(1000 / (new Date() - this._ultimaAnimacao));
			this._animacaoFPSMedia = (!this._animacaoFPSMedia) ? (this._animacaoFPS + fpsAtual)/2 : (this._animacaoFPSMedia + fpsAtual)/2;
			this._animacaoFPS = fpsAtual;
		}
		
		if(this._animacaoContagem >= this._animacaoGapContagem) {
			if(this._animacaoFPS < this._animacaoFPSMin || !this._animacaoFPSMin) this._animacaoFPSMin = this._animacaoFPS;
			if(this._animacaoFPS > this._animacaoFPSMax || !this._animacaoFPSMax) this._animacaoFPSMax = this._animacaoFPS;
			
			if(this._debug) console.debug("FPS: ", this._animacaoFPS, "Máx: ", this._animacaoFPSMax, "Min: ", this._animacaoFPSMin);
		}
		this._animacaoContagem++;
		
		this._ultimaAnimacao = new Date();
		
	},
	
	criar: function() {
		//Se o canvas já tiver sido criado, não faz nada
		if(this._canvas) return false;
		
		//Cria um canvas no body
		this._canvas = $("<canvas>")
						.attr('id','meuCanvas')
						.appendTo(document.body)
						.css({
							position: 'absolute',
							backgroundColor: 'white',
							zIndex: 2
						})
						.get(0);
		this._contexto = this._canvas.getContext('2d');
		this._ct = this._contexto;
		
		//Define o estilo padrão
		this.definirEstiloPadrao();
		
		//Deixa o canvas em full screen
		this.redimensionar();
	},
	
	limpar: function() {
		this._ct.clearRect(0,0, this._canvas.width, this._canvas.height)
	},
	
	reset: function() {
		this.limpar();
		this.definirEstiloPadrao();
	},
	
	redimensionar: function() {
		if(!this._canvas) return false;
		
		this._canvas.width = $(window).width();
		this._canvas.height = $(window).height();
	},
	
	exportarPng: function() {
		return this._canvas.toDataURL();
	},
	
	salvar: function() {
		window.open(this.exportarPng());
	},
	
	definirEstiloPadrao: function() {
		var ct = this._ct;
		
		/**
		 * Preenchimento
		 */
		//Cor do preenchimento
		ct.fillStyle = 'red';
		
		
		/**
		 * Transparência geral
		 */
		//Cor do preenchimento
		//ct.globalAlpha = 0.2;
		
		
		/**
		 * Linha
		 */
		
		//Cor do contorno
		ct.strokeStyle = 'navy';
		
		//Espessura da linha
		ct.lineWidth = 3;
		
		/***
		 * Tipo de extremidades da linha
		 * Quando o tipo for round ou square, o tamanho da linha vai ficar um pouco maior.
		 * Essa porção adicional é igual ao tamanho da largura da linha.
		 * Esses dois modelos criam uma sobra (metade do tamanho da linha para cada lado)
		 */
		ct.lineCap = 'round';
		//ct.lineCap = 'square';
		//ct.lineCap = 'butt';
		
		//Tipo de união de linha
		ct.lineJoin = 'miter'; //Pontiagudo. Quanto menor o ângulo maior a ponta
		//ct.lineJoin = 'round'; //Arredondado
		//ct.lineJoin = 'join'; //Reto
		
		
		/**
		 * Sombra
		 **/
		
		//Cor da sombra
		ct.shadowColor = 'gray';
		
		//Intensidade do desfoque da sombra
		ct.shadowBlur = 5;
		
		//Deslocamento horizontal da sombra
		ct.shadowOffsetX = 5;
		
		//Deslocamento vertical da sombra
		ct.shadowOffsetY = 5;	
		
		
		
		/**
		 * Texto
		 **/
		
		//Fonte
		ct.font = "60px Arial";
		
		//Alinhamento horizontal -  relativo ao X informado
		ct.textAlign = "left";
		//ct.textAlign = "left";
		//ct.textAlign = "right";
		//ct.textAlign = "start";
		//ct.textAlign = "end";
		
		//Alinhamento vertical
		//ct.textBaseline = "middle";
		//ct.textBaseline = "top";
		//ct.textBaseline = "hanging";
		ct.textBaseline = "alphabetic";
		//ct.textBaseline = "ideographic";
		//ct.textBaseline = "bottom";
		
		
		/**
		 * Configurações de composição
		 */
		
		ct.globalCompositeOperation = "source-over";
		//ct.globalCompositeOperation = "source-in";
		//ct.globalCompositeOperation = "source-out";
		//ct.globalCompositeOperation = "source-atop";
		//ct.globalCompositeOperation = "destination-atop";
		//ct.globalCompositeOperation = "destination-in";
		//ct.globalCompositeOperation = "destination-out";
		//ct.globalCompositeOperation = "destination-over";
		//ct.globalCompositeOperation = "lighter";
		//ct.globalCompositeOperation = "xor";
		//ct.globalCompositeOperation = "copy";
	},
	
	Estado: {
		setUp: function() {},
		
		salvar: function() {
			this._pai._ct.save();
		}, 
		
		restaurar: function() {
			this._pai._ct.restaurar();
		}
	},
	
	Desenhar: {
		setUp: function() {},
		
		mascaraIniciar: function() {
			this._pai._ct.save();
			this._pai._ct.clip();
		},
		
		mascaraFinalizar: function() {
			this._pai._ct.restore();
		},
		
		//Quadriláteros
		quadrado: function(x, y, tamanho) {
			this._pai._ct.fillRect(x, y, tamanho, tamanho);
		},
		quadradoContorno: function(x, y, tamanho) {
			this._pai._ct.strokeRect(x, y, tamanho, tamanho);
		},
		
		//Circulares
		circulo: function(x, y, raio) {
			this._pai._ct.arc(x, y, raio, 0, Math.PI*2, true);
			this._pai._ct.fill();
		},
		circuloContorno: function() {
			this._pai._ct.arc(x, y, raio, 0, Math.PI*2, true);
			this._pai._ct.stroke();
		}
	},
	
	Transformacao: {
		setUp: function() {},
		
		//Move o eixo x/y 0 do canvas, que naturalmente é top/left
		mover: function(distanciaX, distanciaY) {
			this._pai._ct.translate(distanciaX, distanciaY);
		},
		
		//Amplia o canvas nessa escala
		alterarEscala: function(x,y) {
			this._pai._ct.scale(x, y);
		},
		
		girar: function(graus) {
			var radiano = (Math.PI/180)*graus;
			this._pai._ct.rotate(radiano);
		},
		
		distorcer: function(x, y) {
			this._pai._ct.transform(1, y, x, 1, 0, 0);
		},
		
		reset: function() {
			this._pai._ct.setTransform(1, 0, 0, 1, 0, 0);
		},
		
		Flip: {
			_horizontal: false,
			_vertical: false,
			
			setUp: function() {},
			
			horizontal: function() {
				this._pai._pai._ct.scale(-1,1);
				this._horizontal = !this._horizontal;
			},
			vertical: function() {
				this._pai._pai._ct.scale(1,-1);
				this._vertical = !this._vertical;
			},
			total: function(){
				this._pai._pai._ct.scale(-1,-1);
				this._horizontal = !this._horizontal;
				this._vertical = !this._vertical;
			}
		}
	},
	
	Efeitos: {
		setUp: function() {},
		
		inverterCores: function() {
			var ct = this._pai._ct;
			var canvas = this._pai._canvas;
			
			var dadosDaImagem = ct.getImageData(0, 0, canvas.width, canvas.height);
			var dados = dadosDaImagem.data;

			for (var i = 0; i < dados.length; i += 4) {
				dados[i] = 255 - dados[i]; //Canal vermelho
				dados[i+1] = 255 - dados[i+1]; //Canal verde
				dados[i+2] = 255 - dados[i+2]; //Canal azul
			// i+3 is alpha (the fourth element)
			}
			
			// overwrite original image
			ct.putImageData(dadosDaImagem, 0, 0);
		},
		
		
		coresAleatorias:  function() {
			var ct = this._pai._ct;
			var canvas = this._pai._canvas;
			
			var dadosDaImagem = ct.getImageData(0, 0, canvas.width, canvas.height);
			var dados = dadosDaImagem.data;

			for (var i = 0; i < dados.length; i += 4) {
				dados[i] = Math.round(Math.random()*255) - dados[i]; //Canal vermelho
				dados[i+1] = Math.round(Math.random()*255) - dados[i+1]; //Canal verde
				dados[i+2] = Math.round(Math.random()*255) - dados[i+2]; //Canal azul
			// i+3 is alpha (the fourth element)
			}
			
			// overwrite original image
			ct.putImageData(dadosDaImagem, 0, 0);
		},
		
		
		pretoEBranco: function() {
			var ct = this._pai._ct;
			var canvas = this._pai._canvas;
			
			var dadosDaImagem = ct.getImageData(0, 0, canvas.width, canvas.height);
			var dados = dadosDaImagem.data;
			
			
			for (var i = 0; i < dados.length; i += 4) {
				var brilho = 0.34 * dados[i] + 0.5 * dados[i + 1] + 0.16 * dados[i + 2];
				
				dados[i] = brilho; //Canal vermelho
				dados[i+1] = brilho; //Canal verde
				dados[i+2] = brilho; //Canal azul
			// i+3 is alpha (the fourth element)
			}
			
			// overwrite original image
			ct.putImageData(dadosDaImagem, 0, 0);
		}
	},
	
	Texto: {
		setUp: function() {},
		
		//OBS: A cor do texto é a mesma que fillStyle 
		escrever: function(x, y, texto) {
			this._pai._ct.fillText(texto, x, y);
		},
		
		//OBS: A espessua da linha é a mesma definida em lineWidth
		somenteContorno: function(x, y, texto) {
			this._pai._ct.strokeText(texto, x, y);
		},
		
		escreverContorno: function(x, y, texto) {
			this.escrever(x, y, texto);
			this.somenteContorno(x, y, texto);
		},
		
		largura: function(texto) {
			var metricas = this._pai._ct.measureText(texto);
			var largura = metricas.width;
			
			return largura;
		},
		
		quebraLinha: function(x, y, larguraDoTexto, alturaDaLinha, texto) {
			var ct = this._pai._ct;
			
			//Quebra a frase em palavras
			var palavras = texto.split(" ");
			var linha = ""; //Linha em branco
		
			//Para cada palavra
			$(palavras).each(function(numero,palavra) {
				var linhaTeste = [linha,palavra].join(" "); //Vai formando uma frase teste	
				var metricas = ct.measureText(linhaTeste); //Dai mede se a frase teste 
				var larguraTeste = metricas.width; //Cabe na área determinada
				
				if(larguraTeste > larguraDoTexto) { //Escreve só o que pode
					ct.fillText(linha, x, y);
					linha = palavra;
					y += alturaDaLinha; //Quebra a linha
				} else {
					linha = linhaTeste; //Guarda o que sobrou
				}
			});
			
			ct.fillText(linha, x, y); //Escreve o que sobrou;
		}
	},
	
	Imagem: {
		setUp: function() {},
		
		mostrar: function(x, y, url) {
			var ct = this._pai._ct;
			
			var imagem = new Image();
				imagem.onload = function(){
					ct.drawImage(imagem, x, y);
				};
				imagem.src = url;
		},
		
		dimensionar: function(x, y, largura, altura, url) {
			var ct = this._pai._ct;
			
			var imagem = new Image();
				imagem.onload = function(){
					ct.drawImage(imagem, x, y, largura, altura);
				};
				imagem.src = url;
		},
		
		recorte: function(xRecorte, yRecorte, larguraRecorte, alturaRecorte, xCanvas, yCanvas, larguraFinal, alturaFinal, url) {
			var ct = this._pai._ct;
			
			var imagem = new Image();
				imagem.onload = function(){
					ct.drawImage(imagem, xRecorte, yRecorte, larguraRecorte, alturaRecorte, xCanvas, yCanvas, larguraFinal, alturaFinal);
				};
				imagem.src = url;
		}
	},
	
	Preenchimento: {
		setUp: function() {},
		
		radial: function(cores){
			var canvas = this._pai._canvas;
			var ct = this._pai._ct;

			var hCentro = canvas.width/2;
			var vCentro = canvas.height/2;

			var gradiente = ct.createRadialGradient(hCentro, vCentro, vCentro, hCentro, vCentro, canvas.height);
			
				for(var i=0; i < cores.length; i++) {
					var posicao = Math.round((i/cores.length)*100)/100;
					gradiente.addColorStop(posicao, cores[i]);
				}
			
			ct.fillStyle = gradiente;
		},
		
		padrao: function(url) {
			var canvas = this._pai._canvas;
			var ct = this._pai._ct;
		
			var imagem = new Image();
				imagem.onload = function(){
					var padrao = ct.createPattern(imagem, "repeat"); //repeat, no-repeat, repeat-x, repeat-y
					ct.rect(0, 0, canvas.width, canvas.height);   
					ct.fillStyle = padrao;
				};
				imagem.src = url;
		},
		
		Linear: {
			setUp: function() {},
			
			vertical: function(cor1, cor2) {
				var canvas	= this._pai._pai._canvas;
				var ct 		= this._pai._pai._ct;

				var gradiente = ct.createLinearGradient(0,canvas.height/2,canvas.width,canvas.height/2);
					gradiente.addColorStop(0, cor1);
					gradiente.addColorStop(1, cor2);
				
				ct.fillStyle = gradiente;
			},
		
			horizontal: function(cor1, cor2) {
				var canvas	= this._pai._pai._canvas;
				var ct 		= this._pai._pai._ct;

				var gradiente = ct.createLinearGradient(canvas.width/2,0,canvas.width/2,canvas.height);
					gradiente.addColorStop(0, cor1);
					gradiente.addColorStop(1, cor2);
				
				ct.fillStyle = gradiente;
			}
		}
	}
};

var Canvas = HTML5.Canvas;