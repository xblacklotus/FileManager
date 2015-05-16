<?php


class Controlador1 {
	private $con;
	//esto lo haremos como en poo, mas ordenado 
	//aunq no es necesario los get y set 
	private $hola=1;

	function __construct() {
		//se abre lac conexion y se obtiene
		$obj=new conexion();
		$this->con=$obj->getCon();
	}

	public function cerrarCon()
	{

		if ($this->con) {
			$this->con->close();
		}
	}
	public function abrirCon()
	{
		if (!$this->con) {
			$this->__construct();
		}
	}

	function subirArchivo()
	{
		$tmp_name = $_FILES["archivo"]["tmp_name"];
		$name = $_FILES["archivo"]["name"];
		$size = $_FILES["archivo"]["size"];
		if(move_uploaded_file($tmp_name, 'files/' . $name)){
			echo "Se ha cargado correctamente el archivo " . $name . " en el
			servidor.<br />\n";
		}
		else{
			switch($_FILES['archivos']['error'][$i]){
 //No hay error, pero puede ser un ataque
				case UPLOAD_ERR_OK:
				echo "<p>Se ha producido un problema con la carga del
				archivo.</p>\n";
				break;
 //El tamaño del archivo es mayor que upload_max_filesize
				case UPLOAD_ERR_INI_SIZE:
				echo "<p>El archivo es demasiado grande, no se puede cargar.</p>\n";
				break;
 //El tamaño del archivo es mayor que MAX_FILE_SIZE
				case UPLOAD_ERR_FORM_SIZE:
				echo "<p>El archivo es demasiado grande, no se pudo cargar.</p>\n";
				break;
 //Solo se ha cargado parte del archivo
				case UPLOAD_ERR_PARTIAL:
				echo "<p>Sólo se ha cargado una parte del archivo.</p>\n";
				break;
 //No se ha seleccionado ningún archivo para subir
				case UPLOAD_ERR_NO_FILE:
				echo "<p>Debe elegir un archivo para cargar.</p>\n";
				break;
 //No hay directorio temporal
				case UPLOAD_ERR_NO_TMP_DIR:
				echo "<p>Problema con el directorio temporal. Parece que no 
				existe</p>\n";
				break;
				default:
				echo "<p>Se ha producido un problema al intentar mover el archivo "
				. $name . "</p>\n";
				break;
			}
		}
	}

	function guardarDatosArchivos()
	{
		
	}

}


?>