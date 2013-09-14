<?php 

// Últimos detalhes no servidor: como nossa resposta varia de acordo com o valor do Cookie, é bom colocar Vary:Cookie. 
  header("Vary: Cookie");
  // E já aproveito e coloco Expires no passado também
  header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");

  if ($_COOKIE['offline'] == 'noupdate') {
    header('HTTP/1.1 304 Not Modified');
  } elseif ($_COOKIE['offline'] == 'remove') {
    header('HTTP/1.1 404 Not Found');
  } else {

    // Content-Type correto.
    header('Content-Type: text/cache-manifest');
    include('apostila.appcache');
  }
?>