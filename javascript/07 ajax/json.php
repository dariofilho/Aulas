<?php
	header("Content-type: text/plain");
	$json = array();
	//$json['frutas'] = array('pera', 'uva', 'maca');
	$json['noticias'] = array();
	$json['noticias']["2345"] = array('titulo'=>"Minha noticia", "id"=>2345, "texto"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
	$json['noticias']["2346"] = array('titulo'=>"Sua noticia", "id"=>2346, "texto"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
	
//echo "Deu erro!";		

echo json_encode($json);

//sleep(3);
?>