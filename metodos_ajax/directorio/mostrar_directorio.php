<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Directorio.php';

$Directorio = new Directorio();
$listar_directorio = $Directorio->obtenerDirectorio();


          $contador = 1;
          while($filas = $listar_directorio->fetch_array()){

           // $clase="";
           // if($filas['estado']==2){
           //   $clase="table-warning";
           // }


           echo ' <div class=" col-md-4">
                    <div class="card" class="col-md-3">
                        <img class="card-img-top" src="./imagenes/directorio/'.$filas['ruta_imagen'].'" alt="Card image">

                        <div class="card-body">
                          <h4 class="card-title"><span id="txt_nombre_'.$contador.'" >'.$filas['nombre'].'</span></h4>
                          <p class="card-text"><span id="txt_nombre_'.$contador.'" >'.$filas['cargo'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['correo'].'</span></p>
                          <a href="./modificar_directorio.php?id_directorio='.$filas['id_miembro'].'" class="btn btn-outline-primary">Editar</a>
                          <a href="javascript:eliminarDirectorio('.$filas['id_miembro'].')" class="btn btn-outline-danger">Eliminar</a>
                        </div>

                     </div>
                  </div>';


            $contador++;

         }


 ?>
