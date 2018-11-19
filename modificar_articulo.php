<?php

require_once './clases/Conexion.php';
require_once './clases/Funciones.php';
require_once './clases/Articulo.php';
require_once './comun.php';

require_once './clases/Usuario.php';
$comprobar = new Usuario();
$comprobar->verificarSesion();

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Editar Articulo</title>
   <?php cargarHead(); ?>

</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>

  <!-- <table class="table">
    <thead class="thead-dark"> -->

<?php

// echo "hola el id es: ".$_REQUEST['id_miembro'];

$id_articulo = $_REQUEST['id_articulo'];


 $articulo_creado = new Articulo();
 $articulo_creado->setIdArticulo($id_articulo);
 $respuesta = $articulo_creado->obtenerArticulo("where id_articulo = ".$id_articulo."");  //" where id_miembro = ".$id_miembro.""

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
     <h5><B><FONT COLOR="white">  Editar Articulo</FONT></h5>
   </div>
 <div class="container">


   <div id="prueba_error">

   </div>
              <form action="javascript:modificar_articulo()" id="mantenedor_modificar_articulo" name="mantenedor_modificar_articulo" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id_articulo" id="id_articulo" value="<?php echo $id_articulo; ?>">

                      <div class="row">
                        <div class="col-12 col-md-4">
                            <div>
                                <div class="form-group">
                                    <label for="titulo">Titulo:</label>
                                    <input class="form-control" value="<?php echo $filas['titulo'];?>" title="Debe ingresar titulo" required id="txt_titulo" name="txt_titulo" placeholder="Nombre Completo" type="text">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                  <br>
                                    <label for="texto">Texto:</label>
                                    <input class="form-control" value="<?php echo $filas['texto'];?>" title="Ingrese texto" required id="txt_texto" name="txt_texto" placeholder="Nombre cargo" type="text">
                                </div>


                                <div class="form-group">
                                  <br>
                                    <label for="descripcion">Imagen:</label>
                                    <input type="file" class="form-control" title="Debe ingresar titulo" required id="txt_imagen" name="txt_imagen" placeholder="Imagen">
                                </div>

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

                         <label for="">Imagen Articulo:</label>

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

              <script src="./js/script_administrar_articulo.js"></script>




  </body>
</html>
