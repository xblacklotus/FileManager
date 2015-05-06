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
	if($obj->modificarPerfil($_POST['txtID'],$_POST['txtNombre'], $_POST['txtApellido'],$_POST['txtUsuario'], $_POST['txtPassWord'], $_POST['txtCorreo'])){
		$obj->phpAlert("Perfil modificado exitosamente");
		//Recarga la pagina anterior pero no se muestra el mensaje de modificado vv
		//header("location:javascript://history.go(-1)");
	}
	else{
		$obj->phpAlert("Error al modificar");
	}
	?>
</body>
</html>