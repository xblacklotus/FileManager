<?php
class Usuario {

	public function __construct($user,$pass)
	{
		$this->user=$user;
		$this->pass=$pass;
	}
	private $id,
			$nombre,
			$apellido,
			$user,
			$pass,
			$correo,
			$tipo_usuario,
			$tipo_servicio;
	public function id()
	{
		return $this->id;
	}
	public function nombre()
	{
		return $this->nombre;
	}
	public function apellido()
	{
		return $this->apellido;
	}
	public function user()
	{
		return $this->user;
	}
	public function pass()
	{
		return $this->pass;
	}
	public function correo()
	{
		return $this->correo;
	}
	public function tipo_usuario()
	{
		return $this->tipo_usuario;
	}
	public function tipo_servicio()
	{
		return $this->tipo_servicio;
	}

	public function setId($id)
	{
		$this->id=$id;
	}
	public function setNombre($nombre)
	{
		$this->nombre=$nombre;
	}
	public function setApellido($apellido)
	{
		$this->apellido=$apellido;
	}
	public function setUser($user)
	{
		$this->user=$user;
	}
	public function setPass($pass)
	{
		$this->pass=$pass;
	}
	public function setCorreo($correo)
	{
		$this->correo=$correo;
	}
	public function setTipo_usuario($tipo_usuario)
	{
		$this->tipo_usuario=$tipo_usuario;
	}
	public function setTipo_servicio($tipo_servicio)
	{
		$this->tipo_servicio=$tipo_servicio;
	}
}
?>