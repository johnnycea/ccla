<?php
require_once '../../clases/Evento.php';

$Evento =  new Evento();
$listadoActividades = $Evento->obtenerEvento();

$eventos = array();

while($filas= $listadoActividades->fetch_array()){
  $e = array();

  $e['id'] =  $filas['id_evento'];
  $e['start'] =  $filas['fecha_inicio'];
  $e['end'] =  $filas['fecha_fin'];
  $e['title'] = $filas['titulo'];
  $e['texto'] =  $filas['texto'];
  $e['ubicacion'] =  $filas['ubicacion'];
  $e['ruta_imagen'] =  $filas['ruta_imagen'];
  $e['textColor'] =  'white';
  $e['color'] =  '#f46307';

    array_push($eventos, $e);
}

echo json_encode($eventos);


?>
