<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Evento.php';

$Funciones = new Funciones();

$id_evento = $Funciones->limpiarNumeroEntero($_REQUEST['id_evento']);

$Evento = new Evento();
$Evento->setIdEvento($id_evento);


if($Evento->eliminarEvento()){
   echo "1";
}else{
   echo "2";
}

 ?>
