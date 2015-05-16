<?php include('includes/header.inc'); ?>
<body>
	<?php
	include('includes/nav.inc');

	$obj = new Controlador();
		//
		/*Si llamamos desde el frm de modificar T Servicio
		ejecutamos primero la actualizacion del registro*/
		if(isset($_POST['guardar'])){
			//Creamos var locales con datos desde frm
			//$id = isset($_GET['txtId']) ? trim($_GET['txtId']) : "";
			//$nombre = isset($_GET['txtTipo']) ? trim($_GET['txtTipo']) : "";
			$id = trim($_POST['id']);
			$nombre = trim($_POST['nombre']);
			$descripcion = trim($_POST['descripcion']);
			$capacidad = trim($_POST['capacidad']);
			$archivos_permitidos = trim($_POST['arch_perm']);
			$capacidad_archivo = trim($_POST['capa_arch']);
			$limite_diario = trim($_POST['limi_diar']);
			//Verificamos que se hayan ingresado datos
			if(empty($id) || empty($nombre) || empty($descripcion) || empty($capacidad) || empty($archivos_permitidos) || empty($capacidad_archivo) || empty($limite_diario)){
				$msg = "Existen campos en el formulario sin llenar. ";
				$msg .= "Regrese al formulario y llene todos los campos. <br>\n";
				$msg .= "[<a href=\"modificarTS.php?id=$id\">Volver</a>]\n";
				echo $msg;
				exit(0);
			}
			if(!get_magic_quotes_gpc()){
				$id = addslashes($id);
				$nombre = addslashes($nombre);
				$descripcion = addslashes($descripcion);
				$archivos_permitidos = addslashes($archivos_permitidos);
			}
			$obj->modificarTServicio($id, $nombre, $descripcion, $capacidad, $archivos_permitidos, $capacidad_archivo, $limite_diario);
			$_GET['opc'] = "modificar";
		}
		
		if(isset($_GET['del']) && $_GET['del'] == "s"){
			$obj->eliminarTServicio($_GET['id']);
		}

		//Hacemos una consult de todos lo T Usuario
		$obj->imprimirTablaTServicio($_GET['opc']);
		?>
		<a href="index.php">Regresar al index</a>
		<?php include('includes/footer.inc'); ?>
</body>
</html>