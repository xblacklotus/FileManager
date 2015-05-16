<?php include 'includes/header.inc'; ?>
<body>
	<div class="container">
		<?php include 'includes/nav.inc'; ?>
		<h2>Bienvenido a File Manager</h2>
		<blockquote>
			<form role="form" class="form" action="download.php" method="post" autocomplete="off" enctype="multipart/form-data">
				<h2>
					<?php 
					if(isset($_GET["archivo"]))
					{
						$cont=new Controlador1();
						$nombre=$cont->getNombre($_GET["archivo"]);
						echo $nombre['nombre'];
						?>
					</h2>
					<input type="hidden" name="archivo" value="<?php echo $_GET["archivo"]; ?>">
					<input type="submit" name="Subir" value="Descargar" class="btn btn-primary btn-border btn-lg"/>
					
				</form>
				<?php
			}
			?>
		</blockquote>
		<?php include 'includes/footer.inc'; ?>
		<?php include 'includes/scripts.inc'; ?>
	</div>
</body>
</html>