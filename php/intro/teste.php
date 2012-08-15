<?php
  header("Content-type: text/plain; charset=utf-8");
  
  function soma($a, $b) {
    $resultado = $a + $b;
    $texto = "\nO resultado da soma de $a + $b  é: " . $resultado;
    echo $texto;
  }

  soma(1,2);
  soma(1,5);

?>