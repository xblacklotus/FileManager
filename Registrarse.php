<?php include 'includes/header.inc'; ?>
<body>
	<div class="container">
		<?php include 'includes/nav.inc'; ?>

		<h2>Formulario de Registro</h2>
		<form role="form" action="index.php" method="post" >
			<blockquote>
				<div class="form-group">
					<input class="form-control input-lg" type="text" id="txtTipo" name="nombre" placeholder="Nombre" required>

				</div>
				<div class="form-group">
					<input type="text" id="txtTipo" class="form-control input-lg" name="apellido" placeholder="Apellido" required>

				</div>
				<div class="form-group">
					<input type="text" class="form-control input-lg" id="txtTipo" name="user" placeholder="Usuario" required>

				</div>
				<div class="form-group">
					<input type="password" class="form-control input-lg" id="txtTipo" name="pass" placeholder="Contraseña" required>

				</div>
				<div class="form-group">
					<input type="password"class="form-control input-lg"  id="txtTipo" name="pass1" placeholder="Confirmar Contraseña" required>

				</div>
				<div class="form-group">
					<input type="email" class="form-control input-lg" id="txtTipo" name="correo" placeholder="Correo" required>

				</div>
				<div class="form-group">
					<input type="radio" name="servicio" value="1" placeholder="" checked required>Basico
					<input type="radio" name="servicio" value="2" placeholder="" required>Estandar
					<input type="radio" name="servicio" value="2" placeholder="" required>Premium
				</div>

				<button type="submit" value="registrar" name="registrar" class="btn btn-primary btn-border btn-lg">Registrarme</button>
			</blockquote>
		</form>
		<?php include 'includes/footer.inc'; ?>
		<?php include 'includes/scripts.inc'; ?>
	</div>
</body>
</html>