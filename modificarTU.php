<?php include('includes/header.inc'); ?>
<body>
	<?php
	include('includes/nav.inc');
		//
	$db = new Controlador();
	$db->modTU($_GET['id']);
	?>
	<a href="MostrarTUsuario.php?opc=modificar" target="_self" title="Modificar Tipo Usuario">Volver</a>
	<?php include('includes/footer.inc'); ?>
</body>