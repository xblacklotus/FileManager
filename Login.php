<?php include 'includes/header.inc'; ?>
<body>
<div class="container">
	<?php include 'includes/nav.inc'; ?>
	<form role="form" class="form-signin" action="index.php" method="post" autocomplete="off">
	<h2 class="form-signin-heading">Acceso</h2>
		<div class="form-group">
		Usuario:
			<input type="text" class="form-control input-lg" required id="txtTipo" name="user" placeholder="Usuario">

		</div>
		<div class="form-group">
			Contraseña:
			<input type="password" class="form-control input-lg" required id="txtTipo" name="pass" placeholder="Contraseña">
		</div>
		<button type="submit" name="ingresar" value="Ingresar" class="btn btn-primary btn-border btn-lg">Ingresar</button>
	</form>
	<?php include 'includes/footer.inc'; ?>
	<?php include 'includes/scripts.inc'; ?>
	</div>
</body>
</html>