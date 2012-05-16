<!DOCTYPE HTML>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>Video</title>
	<style>
	body {
		font-family: "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
		font-size: 15px;
	}
	
	video {
		width: 400px;
	}
	</style>
	<script src="../../libs/jquery-1.7.1.min.js"></script>
	<script>
	$(document).ready(function(){
		
		//Eventos de clique nos controles
		$('.controleMeuVideo').click(function(){
				
				var botaoClicado = $(this);
				var meuVideo = $("#meuVideo");
				var meuVideoDom = meuVideo.get(0);
				
				//Solta o som
				if(botaoClicado.is("#tocar")) {
					meuVideoDom.play();
				}
				
				//Para o som
				if(botaoClicado.is("#pausar")) {
					meuVideoDom.pause();
				}
				
				//Aumenta o volumen
				if(botaoClicado.is("#aumentarVolume")) {
					//Valida pra não estourar as caxinhas
					meuVideoDom.volume = (meuVideoDom.volume < 1) ? meuVideoDom.volume + 0.1 : meuVideoDom.volume;
				}
				
				if(botaoClicado.is("#diminuirVolume")) {
					//Valida pra ir até "mudo"
					meuVideoDom.volume = (meuVideoDom.volume > 0.1) ? meuVideoDom.volume - 0.1 : 0;
				}
				
				//Toggle de mudo para o último volume
				if(botaoClicado.is("#mudo")) {
					meuVideoDom.muted = !meuVideoDom.muted;
				}
			})
	})
	</script>
</head>
<body>
<h1>TAG Video</h1>

<p>Simples assim!</p>
&lt;video src="video.m4v"&gt;&lt;/video&gt;

<h2>Atributos booleanos</h2>
<ul>
    <li>autoplay - Toca automaticamente</li>
    <li>loop - Toca novamente ao finalizar</li>
    <li>controls - Exibe controles</li>
</ul>
<video src="video/video.m4v" loop controls></video>

<h2>Atributo preload</h2>
<p>Valores: none | auto</p>
<video src="video/video.m4v" controls preload="auto" autobuffer></video>

<h2>API &amp; outros formatos</h2>
<video id="meuVideo">
	<source src="video/video.m4v" />
	<source src="video/video.mp4" />
	<source src="video/video.ogv" />
	<source src="video/video.webm" />
</video>

<br />

<button class="controleMeuVideo" id="tocar">Play</button>
<button class="controleMeuVideo" id="pausar">Pausa</button>
<button class="controleMeuVideo" id="aumentarVolume">Vol +</button>
<button class="controleMeuVideo" id="diminuirVolume">Vol -</button>
<button class="controleMeuVideo" id="mudo">Mudo</button>

<h2>E se não der certo?</h2>
<video id="meuVideo" controls>
	<source src="video/video.m4v" />
	<source src="video/video.mp4" />
	<source src="video/video.ogv" />
	<source src="video/video.webm" />
	
	<object type="application/x-shockwave-flash" data="player.swf?soundFile=video/video.m4v">
		<param name="movie" value="player.swf?soundFile=video/video.m4v">
	</object>
</video>
<p>Descrição do vídeo</p>
</body>
</html>