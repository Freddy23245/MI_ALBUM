<?php
require_once("Controladores/ImagenController.php");

$id = $_POST['idEliminar'];
$id2 = (int)$id;
 


    ImagenesDao::Eliminar($id);
    header("location:inicio.php");


?>