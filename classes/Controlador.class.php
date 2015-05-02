<?php

//para no molestarse con los nombres de las clases tanto

class Controlador {
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
	public function hacerAlgo()
	{
		//siempre abrir la con
		$this->abrirCon();
		$sql="select * from tipo_servicio";
		$result = $this->con->query($sql);
		$row=$result->fetch_array();
 //Obteniendo el número de registros devueltos
		var_dump($row);
		//siempre cerrar la con
		$this->cerrarCon();
	}
	
	//****************Mantenimiento: Tipo de Usuarios*****************//
	public function agregarUsuario($tipoU){
		$this->abrirCon();
		$sql = "INSERT INTO tipo_usuario(nombre) ";
		$sql .= "VALUES (?)";
		$result = $this->con->prepare($sql);
		$result->bind_param("s",$tipoU);
		$result->execute();
		echo "<div>\n\t<p>\n\t\t";
		echo $result->affected_rows . " tipo usuario(s) agregado(s) a la base de datos\n";
		echo "</p>\n</div>\n";
		$result->close();
	}
	public function consultarPerfil($id)
	{
		//siempre abrir la con
		$this->abrirCon();
		$sql="select * from usuario where id =".$id."";
		//var_dump($sql);
		$result = $this->con->query($sql);
		//var_dump($result);
		$row=$result->fetch_array();
 //Obteniendo el número de registros devueltos
		//var_dump($row);
		//siempre cerrar la con
		$this->cerrarCon();
		return $row;
	}
	public function modificarPerfil($id,$nombre,$apellido,$usuario,$pass,$correo)
	{
		//siempre abrir la con
		$this->abrirCon();

		$sql="update usuario set nombre='".$nombre."', apellido='".$apellido."', usuario='".$usuario."', password='".$pass."', correo='".$correo."' where id=".$id."";
		$result = $this->con->query($sql);
		//var_dump($result);
		$this->cerrarCon();
		return $result;
	}
	public function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
}
?>