<?php
require_once("Datos/imagendao.php");
class ImagenesControlador{
    public static function AgregarImagen($imagen,$comentario,$idUsuario)
    {
        $obj_prod=new Imagenes();

        $obj_prod->SetImagen($imagen);
        $obj_prod->SetComentario($comentario);
        $obj_prod->SetIdUsuario($idUsuario);
      

        return ImagenesDao::AgregarImagen($obj_prod);


    }
    public static function EditarImagenes($imagen,$comentario)
    {
        $obj_prod=new Imagenes();

        $obj_prod->SetImagen($imagen);
        $obj_prod->SetComentario($comentario);
        

        return ImagenesDao::Editar($obj_prod);

    }
    public static function MostrarImagenes($id)
    {
        return ImagenesDao::ListarImagenes($id);
    }
    public static function eliminarImagenes($id)
    {
        $obj_prod=new Imagenes();

        $obj_prod->SetidImagen($id);

        return ImagenesDao::Eliminar($obj_prod);

    }
}
?>