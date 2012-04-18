<?
header("Content-type: text/plain");

$arquivos = glob("arquivos/*.txt");
//print_r($arquivos);

foreach($arquivos as $arquivo) {
	$conteudo = file_get_contents($arquivo);
	echo $conteudo. "\n\n";
}
?>
