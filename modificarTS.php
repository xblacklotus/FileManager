<?php include('includes/header.inc'); ?>
<body>
	<?php
	include('includes/nav.inc');
		//
	$db = new Controlador();
	$db->modTS($_GET['id']);
	?>
	<a href="MostrarTServicio.php?opc=modificar" target="_self" title="Modificar Tipo Servicio">Volver</a>
	<?php include 'includes/scripts.inc'; ?>
	<?php include('includes/footer.inc'); ?>
</body>