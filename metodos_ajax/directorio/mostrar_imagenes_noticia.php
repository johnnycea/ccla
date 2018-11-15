<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Noticia.php';


$id_noticia = $_REQUEST['id_noticia'];

$Noticia = new Noticia();
$Noticia->setIdNoticia($id_noticia);
$listado_noticia = $Noticia->mostrarImagenesUnaEmpresaParaModificar();


    echo '
    <div class="row col-xs-12 ">';

          while($filas = $listado_noticia->fetch_array()){

               echo '

                <div class="card col-12 col-md-3" >
                    <img class="card-img-top" style="height:100px;" src="./imagenes/noticias/'.$filas['ruta_imagen'].'" alt="Card image cap">
                    <div class="card-body" style="padding:5px;">
                      <a href="javascript:eliminarImagenNoticia('.$filas['id_imagen'].')" class="btn btn-sm btn-danger">Eliminar</a>';

                       if($filas['tipo_imagen']==1){
                         echo '<a href="javascript:cambiarImagenPrincipal('.$filas['id_imagen'].')" class="btn btn-sm btn-success">Principal</a>';
                       }else{
                         echo '<a href="javascript:cambiarImagenPrincipal('.$filas['id_imagen'].','.$filas['id_noticia'].')" class="btn btn-sm btn-secondary">Principal</a>';
                       }
                      echo'
                    </div>
                </div>';
         }

       echo '</div>';

 ?>
