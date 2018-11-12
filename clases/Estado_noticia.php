<?php
require_once 'Conexion.php';

class Estado_noticia{

 private $tabla;
 private $id_estado;
 private $descripcion_estado;

 public function setTabla($parametro){
   $this->tabla = $parametro;
 }

 public function setIdEstado($IdEstado){
   $this->IdEstado = $IdEstado;
 }

 public function setDescripcion($descripcion){
   $this->descripcion = $descripcion;
 }

 public function obtenerEstados($condiciones){

    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $consulta= "select * from ".$this->tabla." ".$condiciones;
    echo $consulta;

    $resultado= $conexion->query($consulta);
    if($resultado){
       return $resultado;
    }else{
      return false;
    }

 }
 public function obtenerEstadoNoticia(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_estado_noticias");
    return $resultado_consulta;

 }


}
 ?>
