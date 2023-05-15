<?php 

class Imagenes{

    private $idImagen;
    private $idUsuario;
    private $Imagen;
    private $comentario;
    private $fecha;

    public function GetidImagen()
    {
        return $this->idImagen; 
    }
    public function SetidImagen($idImagen){
        $this->idImagen = $idImagen;
    }
    public function GetIdUsuario()
    {
        return $this->idUsuario;
    }
    public function SetIdUsuario($idUsuario){
        $this->idUsuario =$idUsuario;
    }
    public function GetImagen(){
        return $this->Imagen;
    }
    public function SetImagen($Imagen){
        $this->Imagen =$Imagen;
    }
    public function GetComentario(){
        return $this->comentario;
    }
    public function SetComentario($Comentario){
        $this->comentario = $Comentario;
    }


}
?>