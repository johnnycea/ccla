<?php

require_once './clases/Conexion.php';
require_once './clases/Funciones.php';
require_once './clases/Noticia.php';
require_once './comun.php';

// require_once './clases/Usuario.php';
// $comprobar = new Usuario();
// $comprobar->verificarSesion();

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Empresa</title>
   <?php cargarHead(); ?>

  <script src="./js/script_administrar_noticias.js"></script>
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
    <h5><B><FONT COLOR="white">  Ingresar Mantenedor Noticias</FONT></h5>
  </div>
<div class="container">
                     <!-- <form> -->
              <form action="javascript:guardar_nueva_noticia()" id="mantenedor_ingresar_noticia" name="mantenedor_ingresar_noticia" method="POST">
                  <fieldset>
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

                     <div class="card col-12 col-md-5">
                       <h5 class="card-header">Agregar Imagenes</h5>
                       <div class="card-body">

                         <div class="" id="divFotos">

                           <div id="divSuperiorSubirImagenes">

                             <div class="row col-12 ">
                               <input class="btn btn-primary col-6 btn-sm"  type="button" id="botonAgregar" onclick="agregarCampoFoto();" value="+ Imagenes" />
                               <input class="btn btn-primary col-6 btn-sm"  type="button" id="botonRemover" onclick="removerCampoFoto();" value="- Imagenes" />
                             </div>

                             <table class="table table-bordered" id="tablaFotosIngreso">

                               <input type="hidden" id="contadorFotos" name="contadorFotos" value="1">

                               <thead>
                                 <th>Archivo</th>
                                <th>Principal</th>
                               </thead>
                               <tbody>
                                 <tr>
                                   <td><input class="form-control" name="foto1" type="file"></input></td>
                                  <td><input class="form-control" type="checkbox" onclick="soloUnaPrincipal(1)" name="principal1" id="principal1"></td>
                                 </tr>
                             </tbody>
                             </table>

                           </div>


                       </div>
                     </div>
                  </div>


                          <div class="col-md-12 container"  align="right">

                                  <input type="submit" id="btn_insert" class="btn" value="Agregar" name="btn_registrar" align="left">
                                  <br>
                                  <br>
                                  <div class="container col-md-10" align="left">
                                    <a class="nav-link col-md-3 animated-panel zoomIn" align="center" href="./administracion_empresas.php">&nbsp;&nbsp;ATRAS<span class="sr-only">(current)</span></a>
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
  function eliminarCamposEmpresa(){ /*AQUI LE DOY UN NOMBRE CUALQUIERA A LA FUNCION*/
       $("#txt_nombre_empresa").val("");
       $("#txt_descripcion_empresa").val("");
       $("#categoria_empresa").val("");
       $("#estado_empresa").val("");
       $("#txt_video_empresa").val("");
       $("#txt_coordenadas_empresa").val("");
       $("#txt_facebook").val("");
       $("#txt_instagram").val("");

                        }
  </script>

</html>
