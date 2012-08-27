<?php

	header("Content-type: text/plain; charset=utf-8");

	print_r($_POST);

	echo "Valor da variável pagina: ". $_GET['pagina']."\n\n";

	print_r($_GET);

	print_r($_SERVER);

?>