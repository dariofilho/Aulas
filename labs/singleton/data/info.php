<?php
	header('Content-Type: application/json; charset=utf-8');
	
	$text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, officiis, libero culpa corporis nam consequuntur adipisci distinctio modi molestiae sint dolore accusamus vel illum quidem doloremque ipsum aliquid obcaecati deserunt.";
	$data = explode(" ", $text);
	$res = array("palavras"=>$data);
	echo json_encode($res);
?>
