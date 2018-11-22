<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Noticia.php';

$Funciones = new Funciones();

$id_noticia = $Funciones->limpiarNumeroEntero($_REQUEST['id_noticia']);

$Noticia = new Noticia();
$Noticia->setIdNoticia($id_noticia);


if($Noticia->eliminarNoticia()){
   echo "1";
}else{
   echo "2";
}

 ?>
