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
				<h2>Ingresar Tipo Usuario</h2>
				<div class="sidebox">
					<a name="contact_form"></a>
					<form role="form" class="form-inline" action="insertarTipoUsuario.php" method="post" autocomplete="off">
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="txtTipo" name="txtTipo" placeholder="Ingresa el Tipo de Usuario">
						</div>
						<button type="button" class="btn btn-primary btn-border btn-lg">Agregar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/scripts.inc'; ?>
</body>
</html>