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
				<h2>Ingresar Tipo Servicio</h2>
				<div class="sidebox">
					<a name="contact_form"></a>
					<form role="form" class="form-inline" action="insertarTipoServicio.php" method="post" autocomplete="off">
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
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/scripts.inc'; ?>
</body>
</html>