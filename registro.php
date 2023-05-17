<?php 
require("Controladores/UsuarioController.php");

if(isset($_POST['Guardar'])){
  $fecha = new DateTime();
  $nombreArchivo =($_FILES['Imagen'] != "") ? $fecha->getTimestamp()."_".$_FILES['Imagen']["name"]:"imagen.jpg";
  $tempFoto = $_FILES['Imagen']['tmp_name'];
  if($tempFoto != "")
  {
    move_uploaded_file($tempFoto,"img/perf/".$nombreArchivo);
  }
  

$nombre = $_POST["nombre"];
$apellido =$_POST["apellido"];
$correo = $_POST["email"];
$usuario = $_POST["user"];
$password = $_POST["pass"];
$con_password=$_POST["con_pass"];
$email=$_POST["email"];
$imagen = $nombreArchivo;
// $Activo=1;

$pass_hash=sha1($password);
UsuarioControlador::Insertar($nombre,$apellido,$correo,$usuario,$pass_hash,$imagen);
header("location:registro.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de Usuario</title>
    <link rel="icon" href="img/icono.ico"/>
</head>
<body>
      
          <div class="container">
            <h4>Registro de Usuario</h4>
            <form action="" method="post" class="">
              <div class="mb-3 col-md-6">
               
                <input name="nombre" type="text" class="form-control"  aria-describedby="NamelHelp" placeholder="Nombre">
                
              </div>
              <div class="mb-3 col-md-6">
                  
                  <input name="apellido" type="text" class="form-control"  aria-describedby="SurnamelHelp" placeholder="Apellido">
                 
                </div>
                <div class="mb-3 col-md-6">
                  
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo">
                  <div id="emailHelp" class="form-text">Nunca Compartiremos tu email.</div>
                </div>
                <div class="mb-3 col-md-6">
                 
                  <input name="user" type="text" class="form-control" aria-describedby="UserlHelp" placeholder="Usuario">
                  
                </div>
                <div class="mb-3 col-md-6">
                  
                  <input name="pass" type="password" class="form-control" aria-describedby="PasslHelp" placeholder="Contraseña">
                  
                </div>
              <div class="mb-3 col-md-6">
                
                <input name="con_pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="RePasslHelp" placeholder="Confirmar contraseña">
              </div>
              <div class="mb-3 col-md-6">
               <input type="file" name="Imagen" accept="image/*" id="" class="form-control">
              </div>
              <button name="Guardar" type="submit" class="btn btn-primary">Registrar</button>
            </form>
          </div>
      
</body>
</html>