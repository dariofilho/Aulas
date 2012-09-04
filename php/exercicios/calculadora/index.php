<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	

	<form action="index.php" method="post">

		<?php 
			

			if(isset($_POST['acao'])) {

				$entrada = $_POST['entrada'];
				$atual = $_POST['atual'];
				$acao = $_POST['acao'];

				switch($acao) {
					case 'Soma': 
						$resultado = $atual + $entrada; 
					break;

					case 'Subtração': 
						$resultado = $atual - $entrada; 
					break;
					
					case 'Multiplicação': 
						$resultado = $atual * $entrada; 
					break;

					case 'Divisão': 
						$resultado = $atual / $entrada; 
					break;
				}
			} else {
				$entrada = 0;
				$atual = 0;
				$resultado = 0;
			}
		?>

		<h1>Calculadora</h1>
		<h2><?php echo $resultado; ?></h2>
		<input type="hidden" name="atual" value="<?php echo $resultado; ?>" />
		<input type="text" name="entrada" value="" />
		

		<input type="submit" name="acao" value="Soma">
		<input type="submit" name="acao" value="Subtração">
		<input type="submit" name="acao" value="Multiplicação">
		<input type="submit" name="acao" value="Divisão">
	</form>
</body>
</html>