<?php 
require("Entidades/usuario.php");
require_once("Datos/Conexion.php");
    class UsuariosDao extends Conexion
    {
        protected static $con;

        private static function getConnection()
        {
            self::$con=Conexion::conectar();  
        }
    
        private static function desconectar()
        {
            self::$con=null;
        }

        public static function AgregarUsuarios($usuario)
        {
            $query = "insert into usuarios(nombre,apellido,correo,usuario,password) values(:nombre,:apellido,:correo,:usuario,:pass)";

            self::getConnection();
            $resultado=self::$con->prepare($query);

            $resultado->bindValue(":nombre",$usuario->GetNombre());
            $resultado->bindValue(":apellido",$usuario->GetApellido());
            $resultado->bindValue(":correo",$usuario->GetCorreo());
            $resultado->bindValue(":usuario",$usuario->GetUsuario());
            $resultado->bindValue(":pass",$usuario->GetContraseña());
          

            $resultado->execute();
        
            return  $resultado;
        }

        public static function Login($usuario)
    {
        $query="select id_usuario,nombre,apellido,correo,usuario,password from usuarios where usuario=:usuario and password=:password";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":usuario",$usuario->GetUsuario());
        $resultado->bindValue(":password",$usuario->GetContraseña());

        $resultado->execute();

        if($resultado->rowCount()>0 )
        {

            $filas=$resultado->fetch();
            if($filas['usuario']==$usuario->GetUsuario() && $filas['password']==$usuario->GetContraseña())
            {
                return true;

            }

        }

        return false;

    }

    public static function get_Usuario($usuario)
    {
        $query="select * from usuarios where usuario=:usuario and password=:password";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":usuario",$usuario->GetUsuario());
        $resultado->bindValue(":password",$usuario->GetContraseña());

        $resultado->execute();

    

            $filas=$resultado->fetch();

            $usuario=new Usuarios();

            $usuario->SetIdUsuario($filas["id_usuario"]);
            $usuario->SetNombre($filas["nombre"]);
            $usuario->SetApellido($filas["apellido"]);
            $usuario->SetCorreo($filas["correo"]);
            $usuario->SetUsuario($filas["usuario"]);
            $usuario->SetContraseña($filas["password"]);
            //$usuario->SetActivo($filas["id_tipo"]);


        return $usuario;

    }



    }

?>