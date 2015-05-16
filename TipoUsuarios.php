<?php include 'includes/header.inc'; ?>
<body>
	<div class="container">
		<?php include 'includes/nav.inc'; ?>

		<h2>Ingresar Tipo Usuario</h2>

		<form role="form" class="form-inline" action="insertarTipoUsuario.php" method="post" autocomplete="off">
			<blockquote>
				<div class="form-group">
					<input type="text" class="form-control input-lg" id="txtTipo" name="txtTipo" placeholder="Ingresa el Tipo de Usuario">
				</div>
				<button type="submit" class="btn btn-primary btn-border btn-lg">Agregar</button>
			</form>
		</blockquote>
		<?php include 'includes/footer.inc'; ?>
		<?php include 'includes/scripts.inc'; ?>
	</div>


</body>
</html>