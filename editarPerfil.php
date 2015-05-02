<?php include 'includes/header.inc'; ?>
<body>
	<?php
	function __autoload($nombre_clase) {
		include 'classes/'.$nombre_clase .'.class.php';
	}
	$id = 1;
	$obj=new Controlador();
	$perfil = $obj-> consultarPerfil($id);
	?>
	<div id="content-full">
		<div class="container cont-main">
			<div class="transparent-bg"></div>
			<div id="boxed-area" class="page-content">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="display center">
				<h2>Editar Perfil</h2>
				<div class="sidebox">
					<a name="contact_form"></a>
					<form role="form" class="form-inline" action="modificarPerfil.php" method="post" autocomplete="off">
						<div class="form-group">
							<?php
							echo "<input type='hidden' id='txtID' name='txtID' value='".$id."'";
							?>
						</div>
						<br/>
						<div class="form-group">
							Nombre:
							<?php
							echo "<input type='text' class='form-control input-lg' id='txtNombre' name='txtNombre' value='".$perfil['nombre']."'";
							?>				
						</div>
						<br/>
						<div class="form-group">
							Apellido:
							<?php
							echo "<input type='text' class='form-control input-lg' id='txtApellido' name='txtApellido' value='".$perfil['apellido']."'";
							?>
						</div>
						<br/>
						<div class="form-group">
							Usuario:
							<?php
							echo "<input type='text' class='form-control input-lg' id='txtUsuario' name='txtUsuario' value='".$perfil['usuario']."'";
							?>
						</div>
						<br/>
						<div class="form-group">
							Contraseña:
							<?php
							echo "<input type='text' class='form-control input-lg' id='txtPassWord' name='txtPassWord' value='".$perfil['password']."'";
							?>
						</div>
						<br/>
						<div class="form-group">
							Correo:
							<?php
							echo "<input type='text' class='form-control input-lg' id='txtCorreo' name='txtCorreo' value='".$perfil['correo']."'";
							?>
						</div>
						<br/>
						<button type="submit" class="btn btn-primary btn-border btn-lg">Modificar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/scripts.inc'; ?>
</body>
</html>