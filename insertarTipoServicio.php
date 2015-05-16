<?php
include('includes/header.inc');
?>
<body>
	<div class="container">
		<?php include('includes/nav.inc'); ?>

		<h2>Resultado al agregar tipo de servicio</h2>
		<blockquote>
			<?php
			$ts = trim($_POST['txtTipo']);
			$descripcion = trim($_POST['descripcion']);
			$capacidad = trim($_POST['capacidad']);
			$archivos_permitidos = trim($_POST['arch_perm']);
			$capacidad_archivo = trim($_POST['capa_arch']);
			$limite_diario = trim($_POST['limi_diar']);

			if(empty($ts) || empty($descripcion) || empty($capacidad) || empty($archivos_permitidos) || empty($capacidad_archivo) || empty($limite_diario)){
				$msg = "Existen campos en el formulario sin llenar. ";
				$msg .="Regrese al formulario y llene todos los campos. <br />\n";
				$msg .="[<a href=\"TipoServicio.php\">Volver</a>]\n";
				echo $msg;
				exit(0);
			}
			if(!get_magic_quotes_gpc()){
				$ts = addslashes($ts);
				$descripcion = addslashes($descripcion);
				$archivos_permitidos = addslashes($archivos_permitidos);
			}

			

			$obj=new Controlador();
			$obj->agregarTServicio($ts, $descripcion, $capacidad, $archivos_permitidos, $capacidad_archivo, $limite_diario);
			?>
			<br />
			<a href="TipoServicio.php">Agregar otro Tipo Usuario</a>
		</blockquote>
		<?php include 'includes/footer.inc'; ?>
		<?php include 'includes/scripts.inc'; ?>
	</div>

</body>