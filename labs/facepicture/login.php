<?php
	
	session_start(); //essencial
	$AppID          = "172143712926866";
	$AppSecret      = "327baf59c48e01a295308dc3603e71b0";

	require "facebook/facebook.php";

	$facebook = new Facebook(array("appId"  => $AppID, "secret" => $AppSecret));
	$UserLogado     = $facebook->getUser();

	print_r($facebook);

	var_dump($facebook->getUser());
	if($UserLogado)
	{

	    $UID    = $UserLogado;
	    $user   = $facebook->api('/me'); 
	    $logoutUrl = $facebook->getLogoutUrl(); 

	    header("Location: /facepicture/?logado");

	}else{

	    $Params     = array (
	      scope         => 'user_status, publish_stream, user_photos',
	      redirect_uri  => 'http://denniscalazans.com/facepicture/?depoisDeLogar'
	      );

	    $LoginUrl   = $facebook->getLoginUrl($Params);

	   header("Location: " . $LoginUrl);

	}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Projeto Expo - DMUL</title>
</head>
<body>
	Você não está logado no Facebook.
</body>
</html>