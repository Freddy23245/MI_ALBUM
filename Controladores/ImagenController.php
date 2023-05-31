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
    public static function EditarImagenes($id,$imagen,$comentario)
    {
        $obj_prod=new Imagenes();

        $obj_prod->SetidImagen($id);
        $obj_prod->SetImagen($imagen);
        $obj_prod->SetComentario($comentario);
        

        return ImagenesDao::Editar($obj_prod);

    }
    public static function Get_Imagen($id)
    {
        return ImagenesDao::get_Imagen($id);
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
    public static function Get_Imagen_ID($id)
    {
        return ImagenesDao::get_Imagen_id($id);
    }
}
?>