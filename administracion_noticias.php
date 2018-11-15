<?php
require_once 'comun.php';
require_once './clases/Noticia.php';

// require_once './clases/Usuario.php';
// $comprobar = new Usuario();
// $comprobar->verificarSesion();

?>

<!DOCTYPE html>
<html lang="en">
<head>


   <title>Administracion de noticia</title>
   <?php cargarHead(); ?>
</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>



<div class="container-fluid">
  <div class="row">

      <div class="col-12 col-md-3">

          <div class="card text-dark">
            <div class="card-header ">
                OPCIONES
            </div>
            <div class="card-body">
                 <?php cargarMenuConfiguraciones(); ?>
            </div>
          </div>

      </div>
       <div class="col-12 col-md-9">

          <div  style="" class=" card col-12">
            <div class="container">
              <br>
                 <a href="./nueva_noticia.php" class="btn btn-success" >Crear nueva noticia</a>
            </div>
            <div class="container">
              <br>

              <div class="row" id='contenedor_listado_noticias'></div>

            </div>

          </div>

       </div>

  </div>

</div>

  <script src="./js/script_administrar_noticias.js"></script>
<script>
listarNoticias();
</script>


</body>
</html>
