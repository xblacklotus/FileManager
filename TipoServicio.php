<?php include 'includes/header.inc'; ?>
<body>
	<div class="container">
		<?php include 'includes/nav.inc'; ?>




		<h2>Ingresar Tipo Servicio</h2>

		<form role="form"  action="insertarTipoServicio.php" method="post" autocomplete="off">
			<blockquote>
				<div class="form-group">
					<input type="text" class="form-control input-lg" id="txtTipo" name="txtTipo" placeholder="Ingresa el Tipo de Usuario">
				</div>
				<div class="form-group">
					<input type="text" name="descripcion" class="form-control input-lg" placeholder="Descripción del Tipo de Servicio" maxlength=\"200\">
				</div>
				<div class="form-group">
					<input type="text" name="capacidad" class="form-control input-lg" placeholder="Capacidad del Tipo de Servicio" maxlength="11">
				</div>
				<div class="form-group">
					<input type="text" name="arch_perm" class="form-control input-lg" placeholder="Archivos Permitidos del Tipo de Servicio" maxlength="200">
				</div>
				<div class="form-group">
					<input type="text" name="capa_arch" class="form-control input-lg" placeholder="Capacidad de archivo del Tipo de Servicio" maxlength="11" >
				</div>
				<div class="form-group">
					<input type="text" name="limi_diar" class="form-control input-lg" placeholder="Limite diario del Tipo de Servicio" maxlength="11">
				</div>
				<button type="submit" class="btn btn-primary btn-border btn-lg">Agregar</button>
			</blockquote>
		</form>
		<?php include 'includes/footer.inc'; ?>
		<?php include 'includes/scripts.inc'; ?>
	</div>  
</body>
</html>