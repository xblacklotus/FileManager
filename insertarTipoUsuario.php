<?php
include('includes/header.inc');
?>
<body>
	<header>
		<h1>Resultado al agregar tipo de usuario</h1>
	</header>
	<div class="row">
		<?php
		$tusuario = trim($_POST['txtTipo']);

		if(empty($tusuario)){
			$msg = "Existen campos en el formulario sin llenar. ";
			$msg .="Regrese al formulario y llene todos los campos. <br />\n";
			$msg .="[<a href=\"TipoUsuarios.php\">Volver</a>]\n";
			echo $msg;
			exit(0);
		}
		if(!get_magic_quotes_gpc()){
			$tusuario = addslashes($tusuario);
		}

		

		$obj=new Controlador();
		$obj->agregarUsuario($tusuario);
		?>
		<br />
		<a href="TipoUsuarios.php">Agregar otro Tipo Usuario</a>
	<div>
</body>