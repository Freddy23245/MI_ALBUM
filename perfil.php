<?php
    session_start();
    require("Controladores/UsuarioController.php");

    $errors = array();

    $id = $_POST['idUsuario'];
    $usu = UsuarioControlador::get_usuario_id($id);
    if(isset($_POST['Guardar']))
    {
      $fecha = new DateTime();
      $nombreArchivo =($_FILES['Imagen'] != "")?$fecha->getTimestamp()."_".$_FILES['Imagen']["name"]:"default.png";
      $tempFoto = $_FILES['Imagen']['tmp_name'];
      if($tempFoto != "")
      {
        move_uploaded_file($tempFoto,"img/perf/".$nombreArchivo);
      }
      
    $idReal = $_POST['IdUsuarioReal'];
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
      $ISNULL = UsuarioControlador::isNull($nombre,$apellido,$usuario,$password,$con_password,$email);
      $ISEMAIL = UsuarioControlador::isEmail($email);
      $VALIDAPASS = UsuarioControlador::validaPassword($password,$con_password);
      
      if($ISNULL)
      {
        $errors[] = "Por Favor Rellene los campos solicitados";
      }
      if(!$ISEMAIL)
      {
        $errors[] = "Correo Invalido";
      }
      if(!$VALIDAPASS)
      {
        $errors[]= "Verifique que las contraseña coincidan";
      }

      if(count($errors) == 0)
      {
        UsuarioControlador::Editar($idReal,$nombre,$apellido,$correo,$usuario,$pass_hash,$imagen);
        header("location:inicio.php");
      }
        

    
    
   

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
      
          <div class=" container">
            <h4>Perfil de Usuario</h4>
            <?php echo UsuarioControlador::resultBlock($errors); ?>
            <form action="" method="post" class="m-auto" enctype="multipart/form-data">
              <div class=" form-group mb-3  col-md-6 ">
               
                <input name="nombre" type="text" class="form-control" value="<?php echo $usu->GetNombre();?>" aria-describedby="NamelHelp" placeholder="Nombre">
                
              </div>
              <div class="mb-3 col-md-6">
                  
                  <input name="apellido" type="text" class="form-control" value="<?php echo $usu->GetApellido()?>" aria-describedby="SurnamelHelp" placeholder="Apellido">
                 
                </div>
                <div class="mb-3 col-md-6">
                  
                  <input name="email" type="email" class="form-control" value="<?php echo $usu->GetCorreo()?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo">
                  <div id="emailHelp" class="form-text">Nunca Compartiremos tu email.</div>
                </div>
                <div class="mb-3 col-md-6">
                 
                  <input name="user" type="text" value="<?php echo $usu->GetUsuario()?>" class="form-control" aria-describedby="UserlHelp" placeholder="Usuario">
                  
                </div>
                <div class="mb-3 col-md-6">
                  
                  <input name="pass" type="password"  onfocus="this.value=''" class="form-control" aria-describedby="PasslHelp" value="<?php echo $usu->GetContraseña()?>" placeholder="Contraseña">
                  
                </div>
              <div class="mb-3 col-md-6">
                
                <input name="con_pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="RePasslHelp" placeholder="Confirmar contraseña">
              </div>
              <!-- <div class="mb-3 col-md-6">
                
                <input name="con_Actual" type="password" class="form-control" id="examplePassActual" aria-describedby="RePasslHelp" placeholder="Contraseña Actual">
              </div> -->
              <div class="mb-3 col-md-6">
                
               <input type="file" name="Imagen"  accept="image/*" id="" value="img/perf/<?php echo $usu->GetImagen()?>" class="form-control" >
              </div>
              <input type="hidden" name="IdUsuarioReal" value="<?php echo $usu->GetIdUsuario()?>">
              <a name="Cancelar" href="inicio.php" type="button" class="btn btn-secondary col-md-3">Cancelar</a>
              <button name="Guardar" type="submit" class="btn btn-primary col-md-3">Guardar Cambios</button>
            </form>
           
          </div>
          
      <script src="js/Script.js"></script>
</body>
</html>