<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Articulo.php';

$Funciones = new Funciones();

$id_articulo = $Funciones->limpiarNumeroEntero($_REQUEST['id_articulo']);

$Articulo = new Articulo();
$Articulo->setIdArticulo($id_articulo);


if($Articulo->eliminarArticulo()){
   echo "1";
}else{
   echo "2";
}

 ?>
