<?php
 session_start();
 require_once("Datos/IniciarSession.php");
require("validaciones/validarImagen.php");
require_once("Controladores/ImagenController.php");

if(isset($_POST['SaveImage'])){
  // $imagen = $_FILES['Foto']['name'];
  $fecha = new DateTime();
  $nombreArchivo =($_FILES['Foto'] != "")?$fecha->getTimestamp()."_".$_FILES['Foto']["name"]:"imagen.jpg";
  $tempFoto = $_FILES['Foto']['tmp_name'];
  if($tempFoto != "")
  {
    move_uploaded_file($tempFoto,"img/Albums/".$nombreArchivo);
  }

  $imagen = $nombreArchivo;
  $comentario=$_POST['cometario'];
  $idUsuario =$_SESSION['log']["id_usuario"];

  ImagenesControlador::AgregarImagen($imagen,$comentario,$idUsuario);
  header("location:inicio.php");
 
}
$fila = ImagenesControlador::MostrarImagenes($_SESSION['log']["id_usuario"]);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>MI ALBUM</title>
    <link rel="icon" href="img/icono.ico"/>
</head>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>MI ALBUM</strong>
       </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <!-- <li><a href="#" class="nav-link px-2 link-secondary">Hola</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Hola2</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Customers</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li> -->
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 justify-content-center" role="search">
    
        <?php echo $_SESSION['log']['nombre']." ".$_SESSION['log']['apellido'];?>
        
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/perf/<?php echo ($_SESSION['log']['imagen']);?>" alt="mdo" width="60" height="60" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="perfil.php">Mi Perfil</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Agregar Nueva Imagen</a></li>
            <!-- <li><a class="dropdown-item" href="#">Profile</a></li> -->
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="CerrarSession.php">Cerrar Sesion</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
<body>
   
      
      <main>
      
        <section class="py-0 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">MI ALBUM</h1>
              <p class="lead text-body-secondary">¡Presentamos la nueva aplicación de album de fotos!
                ¿Está cansado de tener sus recuerdos esparcidos por diferentes dispositivos y redes sociales?¡Ya no mas!
                con nuestra aplicación,puede guardar todos sus recuerdos en un mismo lugar.</p>
              <!-- <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>

              </p> -->
              <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                  </svg>
                Agregar Nueva Imagen
              </button>
            </div>
          </div>
        </section>
        
        <div class="album py-5 bg-body-tertiary">
        
          <div class="container">
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($fila as $p){?>  
            <div class="col">
             
                <div class="card shadow-sm">
                  
                  <img src="img/Albums/<?php echo $p['imagen']?>" class="card-img-top" width="600" height="400">
                  <div class="card-body">
                    <p class="card-text"><?php echo $p['comentario']?>.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a  class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#MODAL">Ver</a>
                        <form action="editarImagen.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $p['idImagen']?>">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Editar</button>
                        </form>
                        
                        <form action="EliminarImagen.php" method="post">
                        <input type="hidden" name="idEliminar" value="<?php echo $p['idImagen']?>">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Eliminar</button>
                        </form>
                        <a href="img/Albums/<?php echo $p['imagen']?>" download="MI ALBUM Image" class="btn btn-sm btn-outline-secondary">Descargar</a>
                        
                      </div>
                      <small class="text-body-secondary"><?php echo date("d-m-Y", strtotime($p['fecha']));?></small>
                    </div>
                  </div>
                </div>
                
              </div>
              
     <!--MODAL 2-->
     <div class="modal" tabindex="-1" role="dialog" id="MODAL">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/Albums/<?php echo $p['imagen']?>" alt="First slide">
    </div>
    
  </div>
</div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
     <!--FIN MODAL 2-->
              <?php }?>
            </div>
          </div>
          
        </div>
        
      </main>
      <!-- InicioModal -->


      <!--Modal-->
      <div class="modal" tabindex="1" id="staticBackdrop">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Imagen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                   <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <div class="mb-4 d-flex justify-content-center">
                           
                        </div>
                        <div class="d-flex justify-content-center">
                            
                                <input type="file" accept="image/*" class="form-control" name="Foto" id="" required>
                            
                        </div>
                        <label for="">Comentario</label>
                        <textarea name="cometario" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Cerrar</button>
                    <button type="submit" name="SaveImage" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
      </div>
      <!--Carrousel-->
>
      <!--FinModal-->

      <footer class="text-body-secondary py-5">
        <div class="container">
          <p class="float-end mb-1">
            <a href="#">Back to top</a>
          </p>
          <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
          <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
        </div>
      </footer>
      
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
      
            
</body>
</html>