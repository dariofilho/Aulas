<?php
	
	header("Content-type: application/json; charset=utf-8");
	
	$frutas['tropicais'] = array('acerola', 'laranja', 'kiwi');
	$frutas['doMonte'] = array('cereja', 'framboesa', 'amora', 'morango');

	echo json_encode($frutas);
?>