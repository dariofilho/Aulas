<?php
	$meses = explode(' ','Janeiro Fevereiro Março Abril Maio Junho Julho Agosto Setembro Outubro Novembro Dezembro');
	

	function mes($numero=1) {
		global $meses;

		$indice = $numero-1;
		return $meses[$indice];
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="">
		<label for="mes">Mês</label>
		<select name="mes" id="mes">
			<?php for($i = 0; $i < count($meses); $i++){
					echo '<option value="' . 
							($i+1) .'">'.mes($i+1).'</option>
					';
				} ?>
		</select>
	</form>


	<?php 

				for($i = 0; $i < count($meses); $i++){
echo '<h2>'.$meses[$i].'</h2>';
				}
			?>
</body>
</html>