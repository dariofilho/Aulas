<?php 

include("../includes/inc.date.php");

?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	

	<label for="mes">Mês</label>
	<select name="mes" id="mes">
		<?php 
			for($i=1; $i <= 12; $i++) {
				echo '<option value="'.$i.'">'.mes($i).'</option>'; 
			}
		?>
	</select>

	<?php 

	foreach($mesesDoAnoArray as $mesNumero => $mesNome) {
		echo '<h1>'.++$mesNumero.' - '.$mesNome.'</h1>';
	}

	?>
</body>
</html>





