<?php 
 require_once("Datos/usuariodao.php");

 class UsuarioControlador{
  
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
 }

?>