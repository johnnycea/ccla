<?php
require_once 'Conexion.php';

class Estado_empresa{

 private $tabla;
 private $id_estado;
 private $descripcion_estado;

 public function setTabla($parametro){
   $this->tabla = $parametro;
 }
 public function setIdEstado($id_estado){
   $this->id_estado = $id_estado;
 }
 public function setDescripcionEstado($descripcion_estado){
   $this->descripcion_estado = $descripcion_estado;
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
 public function obtenerEstadoEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_estado_empresas");
    return $resultado_consulta;

 }


}
 ?>
