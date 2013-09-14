<?php
echo "CACHE MANIFEST \n";

$hashes = "";
$a = array();
$a[] = "teste.txt";
$a[] = "teste2.txt";

foreach ($a as $arquivo) {
	$hashes .= md5_file($arquivo);
}

echo "Versao: ".md5($hashes);

?>