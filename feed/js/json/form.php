<?php

header("Content-type: text/json");

//print_r($_POST);

$remetente = $_POST['nome'];
$email = $_POST['email'];
$msg = $_POST['mensagem'];

$res = mail("", 'Mensagem do site', $mensagem, "From: $remetente <$email>");

if($res) {
	echo '{"status":"true","mensagem": "A sua mensagem foi enviada."}';	
} else {
	echo '{"status":"false","mensagem": "A sua mensagem não pode ser enviada."}';
}

sleep(5);
?>