<?php
	session_start(); //essencial
	require "facebook/facebook.php";
	$appInfo = array("appId"  => "172143712926866", "secret" => "327baf59c48e01a295308dc3603e71b0");
	$facebook = new Facebook($appInfo);
	$user = $facebook->getUser();

	if($user) {
		$permissions = $facebook->api("/me/permissions");
		if(!array_key_exists('publish_stream', $permissions['data'][0])) {
	        header( "Location: " . $facebook->getLoginUrl(array("scope" => "publish_stream")) );
	        exit;
	    }

      //permissões para postar em fanpages
      $permissions = $facebook->api("/me/permissions");
      if(!array_key_exists('publish_stream', $permissions['data'][0])
         ||  !array_key_exists('manage_pages', $permissions['data'][0])) {

          header( "Location: " . $facebook->getLoginUrl(array("scope" => "publish_stream, manage_pages")) );
          exit;
      }
	}
?>
<!doctype html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta charset="UTF-8">
	 <?php 
	 	if ($user) { 
      		$userInfo = $facebook->api('/' . $user); 
      		echo '<title>'.$userInfo['name'].'</title>';
      	} else {
      		echo '<title>FacePicture</title>';
      	}
 	?>
  <link rel="stylesheet" href="library/css/reset.css?<?php echo md5(rand(1,9999));?>">
	<link rel="stylesheet" href="css/style.css?<?php echo md5(rand(1,9999));?>">
</head>
<body class="homem inicio"><div id="fb-root"></div><?php 
if ($user) {  $userInfo = $facebook->api('/' . $user); ?>
  <canvas id="canvas" width="640" height="480"></canvas>
  <video id="video" width="640" height="480" autoplay class="fullscreen"></video>
  
  <div class="centralizar imagem"><img id="imagem" width="640" height="480" src="" /></div>
  <div class="centralizar pessoas homem"><img src="imagens/homem.png" class="carregando" width="640" height="480" alt="" /></div>
  <div class="centralizar pessoas mulher"><img src="imagens/mulher.png" class="carregando" width="640" height="480" alt="" /></div>
  <div id="loading"></div>
  <div id="loaded"></div>
  <script src="library/js/jquery-1.8.3.min.js"></script>
  <script src="library/js/APP.js?<?php echo md5(rand(1,9999));?>"></script>
  <script src="js/APP.Camera.js?<?php echo md5(rand(1,9999));?>"></script>
  <script src="js/APP.Usuario.js?<?php echo md5(rand(1,9999));?>"></script>
  <script>APP.iniciar();</script>
<?php } else { ?><fb:login-button>Login</fb:login-button><?php } ?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '172143712926866', // App ID
      channelUrl : '//www.denniscalazans.com/facepicture/', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
FB.Event.subscribe('auth.login', function(response) {
  window.location.reload();
});
  };
  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
</body>
</html>