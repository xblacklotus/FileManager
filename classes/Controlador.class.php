<?php

//para no molestarse con los nombres de las clases tanto

class Controlador {
	private $con;
	//esto lo haremos como en poo, mas ordenado 
	//aunq no es necesario los get y set 

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
		$sql = "SELECT usuario, u.nombre, apellido,tu.nombre,id  from usuario as u,tipo_usuario as tu
		where u.id_tipo_usuario=tu.id_tipo_usuario and u.usuario=? and u.password=?";
		 //se prepara la consulta
		$query = $this->con->prepare($sql);
		//se pasan los parametros
		$query->bind_param("ss", $user, $pass);
		//se ejecuta la consulta
		$query->execute();
//Asociando a variables los datos solicitados en la consulta SELECT
		$query->bind_result($user, $name, $lastname,$permisos,$id);
//Preparando las variables de sesión con los datos
//obtenidos desde la base de datos con bind_result
		while($query->fetch()){
			$_SESSION["permisos"] = $permisos;
			$_SESSION["usuario"] = $user;
			$_SESSION["id_user"] = $id;
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
		$sql="select * from tipo_servicio";
		$result = $this->con->query($sql);
		$row=$result->fetch_array();
 //Obteniendo el número de registros devueltos
		//siempre cerrar la con
		$this->cerrarCon();
		return $resp;
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
		$sql="update usuario set nombre='".$nombre."', apellido='".$apellido."', usuario='".$usuario."', password='".$pass."', correo='".$correo."' where id=".$id."";
		$result = $this->con->query($sql);
		//var_dump($result);
		$this->cerrarCon();
		return $result;
	}
	public function phpAlert($msg) {
		echo '<script type="text/javascript">alert("' . $msg . '")</script>';
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

	public function eliminarUsuario($id){
		$this->abrirCon();
		$sql = "DELETE FROM tipo_usuario WHERE id_tipo_usuario = '" . $id . "'";
		$resultc = $this->con->query($sql);
		$num_results = $this->con->affected_rows;
		echo "Se ha eliminado " .$num_results." registros con id = [" . $id . "]<br/>";
	}

	public function modificarUsuario($id, $nombre){
		$this->abrirCon();
		$sql = "UPDATE tipo_usuario SET nombre = '" . $nombre . "' WHERE id_tipo_usuario = '" .$id. "'";
		$resultc = $this->con->query($sql);
		$num_results = $this->con->affected_rows;
		echo "<div class=\"query\">\n\t<p>";
		echo "\t\t" . $num_results . " fila(s) actualizada(s)\n";
		echo "\t</p>\n</div>\n";
	}

	public function imprimirTablaTUsuario($opc){
		$this->abrirCon();
		$sql = "SELECT * FROM tipo_usuario ORDER BY nombre";
		$result = $this->con->query($sql);
		$num_res = $result->num_rows;
		//Imprimimos la taaaaaaabla
		echo "<table class='table'>\n
		\t<thead>\n
		\t\t<tr>\n
		\t\t\t<th>ID</th>\n
		\t\t\t<th>TIPO USUARIO</th>\n
		\t\t\t<th>ACCIÓN</th>\n
		\t\t</tr>\n
		\t</thead>\n
		\t<tbody>\n";
		while($row = $result->fetch_assoc()){
			echo "\t\t<tr>\n";
			echo "\t\t\t<td>\n";
			echo "\t\t\t\t" . $row['id_tipo_usuario'] . "\n";
			echo "\t\t\t</td>\n\t\t\t\t<td>\n";
			echo "\t\t\t\t" . stripslashes($row['nombre']) . "\n";
			echo "\t\t\t</td>\n\t\t\t<td align=\"center\">\n";
			echo "\t\t\t\t[<a href=\"" . $opc . "TU.php?id=" . $row['id_tipo_usuario'] . "\">\n";
			echo "\t\t\t\t\t" . $opc . "\n";
			echo "\t\t\t\t</a>]\n";
			echo "\t\t\t</td>\n\t\t</tr>\n";
		}
		echo "\t</tbody>\n";
		echo "\t<tfoot>\n";
		echo "\t\t<tr>\n";
		echo "\t\t\t<th colspan=\"3\">\n";
		//Mostrando el número total de registros de la tabla 
		echo "\t\t\t\tNúmero de registros: " . $num_res . "\n";
		echo "\t\t\t</th>\n";
		echo "\t</tr>\n";
		echo "\t</tfoot>\n";
		echo "</table>\n";
	}

	public function modTU($id){
		$this->abrirCon();
		$sql = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario = '" . $id . "'";
		$result = $this->con->query($sql);
		$num_res = $result->num_rows;
		$row = $result->fetch_assoc();
		echo "<div class=\"row\">
		<div class=\"col-lg-12\">
			<div class=\"display center\">
				<h2>Modificar Tipo Usuario</h2>
				<div class=\"sidebox\">		
					<a name=\"contact_form\"></a>
					<form action=\"MostrarTUsuario.php?id=$id\" method=\"POST\" role=\"form\" class=\"form-inline\">
						<div class=\"form-group\">
							<input type=\"text\" name=\"id\" class=\"form-control input-lg\"  placeholder=\"ID Tipo de Usuario\" maxlength=\"2\" value=\"$id\">
						</div>
						<div class=\"form-group\">
							<input type=\"text\" name=\"tpo\" class=\"form-control input-lg\" placeholder=\"Ingresa el Tipo de Usuario\" maxlength=\"20\" value=\"" . $row['nombre'] ."\">
						</div>

						<input type=\"submit\" name=\"guardar\" value=\"Guardar\" />
					</form>
				</div>
			</div>
		</div>
	</div>";
}

public function elmTU($id){
	$this->abrirCon();
	$sql = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario = '" . $id . "'";
	$result = $this->con->query($sql);
	$row = $result->fetch_assoc();
	$msg = "<script text=\"text/javascript\">\n";
	$preg = "Deseas eliminar el tipo de usuario de: id = ";
	$preg .= "id = " . $row['id_tipo_usuario'] . ",";
	$preg .= "nombre = " . $row['nombre'] . ".";
	$msg .= "if(confirm(\"" . $preg . "\")){";
	$msg .= "location.href=\"mostrarTUsuario.php?opc=eliminar&del=s&id=" . $id . "\";}";
	$msg .= "else{location.href=\"mostrarTUsuario.php?opc=eliminar&del=n\";}</script>";
	echo utf8_decode($msg);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//****************Mantenimiento: Tipo de Servicios*****************//
public function agregarTServicio($tipoS, $descr, $capac, $arch_perm, $capa_arch, $limi_diar){
	$this->abrirCon();
	$sql = "INSERT INTO tipo_servicio(nombre, descripcion, capacidad, archivos_permitidos, capacidad_archivo, limite_diario) ";
	$sql .= "VALUES (?,?,?,?,?,?)";
	$result = $this->con->prepare($sql);
	$result->bind_param("ssisii",$tipoS, $descr, $capac, $arch_perm, $capa_arch, $limi_diar);
	$result->execute();
	echo "<div>\n\t<p>\n\t\t";
	echo $result->affected_rows . " tipo servicio(s) agregado(s) a la base de datos\n";
	echo "</p>\n</div>\n";
	$result->close();
}

public function eliminarTServicio($id){
	$this->abrirCon();
	$sql = "DELETE FROM tipo_servicio WHERE id_tipo_servicio = '" . $id . "'";
	$resultc = $this->con->query($sql);
	$num_results = $this->con->affected_rows;
	echo "Se ha eliminado " .$num_results." registros con id = [" . $id . "]<br/>";
}

public function modificarTServicio($id, $nombre , $descr, $capac, $arch_perm, $capa_arch, $limi_diar){
	$this->abrirCon();
	$sql = "UPDATE tipo_servicio SET nombre = '" . $nombre . "' , descripcion = '" . $descr . "', capacidad = '" . $capac . "' , archivos_permitidos = '" . $arch_perm . "' , capacidad_archivo = '" . $capa_arch . "' , limite_diario = '" . $limi_diar . "' WHERE id_tipo_servicio = '" .$id. "'";
	$resultc = $this->con->query($sql);
	$num_results = $this->con->affected_rows;
	echo "<div class=\"query\">\n\t<p>";
	echo "\t\t" . $num_results . " fila(s) actualizada(s)\n";
	echo "\t</p>\n</div>\n";
}

public function imprimirTablaTServicio($opc){
	$this->abrirCon();
	$sql = "SELECT * FROM tipo_servicio ORDER BY nombre";
	$result = $this->con->query($sql);
	$num_res = $result->num_rows;
		//Imprimimos la taaaaaaabla
	echo "<table class='table'>\n
	\t<thead>\n
	\t\t<tr>\n
	\t\t\t<th>ID</th>\n
	\t\t\t<th>TIPO SERVICIO</th>\n
	\t\t\t<th>DESCRIPCION</th>\n
	\t\t\t<th>CAPACIDAD</th>\n
	\t\t\t<th>ARCHIVOS PERMITIDOS</th>\n
	\t\t\t<th>CAPACIDAD ARCHIVO</th>\n
	\t\t\t<th>LIMITE DIARIO</th>\n
	\t\t\t<th>ACCIÓN</th>\n
	\t\t</tr>\n
	\t</thead>\n
	\t<tbody>\n";
	while($row = $result->fetch_assoc()){
		echo "\t\t<tr>\n";
		echo "\t\t\t<td>\n";
		echo "\t\t\t\t" . $row['id_tipo_servicio'] . "\n";
		echo "\t\t\t</td>\n\t\t\t\t<td>\n";
		echo "\t\t\t\t" . stripslashes($row['nombre']) . "\n";
		echo "\t\t\t</td>\n\t\t\t\t<td>\n";
		echo "\t\t\t\t" . stripslashes($row['descripcion']) . "\n";
		echo "\t\t\t</td>\n\t\t\t<td>GB\n";
		echo "\t\t\t\t" . $row['capacidad'] . "\n";
		echo "\t\t\t</td>\n\t\t\t<td>\n";
		echo "\t\t\t\t" . stripslashes($row['archivos_permitidos']) . "\n";
		echo "\t\t\t</td>\n\t\t\t<td>MB\n";
		echo "\t\t\t\t" . $row['capacidad_archivo'] . "\n";
		echo "\t\t\t</td>\n\t\t\t<td>\n";
		echo "\t\t\t\t" . $row['limite_diario'] . "\n";
		echo "\t\t\t</td>\n\t\t\t<td align=\"center\">\n";
		echo "\t\t\t\t[<a href=\"" . $opc . "TS.php?id=" . $row['id_tipo_servicio'] . "\">\n";
		echo "\t\t\t\t\t" . $opc . "\n";
		echo "\t\t\t\t</a>]\n";
		echo "\t\t\t</td>\n\t\t</tr>\n";
	}
	echo "\t</tbody>\n";
	echo "\t<tfoot>\n";
	echo "\t\t<tr>\n";
	echo "\t\t\t<th colspan=\"8\">\n";
		//Mostrando el número total de registros de la tabla 
	echo "\t\t\t\tNúmero de registros: " . $num_res . "\n";
	echo "\t\t\t</th>\n";
	echo "\t</tr>\n";
	echo "\t</tfoot>\n";
	echo "</table>\n";
}

public function modTS($id){
	$this->abrirCon();
	$sql = "SELECT * FROM tipo_servicio WHERE id_tipo_servicio = '" . $id . "'";
	$result = $this->con->query($sql);
	$num_res = $result->num_rows;
	$row = $result->fetch_assoc();
	echo "<div class=\"row\">
	<div class=\"col-lg-12\">
		<div class=\"display center\">
			<h2>Modificar Tipo Servicio</h2>
			<div class=\"sidebox\">		
				<a name=\"contact_form\"></a>
				<form action=\"MostrarTServicio.php?id=$id\" method=\"POST\" role=\"form\" class=\"form-inline\">
					<div class=\"form-group\">
						<input type=\"text\" name=\"id\" class=\"form-control input-lg\"  placeholder=\"ID Tipo de Servicio\" maxlength=\"2\" value=\"$id\">
					</div>
					<div class=\"form-group\">
						<input type=\"text\" name=\"nombre\" class=\"form-control input-lg\" placeholder=\"Nombre del Tipo de Servicio\" maxlength=\"20\" value=\"" . $row['nombre'] ."\">
					</div>
					<div class=\"form-group\">
						<input type=\"text\" name=\"descripcion\" class=\"form-control input-lg\" placeholder=\"Descripción del Tipo de Servicio\" maxlength=\"200\" value=\"" . $row['descripcion'] ."\">
					</div>
					<div class=\"form-group\">
						<input type=\"text\" name=\"capacidad\" class=\"form-control input-lg\" placeholder=\"Capacidad del Tipo de Servicio\" maxlength=\"11\" value=\"" . $row['capacidad'] ."\">
					</div>
					<div class=\"form-group\">
						<input type=\"text\" name=\"arch_perm\" class=\"form-control input-lg\" placeholder=\"Archivos Permitidos del Tipo de Servicio\" maxlength=\"200\" value=\"" . $row['archivos_permitidos'] ."\">
					</div>
					<div class=\"form-group\">
						<input type=\"text\" name=\"capa_arch\" class=\"form-control input-lg\" placeholder=\"Capacidad de archivo del Tipo de Servicio\" maxlength=\"11\" value=\"" . $row['capacidad_archivo'] ."\">
					</div>
					<div class=\"form-group\">
						<input type=\"text\" name=\"limi_diar\" class=\"form-control input-lg\" placeholder=\"Limite diario del Tipo de Servicio\" maxlength=\"11\" value=\"" . $row['limite_diario'] ."\">
					</div>
					<input type=\"submit\" name=\"guardar\" value=\"Guardar\" />
				</form>
			</div>
		</div>
	</div>
</div>";
}

public function elmTS($id){
	$this->abrirCon();
	$sql = "SELECT * FROM tipo_servicio WHERE id_tipo_servicio = '" . $id . "'";
	$result = $this->con->query($sql);
	$row = $result->fetch_assoc();
	$msg = "<script text=\"text/javascript\">\n";
	$preg = "Deseas eliminar el tipo de servicio :";
	$preg .= "id = " . $row['id_tipo_servicio'] . ",";
	$preg .= "nombre = " . $row['nombre'] . ",";
	$preg .= "descripcion = " . $row['descripcion'] . ",";
	$preg .= "capacidad = " . $row['capacidad'] . ",";
	$preg .= "archivos_permitidos = " . $row['archivos_permitidos'] . ",";
	$preg .= "capacidad_archivo = " . $row['capacidad_archivo'] . ",";
	$preg .= "limite_diario = " . $row['limite_diario'] . ".";
	$msg .= "if(confirm(\"" . $preg . "\")){";
	$msg .= "location.href=\"mostrarTServicio.php?opc=eliminar&del=s&id=" . $id . "\";}";
	$msg .= "else{location.href=\"mostrarTServicio.php?opc=eliminar&del=n\";}</script>";
	echo utf8_decode($msg);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}
?>