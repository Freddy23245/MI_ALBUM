<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                    <button type="submit" name="SaveImage" class="btn btn-primary">Guardar cambios</button>
                </div>
                </form>
            </div>
        </div>
      </div>
    
      <!--FinModal-->


       <!--Modal-->
       <div class="modal" tabindex="1" id="ModalEditar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Imagen</h5>
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
                    <button type="submit" name="SaveChange" class="btn btn-primary">Guardar cambios</button>
                </div>
                </form>
            </div>
        </div>
      </div>
      <!--Carrousel-->


      <!--FinCarrousel-->
      <!--FinModal-->
</body>
</html>