<?php
include('includes/header.inc');
?>
<body>
	<div class="container">
		<?php include('includes/nav.inc'); ?>
		<h2>Resultado al agregar tipo de usuario</h2>
		<blockquote>
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
		</blockquote>
	</div>
	<?php include 'includes/footer.inc'; ?>
	<?php include 'includes/scripts.inc'; ?>
</body>