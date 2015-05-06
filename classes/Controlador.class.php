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
		echo "<table>\n
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
}
?>