<?php

require_once './clases/Conexion.php';
require_once './clases/Funciones.php';
require_once './clases/Noticia.php';
require_once './comun.php';

require_once './clases/Usuario.php';
$comprobar = new Usuario();
$comprobar->verificarSesion();

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Editar noticia</title>
   <?php cargarHead(); ?>

</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>

  <!-- <table class="table">
    <thead class="thead-dark"> -->

<?php

// echo "hola el id es: ".$_REQUEST['id_noticia'];

 $id_noticia = $_REQUEST['id_noticia'];
echo '<script> var id_noticia = '.$id_noticia.'; </script>';


 $noticia_creada = new Noticia();
 $noticia_creada->setIdNoticia($id_noticia);
 $respuesta = $noticia_creada->obtenerNoticias();

  $filas = $respuesta->fetch_array();

 ?>

 <div class="container-fluid">

       <div class="col-md-12-centered">
       <div class="card border-danger mb-3">
  <div class="card-header border-danger mb-3" style="background-color:rgb(255, 176, 0);
                                                     background: -moz-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,146,10,1)), color-stop(72%, rgba(255,175,75,1)), color-stop(100%, rgba(255,175,75,1)));
                                                     background: -webkit-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     background: -o-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     background: -ms-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     background: linear-gradient(to right, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff920a', endColorstr='#ffaf4b', GradientType=1 );">
     <h5><B><FONT COLOR="white">  Editar Noticia</FONT></h5>
   </div>
 <div class="container">
              <form action="javascript:modificar_noticia()" id="mantenedor_modificar_noticia" name="mantenedor_modificar_noticia" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id_noticia" value="<?php echo $filas['id_noticia'];?>">

                      <div class="row">

                        <div class="col-12 col-md-4">
                            <div>
                                <div class="form-group">
                                    <label for="nombreTitulo">Titulo:</label>
                                    <input class="form-control" title="Debe ingresar titulo" required id="txt_titulo" name="txt_titulo" placeholder="Nombre titulo" type="text">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                  <br>
                                    <label for="descripcion">Texto:</label>
                                    <textarea name="txt_texto" id="txt_texto" class="form-control" rows="4" cols="100"></textarea>
                                </div>
                            </div>

                                    <!-- <div class="form-group">
                                      <br>
                                        <label for="fecha">Fecha:</label>
                                        <input type="datetime-local" name="fecha" value="">
                                    </div> -->


                        </div>
                        <div class="col-12 col-md-3">
                                <div class="form-group">

                                    <label for="categoria">Estado:</label>
                                         <select class="form-control" required name="estado" id="estado">
                                           <option value="" selected disabled>Seleccione:</option>
                                            <?php
                                                require_once './clases/Estado_noticia.php';
                                                $TipoE= new Estado_noticia();
                                                $filasTipoE= $TipoE->obtenerEstadoNoticia();

                                                foreach($filasTipoE as $tipo){
                                                    echo '<option value="'.$tipo['id_estado'].'" >'.$tipo['descripcion_estado'].'</option>';
                                                }
                                             ?>
                                        </select>
                                </div>
                        </div>

                        <hr>

                        <div class="col-md-12 container" >
                              <br>
                                <input type="submit" class="btn btn-block btn-info col-12 " id="btn_insert" value="GUARDAR CAMBIOS" name="btn_registrar" align="right">
                                <!-- <a class="nav-link col-md-3 animated-panel zoomIn"  href="./administracion_empresas.php">&nbsp;&nbsp;ATRAS<span class="sr-only">(current)</span></a> -->
                              <br>
                        </div>

                        <hr>

                         <label for="">Imagen Noticia:</label>

                <div class="row">


                          <div class="col-12 " id="divInferiorImagenesActuales" >

                          </div>

                          <div class="container-fluid"><hr></div>




                </div>



                    </fieldset>
                </form>
                        </div>
                    </div>
              </div>

              <script src="./js/script_administrar_noticias.js"></script>

              <script>
                 listarImagenesNoticia(<?php echo $id_noticia; ?>);
              </script>


  </body>
</html>
