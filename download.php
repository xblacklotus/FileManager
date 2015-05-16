<?php
if(isset($_POST["archivo"]))
{
	$archivo= $_POST["archivo"];
	function __autoload($nombre_clase) {
		include 'classes/'.$nombre_clase .'.class.php';
	}
	$cont=new Controlador1();
	$file=$cont->getRuta($archivo);
	if(isset($file["ruta"]))
	{
		$file=$file["ruta"];
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
		else
			header("location:javascript://history.go(-1)");	
	}
	else
		header("location:javascript://history.go(-1)");
	
}

?>