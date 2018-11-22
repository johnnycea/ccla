<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Noticia.php';

$Funciones = new Funciones();

$id_imagen = $_REQUEST['id_imagen'];

$Noticia = new Noticia();
$Noticia->setIdImagen($id_imagen);


if($Noticia->eliminarImgNoticia()){
   echo "1";
}else{
   echo "2";
}

 ?>
