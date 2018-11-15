<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Noticia.php';

$Funciones = new Funciones();

$id_imagen = $_REQUEST['id_imagen'];
$id_noticia = $_REQUEST['id_noticia'];

$Noticia = new Noticia();
$Noticia->setIdImagen($id_imagen);
$Noticia->setIdNoticia($id_noticia);


if($Noticia->quitarImagenesPrincipalNoticia()){

   if($Noticia->cambiarImagenPrincipalNoticia()){
     echo "1";
   }else{
     echo "2";
   }

}else{
   echo "2";
}


 ?>
