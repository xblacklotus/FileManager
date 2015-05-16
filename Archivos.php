<?php include 'includes/header.inc'; ?>
<body>
	<div class="container">
		<?php include 'includes/nav.inc'; ?>
		<h2>Bienvenido a File Manager</h2>
		<?php
		if (isset($_FILES["archivo"]))
		{
			$cont=new Controlador1();
			$cont->subirArchivo($_POST["descripcion"]);
		}
		if(isset($_POST["eliminar"]))
		{
			$cont=new Controlador1();
			$cont->eliminarArchivo($_POST["archivo"]);
		}
		$cont=new Controlador1();
		$datos=$cont->consultarArchivos();

		if(is_array($datos))
		{


			foreach ($datos as $value) {
				?>
				<form role="form" class="form" action="archivo.php?archivo=<?php echo $value["id_archivo"]; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
					<?php echo $value["nombre"];?>
					<input type="hidden" name="nombre" value="<?php echo $value["nombre"];?>">
					<input type="hidden" name="archivo" value="<?php echo $value["id_archivo"]; ?>">
					<input type="submit" name="Subir" value="Descargar" class="btn btn-primary btn-border btn-lg"/>
					<input type="submit" name="eliminar" value="Elimnar" formaction="Archivos.php" class="btn btn-primary btn-border btn-lg"/>
				</form>
				<?php
			}
		}
		?>
		<blockquote>
			<form role="form" class="form" action="Archivos.php" method="post" autocomplete="off" enctype="multipart/form-data">
				<h2 class="form-heading">Archivo:</h2>
				<div class="form-group">
					<input type="text" name="descripcion" class="form-control input-lg" required id="txtTipo"  placeholder="Descripción">
				</div>
				<div class="form-group">
					<input type="file" name="archivo" class="form-control input-lg" required id="txtTipo"  placeholder="Archivo">
				</div>
				<input type="submit" name="Subir" value="Subir" class="btn btn-primary btn-border btn-lg"/>
			</form>
		</blockquote>
		<?php include 'includes/footer.inc'; ?>
		<?php include 'includes/scripts.inc'; ?>
	</div>
</body>
</html>