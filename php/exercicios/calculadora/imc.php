<?php include("inc.functions.php"); ?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>Cálculo de IMC</h1>

	<form action="../../request_vars.php?minhaVariavel=valorDaVariavel" method="post">
		<?php 
			$peso = "";
			$altura = "";
			$imc = "";
			$mensagem = "Informe seu peso e altura para calcular o IMC.";

			/*
					< 18,6	Abaixo
					>= 18,6 < 25	Saudável
					>= 25 < 30	Sobrepeso
					>= 30 < 35	Obesidade Grau 1
					>= 35 < 40	Obesidade 2
					≥ 40,0	Obesidade 3

				*/

			if(isset($_REQUEST['peso']) && isset($_REQUEST['altura']) && !empty($_REQUEST['altura'])) {
				$peso = $_REQUEST['peso'];
				$altura = $_REQUEST['altura'];
				$imc = $peso / ($altura * $altura);
				$mensagem = "O seu IMC é: ".$imc;


				if($imc < 18.6) {
					$mensagem .= " - Abaixo do normal";
				} else if($imc >= 18.6 && $imc < 25) {
					$mensagem .= " - Saudável";
				} else if($imc >= 25 && $imc < 30) {
					$mensagem .= " - Sobrepeso";
				} else if($imc >= 30 && $imc < 35) {
					$mensagem .= " - Obesidade 1";
				} else if($imc >= 35 && $imc < 40) {
					$mensagem .= " - Obesidade 2";
				} else if($imc >= 40) {
					$mensagem .= " - Obesidade 3";
				}
			}
		?>
		<h2><?php echo $mensagem; ?></h2>
		<input type="text" name="peso" value="<?php echo $peso; ?>">
		<input type="text" name="altura" value="<?php echo $altura; ?>">
		<input type="submit" name="acao" value="Enviar">
	</form>
</body>
</html>

