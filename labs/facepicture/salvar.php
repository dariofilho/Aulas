<?php
session_start(); //essencial
require "facebook/facebook.php";
$appInfo = array("appId"  => "172143712926866", "secret" => "327baf59c48e01a295308dc3603e71b0");
$facebook = new Facebook($appInfo);
$user = $facebook->getUser();
$facebook->setFileUploadSupport(true);


$quantidade = sizeof(glob("uploads/*.jpg"));

function number_pad($number,$n) {
    return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}

$numero = number_pad($quantidade+1,6);

header('Content-type: application/json');

if (isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
    $imageData=$GLOBALS['HTTP_RAW_POST_DATA'];
    $filteredData=substr($imageData, strpos($imageData, ",")+1);
    $unencodedData=base64_decode($filteredData);
    $fp = fopen('./uploads/shot_'.$numero.'.jpg', 'wb');
    fwrite( $fp, $unencodedData);
    fclose( $fp );
    $resultado = array('status'=>TRUE);
} else {
    $resultado = array('status'=>FALSE);
}

$arquivos = glob("uploads/*.jpg");
$foto = array_pop($arquivos);

if ($user) { 
  $userInfo = $facebook->api('/' . $user); 
   $resultado = array('usuario'=>$userInfo['name']);
} else {
   $resultado = array('usuario'=>'nao logado');
}


$resultado['foto'] = $foto;



if ($user) { // usuario logado
    try {
      // verifica se o usuario permitiou o aplicativo publicar fotos em seu perfil
      $permissions = $facebook->api("/me/permissions");
      
      /* obter token */

$fanpage_id = "387809854575009"; // id da fanpage oficial
//$fanpage_id = "259206330868512"; // id da fanpage de teste
      
$page_info = $facebook->api("/$fanpage_id?fields=access_token"); // solicitando o token
      $fanpage_token = $page_info['access_token']; // token


      // dados para envio da publicacao da foto
      $post_data = array(
          "message" => "Imagem criada na instalação multimídia da Unibratec Expo Design",
              "image" => '@' . realpath($foto), // localizacao da foto
              'access_token' => $fanpage_token,
      );

      // publica foto na timeline
      //$data['photo'] = $facebook->api("/me/photos", "post", $post_data);
      $data['photo'] = $facebook->api("/484631388226188/photos", "post", $post_data);
     $resultado['facebook'] = "publicou";

  } catch (FacebookApiException $e) {
      // tratamento de excecao
      echo($e);
      $user = null;

      $resultado['excessao'] = "deu erro geral";
  }
} else {
   $resultado['autenticacao'] = "usuario nao esta logado";
}


echo json_encode($resultado);


?>