<?php 
class Usuarios{
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $usuario;
    private $contraseña;
    private $activo;

    public function GetIdUsuario(){
		return $this->idUsuario;  
	}

	public function SetIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

    public function GetNombre(){
        return $this->nombre;
    }
    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }
    public function GetApellido(){
        return $this->apellido;
    }
    public function SetApellido($apellido){
        $this->apellido = $apellido;
    }

    public function GetCorreo(){
        return $this->correo;
    }
    public function SetCorreo($correo){
        $this->correo = $correo;
    }
    public function GetUsuario(){
        return $this->usuario;
    }
    public function SetUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function GetContraseña(){
        return $this->contraseña;
    }
    public function SetContraseña($contraseña){
        $this->contraseña = $contraseña;
    }
    public function GetActivo(){
        return $this->activo;
    }
    public function SetActivo($activo){
        $this->activo = $activo;
    }


}
?>