<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>Estados do Brasil</h1>

	<?php
	
		include("info.php");
		
		echo '<select name="estado" id="Estados">'; 
		for($i = 0; $i < count($estadosDoBrasil); $i++) {
			$estado = $estadosDoBrasil[$i];

			echo '<option value="'.$i.'">'.$estado.'</option>';
		}
		echo '</select>';
		foreach($estadosDoBrasil as $estado) {
			echo '<h2>'.$estado.'</h2>';
		}


	?>

	
</body>
</html>