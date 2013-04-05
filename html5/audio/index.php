<!DOCTYPE HTML>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>Audio</title>
	
	<style>
	body {
		font-family: "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
		font-size: 15px;
	}
	h1 {
		background-color: gray;
	}
	
	audio {
		width: 400px;
	}
	</style>
	<script src="../../libs/jquery-1.7.1.min.js"></script>
	<script>
	
	
	$(window).bind('keyup', function(event){
		console.debug(event.type, 'Digitou: ', event.which, event);
	})
	
	$(document).ready(function(){
			
			
			$('h1').bind('mouseover mousedown mouseup mousemove mouseout click', function(event){
				console.debug(new Date().getTime()+" "+event.type)
			})
			
			//Eventos de clique nos controles
			$('.controleMeuAudio').click(function(){

					console.debug('Clicou em qualquer botão', this.id);
					
					var botaoClicado = $(this);
					var meuAudio = $("#meuAudio");
					var meuAudioDom = meuAudio.get(0);

					//Solta o som
					if(botaoClicado.is("#tocar")) {
						meuAudioDom.play();
					}

					//Para o som
					if(botaoClicado.is("#pausar")) {
						meuAudioDom.pause();
					}

					//Aumenta o volumen
					if(botaoClicado.is("#aumentarVolume")) {
						//Valida pra não estourar as caixinhas
meuAudioDom.volume = (meuAudioDom.volume < 1) ? meuAudioDom.volume + 0.1 : meuAudioDom.volume;
						
					}

					if(botaoClicado.is("#diminuirVolume")) {
						//Valida pra ir até "mudo"
						meuAudioDom.volume = (meuAudioDom.volume > 0.1) ? meuAudioDom.volume - 0.1 : 0;
					}

					//Toggle de mudo para o último volume
					if(botaoClicado.is("#mudo")) {
						meuAudioDom.muted = !meuAudioDom.muted;
					}
				})
	
	
	})
	</script>
</head>
<body>
<h1 id="tituloPrincipal">TAG Audio</h1>

<p>Simples assim!</p>
&lt;audio src="som.mp3"&gt;&lt;/audio&gt;

<h2>Atributos booleanos</h2>
<ul>
    <li>autoplay - Toca automaticamente</li>
    <li>loop - Toca novamente ao finalizar</li>
    <li>controls - Exibe controles</li>
</ul>
<audio src="audio/flo_rida_where_them_girls_at.mp3" controls></audio>

<h2>Atributo preload</h2>
<p>Valores: none | auto</p>
<audio src="audio/timbaland_pass_at_me.mp3" controls preload="auto" autobuffer></audio>

<h2>API &amp; outros formatos</h2>
<audio id="meuAudio">
	<source src="audio/timbaland_pass_at_me.mp3" type="audio/mpeg" />
	<source src="audio/som.ogg" type="audio/ogg" />
</audio>
<br />
<button class="controleMeuAudio" id="tocar">Play</button>
<button class="controleMeuAudio" id="pausar">Pausa</button>
<button class="controleMeuAudio" id="aumentarVolume">Vol +</button>
<button class="controleMeuAudio" id="diminuirVolume">Vol -</button>
<button class="controleMeuAudio" id="mudo">Mudo</button>

<h2>E se não der certo?</h2>
<audio id="meuAudio" controls>
	<source src="audio/som.mp3" type="audio/mpeg" />
	<source src="audio/som.ogg" type="audio/ogg" />
	<source src="audio/som.wav" />	
	<object type="application/x-shockwave-flash" data="player.swf?soundFile=audio/som.mp3">
		<param name="movie" value="player.swf?soundFile=audio/som.mp3">
		
		<p>I'm so sorry!!!</p>

	</object>
</audio>
<p>Descrição do áudio</p>
</body>
</html>