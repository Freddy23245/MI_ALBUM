<?php
session_start();
require_once("Controladores/ImagenController.php");
$id = $_POST['id'];
var_dump($id);

if (isset($_POST['SaveImage'])) {


    // $imagen = $_FILES['Foto']['name'];
    $fecha = new DateTime();
    $nombreArchivo = ($_FILES['FotoEditar'] != "") ? $fecha->getTimestamp() . "_" . $_FILES['FotoEditar']["name"] : "imagen.jpg";
    $tempFoto = $_FILES['FotoEditar']['tmp_name'];
    if ($tempFoto != "") {
        move_uploaded_file($tempFoto, "img/Albums/" . $nombreArchivo);
    }

    $imagen = $nombreArchivo;
    $comentario = $_POST['comentarios'];
    $idUsuario = $_SESSION['log']["id_usuario"];
    echo "Identificador abajo";
    echo $id;
    ImagenesControlador::EditarImagenes(37,$imagen,$comentario);
    // header("location:inicio.php");
}
$img = ImagenesControlador::Get_Imagen($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <!--Modal-->
    <div class="row">

        <h4 class="text-center">Editar Imagen:</h4>
        <div class=" d-flex justify-content-center">

            <div class="text-center mx-3" style="height: 12%; width:12%; ">

                <img src="img/Albums/<?php echo $img->GetImagen(); ?>" alt="" width="100%">
            </div>
            <form action="" method="post" enctype="multipart/form-data">


                <label for="">Imagen</label>

                <input type="file" accept="image/*" class="form-control mb-4" name="FotoEditar" id="" required>

                <!-- </div> -->
                <label for="">Comentario</label>
                <input type="text" name="comentarios" value="<?php echo $img->GetComentario(); ?>" class="form-control mb-4">

                <button type="button" class="btn btn-secondary">Cerrar</button>
                <button type="submit" name="SaveImage" class="btn btn-primary">Guardar cambios</button>

            </form>
        </div>


    </div>



</body>

</html>