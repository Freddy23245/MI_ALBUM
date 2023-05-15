<?php 

  if(isset($_FILES['Imagen']) && !empty($_FILES['Imagen']['name'])){

  	$errores   = array();
  	$file_name = $_FILES['Imagen']['name'];
  	$file_size = $_FILES['Imagen']['size'];
    $file_tmp  = $_FILES['Imagen']['tmp_name'];
    $file_type = $_FILES['Imagen']['type'];
    $file_ext  = $_FILES['Imagen']['name'];
    $file_ext  = explode('.', $file_ext);
    $file_ext  = end($file_ext);
    $file_ext  = strtolower($file_ext);

    $extensionesPermitidas = array("jpeg","jpg","png","gif","bmp");

    if (in_array($file_ext, $extensionesPermitidas) === false){
      $errores[] = "Archivo no permitido, seleccione una imagen...";
    }

    if ($file_size >= 2097152){
      $errores[] = 'El archivo debe ser menor a 2mb...';
    }

    if(empty($errores) == true){
      $_SESSION["archivoSubido"] = "imagenes/$file_name";
      move_uploaded_file($file_tmp, "imagenes/".$file_name); 
      //echo "El archivo fue guardado con exito...";

    } else{
    	unset($_SESSION["archivoSubido"]);
    	print_r($errores);
    }

  } else {
  	unset($_SESSION["archivoSubido"]);
  }

?>