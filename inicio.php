<?php
require("validaciones/validarImagen.php");
if(isset($_POST['SaveImage'])){
  $imagen = $file_name;
  $comentario=$_POST['cometario'];
  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>MI ALBUN</title>
</head>
<body>
    <nav data-bs-theme="dark">
        <div class="collapse text-bg-dark" id="navbarHeader">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-md-7 py-4">
                <h4>About</h4>
                <p class="text-body-secondary">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
              </div>
              <div class="col-sm-4 offset-md-1 py-4">
                <h4>Contact</h4>
                <ul class="list-unstyled">
                  <li><a href="#" class="text-white">Twitter</a></li>
                  <li><a href="#" class="text-white">Facebook</a></li>
                  <li><a href="#" class="text-white">Email</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
          <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
              <strong>Mi Album</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
    </nav>
      
      <main>
      
        <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">Album example</h1>
              <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
              <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>

              </p>
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
              <div class="col">
                <div class="card shadow-sm">
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                  <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>

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
                   <form action="" method="post">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <div class="mb-4 d-flex justify-content-center">
                            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                            alt="example placeholder" style="width: 250px;" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                                <input type="file" class="form-control d-none" id="customFile1" />
                            </div>
                        </div>
                        <label for="">Comentario</label>
                        <textarea name="cometario" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                   </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Cerrar</button>
                    <button type="button" name="SaveImage" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
      </div>

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
      
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>
      
            
</body>
</html>