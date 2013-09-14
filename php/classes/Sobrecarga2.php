<?php
//Ajuda a exibir o resultado como texto, e não como HTML
header("Content-type: text/plain; charset=utf-8");

function contarParametros() {

	echo "Quantidade de parâmetros: ".func_num_args();
}
contarParametros("Chico e as Cidades", "R$ 42,90");

/* Será apresentado na tela:

Quantidade de parâmetros: 2
*/
?>
