<?php
require_once("Datos/imagendao.php");
class ImagenesControlador{
    public static function agregar_prod($imagen,$comentario,$idUsuario)
    {
        $obj_prod=new Imagenes();

        $obj_prod->SetImagen($imagen);
        $obj_prod->SetComentario($comentario);
        $obj_prod->SetIdUsuario($idUsuario);
      

        return ImagenesDao::AgregarImagen($obj_prod);

    }
}
?>