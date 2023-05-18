<?php
    session_start();

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
            <h4>Registro de Usuario</h4>
            
            <form action="" method="post" class="m-auto" enctype="multipart/form-data">
              <div class=" form-group mb-3  col-md-6 ">
               
                <input name="nombre" type="text" class="form-control" value="<?php echo $_SESSION['log']['nombre'];?>" aria-describedby="NamelHelp" placeholder="Nombre">
                
              </div>
              <div class="mb-3 col-md-6">
                  
                  <input name="apellido" type="text" class="form-control" value="<?php echo $_SESSION['log']['apellido']?>" aria-describedby="SurnamelHelp" placeholder="Apellido">
                 
                </div>
                <div class="mb-3 col-md-6">
                  
                  <input name="email" type="email" class="form-control" value="<?php echo $_SESSION['log']['correo']?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo">
                  <div id="emailHelp" class="form-text">Nunca Compartiremos tu email.</div>
                </div>
                <div class="mb-3 col-md-6">
                 
                  <input name="user" type="text" value="<?php echo $_SESSION['log']['usuario'];?>" class="form-control" aria-describedby="UserlHelp" placeholder="Usuario">
                  
                </div>
                <div class="mb-3 col-md-6">
                  
                  <input name="pass" type="password" class="form-control" aria-describedby="PasslHelp" placeholder=" Contraseña">
                  
                </div>
              <div class="mb-3 col-md-6">
                
                <input name="con_pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="RePasslHelp" placeholder="Confirmar contraseña">
              </div>
              <div class="mb-3 col-md-6">
                
                <input name="con_Actual" type="password" class="form-control" id="examplePassActual" aria-describedby="RePasslHelp" placeholder="Contraseña Actual">
              </div>
              <div class="mb-3 col-md-6">
                
               <input type="file" name="Imagen" accept="image/*" id="" value="img/perf/<?php echo $_SESSION['log']['imagen']?>" class="form-control" >
              </div>
              <a name="Cancelar" href="inicio.php" type="button" class="btn btn-secondary col-md-3">Cancelar</a>
              <button name="Guardar" type="submit" class="btn btn-primary col-md-3">Guardar Cambios</button>
            </form>
           
          </div>
          
      
</body>
</html>