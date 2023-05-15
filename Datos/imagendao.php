<?php
require("Entidades/imagen.php");
require_once("Datos/Conexion.php");
class ImagenesDao extends Conexion{
    protected static $con;


    private static function getConnection()
    {
        self::$con=Conexion::conectar();

        
    }

    private static function desconectar()
    {
        self::$con=null;
    }

    public static function AgregarImagen($img){
        $query="INSERT INTO imagenes(imagen,comentario,fecha,id_usuario) VALUES(:imagen,:comentario,NOW(),:idUsuario)";

        self::getConnection();
    
        $resultado=self::$con->prepare($query);
    
        $resultado->bindValue(":imagen",$img->GetImagen());
        $resultado->bindValue(":comentario",$img->GetComentario());
        $resultado->bindValue(":idUsuario",$img->GetIdUsuario());
      
    
            $resultado->execute();
    
    
        return  $resultado;
    }
}

?>