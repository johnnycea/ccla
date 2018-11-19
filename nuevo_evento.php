<?php

require_once './clases/Conexion.php';
require_once './clases/Funciones.php';
require_once './clases/Evento.php';
require_once './comun.php';

require_once './clases/Usuario.php';
$comprobar = new Usuario();
$comprobar->verificarSesion();

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Eventos</title>
   <?php cargarHead(); ?>

  <script src="./js/script_administrar_evento.js"></script>
</head>
<body>

<!-- <?php //cargarMenuPrincipal(); ?> -->

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
    <h5><B><FONT COLOR="white">  Ingresar Mantenedor Evento</FONT></h5>
  </div>
<div class="container">
                     <!-- <form> -->
              <form action="javascript:guardar_nuevo_evento()" id="mantenedor_ingresar_evento" name="mantenedor_ingresar_evento" method="POST" enctype="multipart/form-data">
                  <fieldset>
                      <div class="row">

                     <div class="col-12 col-md-4">
                         <div>
                             <div class="form-group">
                                 <label for="nombre">Titulo:</label>
                                 <input class="form-control" title="Debe ingresar titulo" required id="txt_titulo" name="txt_titulo" placeholder="Ingrese titulo" type="text">
                             </div>
                         </div>

                         <div>
                             <div class="form-group">
                               <br>
                                 <label for="descripcion">Texto:</label>
                                 <input class="form-control" title="Debe ingresar texto" required id="txt_texto" name="txt_texto" placeholder="Ingrese texto" type="text">
                             </div>

                             <div class="form-group">
                               <br>
                                 <label for="descripcion">Fecha Inicio:</label>
                                 <input class="form-control" title="Debe ingresar fecha" id="fechaInicio" name="fechaInicio" placeholder="Fecha Inicio" type="text">
                             </div>

                             <div class="form-group">
                               <br>
                                 <label for="descripcion">Fecha Fin:</label>
                                 <input class="form-control" title="Debe ingresar fecha" id="fechaFin" name="fechaFin" placeholder="Fecha Fin" type="text">
                             </div>

                             <div class="form-group">
                               <br>
                                 <label for="descripcion">Ubicacion:</label>
                                 <input class="form-control" title="Debe ingresar ubicacion" required id="ubicacion" name="ubicacion" placeholder="Debe ingresar ubicacion" type="text">
                             </div>

                             <div class="form-group">
                               <br>
                                 <label for="descripcion">Imagen:</label>
                                 <input type="file" class="form-control" title="Debe ingresar titulo" required id="txt_imagen" name="txt_imagen" placeholder="Imagen">
                             </div>
                         </div>


                     </div>

                            <div class="col-md-12 container"  align="right">

                                  <input type="submit" id="btn_insert" class="btn" value="Agregar" name="btn_registrar" align="left">
                                  <br>
                                  <br>
                                  <div class="container col-md-10" align="left">
                                    <a class="nav-link col-md-3 animated-panel zoomIn" align="center" href="./administracion_evento.php">&nbsp;&nbsp;ATRAS<span class="sr-only">(current)</span></a>
                                  </div>
                                  <br>
                                  <br>
                              </div>

                  </fieldset>
              </form>
                      </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
  </body>
  <script type="text/javascript">
  function eliminarCamposEvento(){ /*AQUI LE DOY UN NOMBRE CUALQUIERA A LA FUNCION*/
       $("#txt_titulo").val("");
       $("#txt_texto").val("");
       $("#fechaInicio").val("");
       $("#fechaFin").val("");
       $("#ubicacion").val("");
                        }
  </script>

</html>
