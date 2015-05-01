<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	function __autoload($nombre_clase) {
		include 'classes/'.$nombre_clase .'.class.php';
	}

	$obj=new Controlador();
	$obj->hacerAlgo();

	?>
</body>
</html>