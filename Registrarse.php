<?php include 'includes/header.inc'; ?>
<body>
	<?php include 'includes/nav.inc'; ?>
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
				<h3>Datos</h3>
				<div class="sidebox">

					<a name="contact_form"></a>

					<form role="form" class="form-inline" action="index.php" method="post" >
						<div class="form-group">
							<input type="text" id="txtTipo" name="nombre" placeholder="Nombre" required>
							<br/>
							<input type="text" id="txtTipo" name="apellido" placeholder="Apellido" required>
							<br/>
							<input type="text" id="txtTipo" name="user" placeholder="Usuario" required>
							<br/>
							<input type="password" id="txtTipo" name="pass" placeholder="Contraseña" required>
							<br/>
							<input type="password" id="txtTipo" name="pass1" placeholder="Confirmar Contraseña" required>
							<br/>
							<input type="email" id="txtTipo" name="correo" placeholder="Correo" required>
							<br/>
							<input type="radio" name="servicio" value="1" placeholder="" checked required>Basico
							<input type="radio" name="servicio" value="2" placeholder="" required>Estandar
							<input type="radio" name="servicio" value="2" placeholder="" required>Premium
						</div>
						<br/>
						<button type="submit" value="registrar" name="registrar" class="btn btn-primary btn-border btn-lg">Registrarme</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/scripts.inc'; ?>
</body>
</html>