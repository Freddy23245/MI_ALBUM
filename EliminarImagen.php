<?php
require_once("Controladores/ImagenController.php");

$id = $_POST['idEliminar'];
$imagen = ImagenesControlador::Get_Imagen_ID($id);
if(isset($_POST['Foto12']))
{
    if(file_exists("img/Albums/".$imagen['imagen']))
    {
        unlink("img/Albums/".$imagen['imagen']);
    }
}
 


    ImagenesDao::Eliminar($id);
    header("location:inicio.php");


?>