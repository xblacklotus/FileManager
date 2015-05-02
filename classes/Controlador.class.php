<?php

//para no molestarse con los nombres de las clases tanto

class Controlador {
	private $con;
	//esto lo haremos como en poo, mas ordenado 

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


	//**************** LOGIN *****************//
	public function loguearse($user,$pass)
	{
		//siempre abrir la con
		$this->abrirCon();
		//consulta
		$sql = "SELECT usuario, u.nombre, apellido,tu.nombre  from usuario as u,tipo_usuario as tu
		where u.id_tipo_usuario=tu.id_tipo_usuario and u.usuario=? and u.password=?";
		 //se prepara la consulta
		$query = $this->con->prepare($sql);
		//se pasan los parametros
		$query->bind_param("ss", $user, $pass);
		//se ejecuta la consulta
		$query->execute();
//Asociando a variables los datos solicitados en la consulta SELECT
		$query->bind_result($user, $name, $lastname,$permisos);
//Preparando las variables de sesión con los datos
//obtenidos desde la base de datos con bind_result
		while($query->fetch()){
			$_SESSION["permisos"] = $permisos;
			$_SESSION["usuario"] = $user;
			$_SESSION["nombreusr"] = $name . " " . $lastname;
		}
		$this->cerrarCon();
		//si la sesion se hizo correctamente o no
		if(count($_SESSION) > 0){
			header("Location: index.php");
		}
		else {
			session_destroy();
			header("Location: Login.php?errorusuario=si");
		}
	}
	//**************** REGISTRAR USUARIO *****************//
	public function registrarUsuario($nombre,$apellido,$user,$pass,$correo,$servicio)
	{
		$resp=false;
		//siempre abrir la con
		$this->abrirCon();
		//consulta
		$sql = "INSERT INTO usuario(nombre,apellido,usuario,password,correo,id_tipo_usuario,id_tipo_servicio)
		values(?,?,?,?,?,?,?)";
		 //se prepara la consulta
		$query = $this->con->prepare($sql);
		var_dump($query);
		//se pasan los parametros
		$tipo_usuario=2;
		$query->bind_param("sssssii", $nombre, $apellido,$user, $pass, $correo, $tipo_usuario , $servicio);
		//se ejecuta la consulta
		if($query->execute())
		{
			$resp=true;
		}
		$this->cerrarCon();
		return $resp;
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
}
?>