<?php 
require("Controladores/UsuarioController.php");
if(isset($_POST['Guardar'])){
$nombre = $_POST["nombre"];
$apellido =$_POST["apellido"];
$correo = $_POST["email"];
$usuario = $_POST["user"];
$password = $_POST["pass"];
$con_password=$_POST["con_pass"];
$email=$_POST["email"];
// $Activo=1;

$pass_hash=sha1($password);
UsuarioControlador::Insertar($nombre,$apellido,$correo,$usuario,$pass_hash);
}



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
      <div class="align-items-center">
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
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Activo</label>
              </div>
              <button name="Guardar" type="submit" class="btn btn-primary">Registrar</button>
            </form>
          </div>
      </div>
</body>
</html>