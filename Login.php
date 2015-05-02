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
				asfasf
				<div class="sidebox">
					<a name="contact_form"></a>
					<form role="form" class="form-inline" action="index.php" method="post" autocomplete="off">
						<div class="form-group">
							<input type="text" class="form-control input-lg" required id="txtTipo" name="user" placeholder="Usuario">
							<input type="password" class="form-control input-lg" required id="txtTipo" name="pass" placeholder="Contraseña">
						</div>
						<button type="submit" name="ingresar" value="Ingresar" class="btn btn-primary btn-border btn-lg">Ingresar</button>
					</form>
					
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/scripts.inc'; ?>
</body>
</html>