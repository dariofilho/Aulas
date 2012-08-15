<?php
	header("Content-type: text/plain; charset=utf-8");

	$objeto = json_decode(stripslashes($_GET['json']));
	print_r($objeto);

?>