<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Empresa.php';

$Empresa = new Empresa();
$listar_empresas = $Empresa->obtenerEmpresas();


          $contador = 1;
          while($filas = $listar_empresas->fetch_array()){
           // $clase="";
           // if($filas['estado']==2){
           //   $clase="table-warning";
           // }

           echo ' <div class=" col-md-4">
                    <div class="card" class="col-md-3">
                        <img class="card-img-top" src="./imagenes/empresas/'.$filas['ruta_imagen'].'" alt="Card image">

                        <div class="card-body">
                          <h4 class="card-title"><span id="txt_nombre_'.$contador.'" >'.$filas['nombre_empresa'].'</span></h4>
                          <p class="card-text"><span id="txt_nombre_'.$contador.'" >'.$filas['descripcion_empresa'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['telefono'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['correo'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['sitio_web'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['facebook'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['instagram'].'</span></p>
                          <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$filas['estado'].'</span></p>

                          <a href="./modificar_empresa.php?id_empresa='.$filas['id_empresa'].'" class="btn btn-outline-primary">Editar</a>
                          <a href="javascript:eliminarEmpresa('.$filas['id_empresa'].')" class="btn btn-outline-danger">Eliminar</a>
                        </div>

                     </div>
                  </div>';


            $contador++;

         }


 ?>
