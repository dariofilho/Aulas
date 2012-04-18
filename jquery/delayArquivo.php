<?php
header("content-type: image/png");

$arquivo = file_get_contents($_SERVER['QUERY_STRING']);
sleep(10);
echo $arquivo;
?>