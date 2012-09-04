<?php
	
	header("Content-type: text/plain; charset=utf-8");

	//print_r($_POST);
	
	//Rementente
	$remetenteEmail = $_POST['email'];
	$remetenteNome = $_POST['nome'];
	$remetenteTwitter = $_POST['twitter'];
	$remetenteMensagem = $_POST['mensagem'];

	//Destinatário
	$destinararioNome = "Dennis Calazans";
	$destinararioEmail = "denniscalazans@gmail.com";
	$corpoDaMensagem = "Dados do formulário: \n\n";

	$camposDeErro = array();

	foreach($_POST as $nomeDoCampo => $valorDoCampo) {
		$corpoDaMensagem .= "$nomeDoCampo: $valorDoCampo \n";

		if(empty($valorDoCampo)) {
			array_push($camposDeErro, $nomeDoCampo);
		}
	}

	if($camposDeErro) {
		echo "Você precisa preencher os campos: ";
		echo implode(', ',$camposDeErro);
	} else {
		$para = "$destinararioNome <$destinararioEmail>";
		$assunto = "Contato do site de $remetenteNome";
		$de = "$remetenteNome <$remetenteEmail>";
		mail($para, $assunto, $corpoDaMensagem, "From: $de");
		header("Location: formulario.html");
	}

?>