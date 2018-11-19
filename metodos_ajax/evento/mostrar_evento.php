<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Evento.php';

$Evento = new Evento();
$listar_evento = $Evento->obtenerEvento();


          $contador = 1;
          while($filas = $listar_evento->fetch_array()){

           // $clase="";
           // if($filas['estado']==2){
           //   $clase="table-warning";
           // }


           echo ' <div class=" col-md-4">
                    <div class="card" class="col-md-3">
                        <img class="card-img-top" src="./imagenes/eventos/'.$filas['ruta_imagen'].'" alt="Card image">

                        <div class="card-body">
                          <h4 class="card-title"><span id="txt_nombre_'.$contador.'" >'.$filas['titulo'].'</span></h4>
                          <p class="card-text"><span id="txt_nombre_'.$contador.'" >'.$filas['texto'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['fecha_inicio'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['fecha_fin'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['ubicacion'].'</span></p>
                          <a href="./modificar_evento.php?id_evento='.$filas['id_evento'].'" class="btn btn-outline-primary">Editar</a>
                          <a href="javascript:eliminarEvento('.$filas['id_evento'].')" class="btn btn-outline-danger">Eliminar</a>
                        </div>

                     </div>
                  </div>';


            $contador++;

         }


 ?>
