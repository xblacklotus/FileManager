<?php


class Controlador1 {
	private $con;
	//esto lo haremos como en poo, mas ordenado 
	//aunq no es necesario los get y set 
	private $hola=1;

	function __construct() {
		//se abre lac conexion y se obtiene
		$obj=new Conexion();
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

	function subirArchivo($descripcion)
	{
		$tmp_name = $_FILES["archivo"]["tmp_name"];
		$name = $_FILES["archivo"]["name"];
		$size = $_FILES["archivo"]["size"];
		if(move_uploaded_file($tmp_name, 'files/' .$_SESSION["usuario"]."/". $name)){
			if($this->guardarDatosArchivos($name,'files/' .$_SESSION["usuario"]."/".$name,$descripcion))
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

	function guardarDatosArchivos($nombre,$ruta,$descripcion)
	{
		$resp=false;
		//siempre abrir la con
		$this->abrirCon();
		//consulta
		$user=intval( $_SESSION["id_user"]);
		$sql = "INSERT INTO archivos(nombre,ruta,descripcion,id_usuario) values(?,?,?,?)";
		 //se prepara la consulta
		$query = $this->con->prepare($sql);
		//se pasan los parametros
		$query->bind_param("sssi", $nombre, $ruta,$descripcion,$user);
		//se ejecuta la consulta
		if($query->execute())
		{
			$resp=true;
		}
		$this->cerrarCon();
		return $resp;
	}

	function consultarArchivos()
	{
		$this->abrirCon();
		$sql="select nombre,id_archivo from archivos where id_usuario=".$_SESSION['id_user'];
		//var_dump($sql);
		//$query = $this->con->prepare($sql);
		//se pasan los parametros$result = $this->con->query($sql);
		$query = $this->con->query($sql);
		
		while ( $row = $query->fetch_assoc()) {
			$datos[]=$row;
		}
		//siempre cerrar la con
		$this->cerrarCon();
		return $datos;
	}

	public function getRuta($archivo)
	{
		$this->abrirCon();
		$sql="select ruta from archivos where id_archivo=".$archivo;
		//var_dump($sql);
		//$query = $this->con->prepare($sql);
		//se pasan los parametros$result = $this->con->query($sql);
		$query = $this->con->query($sql);
		$ruta=null;
		while ( $row = $query->fetch_assoc()) {
			$ruta=$row;
		}
		//siempre cerrar la con
		$this->cerrarCon();
		return $ruta;
	}
	public function getNombre($archivo)
	{
		$this->abrirCon();
		$sql="select nombre from archivos where id_archivo=".$archivo;
		//var_dump($sql);
		//$query = $this->con->prepare($sql);
		//se pasan los parametros$result = $this->con->query($sql);
		$query = $this->con->query($sql);
		$ruta=null;
		while ( $row = $query->fetch_assoc()) {
			$ruta=$row;
		}
		//siempre cerrar la con
		$this->cerrarCon();
		return $ruta;
	}
}


?>