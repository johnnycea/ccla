<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Directorio.php';

$Funciones = new Funciones();

$id_miembro = $Funciones->limpiarNumeroEntero($_REQUEST['id_miembro']);

$Directorio = new Directorio();
$Directorio->setIdMiembro($id_miembro);


if($Directorio->eliminarDirectorio()){
   echo "1";
}else{
   echo "2";
}

 ?>
