<?php

$AppID          = "172143712926866";
$AppSecret      = "327baf59c48e01a295308dc3603e71b0";

require "facebook/facebook.php";
$facebook       = new Facebook( array( "appId"  => $AppID, "secret" => $AppSecret ) );
$user           = $facebook->getUser();
$UserLogado     = $facebook->getUser();
$facebook->setFileUploadSupport(true);

$arquivos = glob("uploads/*.png");
$foto = array_pop($arquivos);

if ($user) { // usuario logado
    try {
      // verifica se o usuario permitiou o aplicativo publicar fotos em seu perfil
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

      /* obter token */
      $fanpage_id = "259206330868512"; // id da fanpage
      $page_info = $facebook->api("/$fanpage_id?fields=access_token"); // solicitando o token
      $fanpage_token = $page_info['access_token']; // token


      // dados para envio da publicacao da foto
      $post_data = array(
          "message" => "Imagem criada na instalação multimídia da Unibratec Expo Design",
              "image" => '@' . realpath($foto), // localizacao da foto
              'access_token' => $fanpage_token,
      );

      // publica foto na timeline
      $data['photo'] = $facebook->api("/me/photos", "post", $post_data);
      echo "<p>Foto publicada com sucesso!</p>";

  } catch (FacebookApiException $e) {
      // tratamento de excecao
      echo($e);
      $user = null;
  }
} else {
// usuario nao logado, solicitar autenticacao
   $Params     = array (
      scope         => 'user_status, publish_stream, user_photos',
      redirect_uri  => 'http://denniscalazans.com/facepicture'
      );

   $LoginUrl   = $facebook->getLoginUrl($Params);

   header("Location: " . $LoginUrl);
}

?>