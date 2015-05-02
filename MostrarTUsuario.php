<?php include('includes/header.inc'); ?>
<body>
	<?php
	include('includes/nav.inc');
		//
	function __autoload($nombre_clase) {
		include 'classes/'.$nombre_clase .'.class.php';
	}

	$obj = new Controlador();
		//
		/*Si llamamos desde el frm de modificar T Usuario
		ejecutamos primero la actualizacion del registro*/
		echo "<h1>HOLAAAAAAAAA" . $_POST['guardar'];
		if(isset($_POST['guardar'])){
			echo "<h1>HOLiiiiiiiiiiii";
			//Creamos var locales con datos desde frm
			$id = isset($_GET['txtId']) ? trim($_GET['txtId']) : "";
			$nombre = isset($_GET['txtTipo']) ? trim($_GET['txtTipo']) : "";
			//Verificamos que se hayan ingresado datos
			if(empty($id) || empty($nombre)){
				$msg = "Existen campos en el formulario sin llenar. ";
				$msg .= "Regrese al formulario y llene todos los campos. <br>\n";
				$msg .= "[<a href=\"modificarTU.php?id=" . $id . "\">Volver</a>]\n";
				echo $msg;
				exit(0);
			}
			if(!get_magic_quotes_gpc()){
				$id = addslashes($id);
				$nombre = addslashes($nombre);
			}
			$obj->modificarUsuario($id, $nombre);
			echo "<h1>HOLAAAAAAAAA";
			$_GET['opc'] = "modificar";
			echo "<h1>".$_GET['opc']."</h1>";
		}
		
		if(isset($_GET['del']) && $_GET['del'] == "s"){
			$obj->eliminarUsuario($_GET['id']);
		}

		//Hacemos una consult de todos lo T Usuario
		echo "<h1>".$_GET['opc']."</h1>";
		$obj->imprimirTablaTUsuario($_GET['opc']);
		?>
		<a href="index.php">Regresar al index</a>
		<?php include('includes/footer.inc'); ?>
</body>
</html>