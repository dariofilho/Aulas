<?php
session_start(); //essencial
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<meta charset="utf-8">
<head>
	<title>Projeto DMU</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/script.js"></script>
	<script type="text/javascript" src="js/tracking.js"></script>
	<script type="text/javascript" src="js/tracker/color.js"></script>
</head>
<body>
	<div id="cont-load">
		<div id="load"></div>
	</div>
	<div id="cont-flash"></div>
	<img id="cont-mascara" src="imagens/homem.png" />
	<video id="camera" autoplay></video>
	<div id="screen-shot"></div>
	<canvas id="cont-canvas" width="525" height="393" style="display:none;"></canvas>
	<div id="esconder-video"></div>
	<div id="container-php">
		<?php 

	        $AppID          = "172143712926866";
	        $AppSecret      = "327baf59c48e01a295308dc3603e71b0";

	        require "facebook/facebook.php";

	        $facebook       = new Facebook( array( "appId"  => $AppID, "secret" => $AppSecret ) );

	        $user  = $facebook->getUser();

	        $UserLogado     = $facebook->getUser();


	        if($UserLogado)
	        {

	            $UID    = $UserLogado;
	            $user   = $facebook->api('/me'); 
	            $logoutUrl = $facebook->getLogoutUrl(); 



	        }else{

	            $Params     = array (
	              scope         => 'user_status, publish_stream, user_photos',
	              redirect_uri  => 'http://pires.denniscalazans.com/index.php'
	              );

	            $LoginUrl   = $facebook->getLoginUrl($Params);

	            header("Location: " . $LoginUrl);

	        }

	     ?>
 	</div>
</body>
</html>