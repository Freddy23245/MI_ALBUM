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

    public static function ListarImagenes($id)
    {
        $query="Select idImagen,imagen,comentario,fecha from imagenes where id_usuario = :id_usuario";
  
        self::getConnection();
  
        $resultado=self::$con->prepare($query);
        
        $resultado->bindValue(":id_usuario",$id);

        $resultado->execute();
  
        $filas = $resultado->fetchAll();
  
        return $filas;
  
    }

    public static function Editar($img)
    {

        $query = "update imagenes set imagen =:imagen,comentario = :comentario where idImagen = :idImagen";

        self::getConnection();

        $resultado = self::$con->prepare($query);

        $resultado->bindValue(":idImagen",$img->GetidImagen());
        $resultado->bindValue(":imagen",$img->GetImagen());
        $resultado->bindValue(":comentario",$img->GetComentario());

        $resultado->execute();
    }

    public static function Eliminar($id)
    {

        $query = "delete from imagenes where idImagen = :idImagen";

        self::getConnection();

        $resultado = self::$con->prepare($query);

        $resultado->bindValue(":idImagen",$id);

        $resultado->execute();
    }

    public static function get_Imagen($id)
    {
        $query="Select idImagen,imagen,comentario from imagenes where idImagen= :id";
  
        self::getConnection();
  
        $resultado=self::$con->prepare($query);
        
        $resultado->bindValue(":id",$id);

        $resultado->execute();
  
        $filas = $resultado->fetch();
        
        $imagen = new Imagenes();

        $imagen->SetidImagen($filas['idImagen']);
        $imagen->SetImagen($filas['imagen']);
        $imagen->SetComentario($filas['comentario']);

        return $imagen;
  
    }


}

?>