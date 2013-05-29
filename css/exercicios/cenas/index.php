<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>

	body {
		font-family: Tahoma;
		font-size: 20px;
	}
	.stage, .cena, .pagina{
		width: 960px;
		height: 540px;
		position: absolute;
	}
	.stage {
		top: 50%;
		left: 50%;
		margin-left: -480px;
		margin-top: -270px;
		color: white;
		overflow: hidden;
	}


	.cena {
		background-color: #ccc;
		left: 100%;
	}


	#relogio {
		width: 300px;
		height: 100px;
		background-color: red;
		position: absolute;
		top: 0;
		right: 0;	
		z-index: 10;
		text-align: center;
		line-height: 100px;
		font-size: 40px;

	}


	#cena1 {
		-webkit-animation: cena1 60s infinite step-end;
		left: 0;
		background-color: red;
	}


	#cena2 {
		-webkit-animation: cena2 60s infinite step-end;
		left: 0;
		background-color: blue;
	}
	#cena3 {
		-webkit-animation: cena3 60s infinite step-end;
		left: 0;
		background-color: green;
	}

	#cena4 {
		-webkit-animation: cena4 60s infinite step-end;
		left: 0;
		background-color: yellow;
	}

	@-webkit-keyframes cena1 {
		0% {
			left: 0;
		}

		10% {
			left: 100%;
		}

		100% {
			left: 100%;
		}
	}

	@-webkit-keyframes cena2 {
		0% {
			left: 100%;
		}

		10% {
			left: 0%;
		}

		20% {
			left: 100%;
		}

		100% {
			left: 100%;
		}
	}
	@-webkit-keyframes cena3 {
		0% {
			left: 100%;
		}

		20% {
			left: 0%;
		}

		30% {
			left: 100%;
		}

		100% {
			left: 100%;
		}
	}
	@-webkit-keyframes cena4 {
		0% {
			left: 100%;
		}


		30% {
			left: 0%;
		}

		100% {
			left: 0%;
		}
	}


	</style>
</head>
<body>


	<div class="stage">
		
		<div id="relogio"><?php echo date("H:i:s"); ?></div>

		<div class="cena" id="cena1">
			<div class="pagina">
				<h1>Nome do ônibus</h1>
				<h2>Número</h2>
			</div>
		</div>
		<div class="cena" id="cena2">
			<div class="pagina">
				<img src="imagens/rota.png" alt="">
			</div>
		</div>
		<div class="cena" id="cena3">
			<div class="pagina">
				<h1>Paradas</h1>
				<ul>
					<li>Parada 1</li>
					<li>Parada 2</li>
					<li>Parada 3</li>
					<li>Parada 4</li>
					<li>Parada 5</li>
				</ul>
			</div>
		</div>
		<div class="cena" id="cena4">
			<div class="pagina">
				<h1>Pontos turísticos</h1>
			</div>
			<div class="pagina">
				<h1>Ponto turístico</h1>
				<img src="imagens/pontos/ponto1.jpg" alt="">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, facilis, dolore, eos saepe veniam voluptate quisquam dolorum molestias adipisci doloremque ex itaque dicta totam. Molestias eligendi ipsum inventore repudiandae incidunt!</p>
			</div>
			<div class="pagina"></div>
			<div class="pagina"></div>
			<div class="pagina"></div>
		</div>
	</div>
</body>
</html>