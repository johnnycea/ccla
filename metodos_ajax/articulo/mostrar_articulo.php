<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Articulo.php';

$Articulo = new Articulo();
$listar_articulo = $Articulo->obtenerArticulo();


          $contador = 1;
          while($filas = $listar_articulo->fetch_array()){

           // $clase="";
           // if($filas['estado']==2){
           //   $clase="table-warning";
           // }


           echo ' <div class=" col-md-4">
                    <div class="card" class="col-md-3">
                        <img class="card-img-top" src="./imagenes/articulo/'.$filas['ruta_imagen'].'" alt="Card image">

                        <div class="card-body">
                          <h4 class="card-title"><span id="txt_nombre_'.$contador.'" >'.$filas['titulo'].'</span></h4>
                          <p class="card-text"><span id="txt_nombre_'.$contador.'" >'.$filas['texto'].'</span></p>
                          <a href="./modificar_articulo.php?id_articulo='.$filas['id_articulo'].'" class="btn btn-outline-primary">Editar</a>
                          <a href="javascript:eliminarArticulo('.$filas['id_articulo'].')" class="btn btn-outline-danger">Eliminar</a>
                        </div>

                     </div>
                  </div>';


            $contador++;

         }


 ?>
