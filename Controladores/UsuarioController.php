<?php 
 require_once("Datos/usuariodao.php");

 class UsuarioControlador{

  public static function isNull($nombre,$apellido, $user, $pass, $pass_con, $email){
		if(strlen(trim($nombre)) < 1 || strlen(trim($apellido)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}
	
    public static function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}
	
    public static function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
    public static function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	

    public static function isNullLogin( $user, $pass){
		if( strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 )
		{
			return true;
			} else {
			return false;
		}		
	}
	
   public static function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\"></a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}

    public static function Insertar($nombre,$apellido,$correo,$usuario,$contraseña,$imagen)
    {
        $obj_usuario=new Usuarios();

        $obj_usuario->SetNombre($nombre);
        $obj_usuario->SetApellido($apellido);
        $obj_usuario->SetCorreo($correo);
        $obj_usuario->SetUsuario($usuario);
        $obj_usuario->SetContraseña($contraseña);
        $obj_usuario->SetImagen($imagen);
      
      //   $obj_usuario->SetActivo($activo);

     return   UsuariosDao::AgregarUsuarios($obj_usuario);

    }
    public static function Editar($idUsuario,$nombre,$apellido,$correo,$usuario,$contraseña,$imagen)
    {
        $obj_usuario=new Usuarios();

        $obj_usuario->SetIdUsuario($idUsuario);
        $obj_usuario->SetNombre($nombre);
        $obj_usuario->SetApellido($apellido);
        $obj_usuario->SetCorreo($correo);
        $obj_usuario->SetUsuario($usuario);
        $obj_usuario->SetContraseña($contraseña);
        $obj_usuario->SetImagen($imagen);
      
      //   $obj_usuario->SetActivo($activo);

     return   UsuariosDao::EditarUsuarios($obj_usuario);

    }
    public static function login($usuario,$password)
    {
        $obj_usuario=new Usuarios();

        $obj_usuario->SetUsuario($usuario);
        $obj_usuario->SetContraseña($password);

      return  UsuariosDao::Login($obj_usuario);
    

    }
    public static function get_usuario($usuario,$password)
    {
        $obj_usuario=new Usuarios();

        $obj_usuario->SetUsuario($usuario);
        $obj_usuario->SetContraseña($password);

      return  UsuariosDao::get_Usuario($obj_usuario);

    }
    public static function get_usuario_id($id)
    {
      return  UsuariosDao::get_Usuario_ID($id);

    }

 }

?>