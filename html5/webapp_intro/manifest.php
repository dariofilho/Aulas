<?php
header("Content-type: text/plain; charset=utf8");

$meusHashes = "";

$cache = array();
$cache[] = "index.html";
$cache[] = "js/jquery-1.7.2.min.js";
$cache[] = "js/APP.js";
?>CACHE MANIFEST

CACHE:
<?php
foreach($cache as $arquivo) {
	$meusHashes .= md5_file($arquivo);	
	echo $arquivo."\n";
}
?>

NETWORK:

FALLBACK:
imagens/ imagens/dennis.jpg 

#hash <?php echo md5($meusHashes); ?>