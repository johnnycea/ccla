<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Noticia.php';

$Noticia = new Noticia();
$listado_noticias = $Noticia->obtenerNoticias();


          $contador = 1;
          while($filas = $listado_noticias->fetch_array()){

           $clase="";
           if($filas['estado']==2){
             $clase="table-warning";
           }

           echo ' <div class=" col-md-4">
                    <div class="card" class="col-md-3">
                        <img class="card-img-top" src="./imagenes/noticias/'.$filas['ruta_imagen'].'" alt="Card image">

                        <div class="card-body">
                          <h4 class="card-title"><span id="txt_nombre_'.$contador.'" >'.$filas['titulo'].'</span></h4>
                          <p class="card-text"><span id="txt_nombre_'.$contador.'" >'.$filas['texto'].'</span></p>
                          <p class="card-text"><span class="fas fa-trash"id="txt_nombre_'.$contador.'" >'.$filas['fecha'].'</span></p>
                          <a href="#" class="btn btn-outline-primary">Editar</a>
                          <a href="javascript:eliminarEmpresa('.$filas['id_noticia'].')" class="btn btn-outline-danger">Eliminar</a>
                        </div>

                     </div>
                  </div>';
                  //
                  //  if($filas['estado']==1) {
                  //   echo "Activo";
                  // }else {
                  //   echo "Inactivo";
                  // }

            $contador++;

         }


 ?>
