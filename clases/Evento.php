<?php
require_once 'Conexion.php';

class Evento{

 private $id_evento;
 private $titulo;
 private $texto;
 private $fechaInicio;
 private $fechaFin;
 private $ubicacion;
 private $ruta_imagen;

     public function setIdEvento($id_evento){
       $this->id_evento = $id_evento;
     }
     public function setTitulo($titulo){
       $this->titulo = $titulo;
     }
     public function setTexto($texto){
       $this->texto = $texto;
     }
     public function setFechaInicio($fechaInicio){
       $this->fechaInicio = $fechaInicio;
     }
     public function setFechaFin($fechaFin){
       $this->fechaFin = $fechaFin;
     }
     public function setUbicacion($ubicacion){
       $this->ubicacion = $ubicacion;
     }
     public function setImagen ($imagen){
       $this->imagen = $imagen;
     }


     public function crearEvento(){
       $Conexion = new Conexion();
       $Conexion = $Conexion->conectar();

       $consulta = "insert into tb_eventos (titulo, texto, fecha_inicio, fecha_fin, ubicacion, ruta_imagen) VALUES ('".$this->titulo."', '".$this->texto."','".$this->fechaInicio."','".$this->fechaFin."','".$this->ubicacion."','".$this->imagen."');";
     // INSERT INTO tb_eventos (titulo, texto, fecha_inicio, fecha_fin, ubicacion, ruta_imagen) VALUES ('', '', '', '', '', '');
       if($Conexion->query($consulta)){
             $resultadoNuevoId = $Conexion->query("SELECT LAST_INSERT_ID() as id");
             $resultadoNuevoId = $resultadoNuevoId->fetch_array();
             return $resultadoNuevoId['id'];
       }else{
           // echo $consulta;
           return false;
       }
     }

     public function modificarEvento(){
       $Conexion = new Conexion();
       $Conexion = $Conexion->conectar();

       $consulta = "update tb_eventos
            SET titulo = '".$this->titulo."',
             texto = '".$this->texto."',
             fecha_inicio = '".$this->fechaInicio."',
             fecha_fin = '".$this->fechaFin."',
             ubicacion = '".$this->ubicacion."',
             ruta_imagen = '".$this->imagen."'
             WHERE (id_evento = '".$this->id_evento."');";
       if($Conexion->query($consulta)){
           return true;
       }else{
           echo $consulta;
           // return false;
       }
     }

     public function eliminarEvento(){
       $Conexion = new Conexion();
       $Conexion = $Conexion->conectar();

       $consulta = "DELETE FROM tb_eventos WHERE (id_evento = ".$this->id_evento.") ";

       if($Conexion->query($consulta)){
           return true;
       }else{
           echo $consulta;
           // return false;
       }
     }

     public function obtenerEvento(){
        $Conexion = new Conexion();
        $Conexion = $Conexion->conectar();

        $resultado_consulta = $Conexion->query("select * from tb_eventos;");
        return $resultado_consulta;
     }

    public function listarImagenesEventos(){
      $Conexion = new Conexion();
      $con = $Conexion->conectar();

      $respuesta = $con->query("select * from tb_eventos ");

      if($respuesta){
         return $respuesta;
      }else{
        return false;
      }
    }

    public function eliminarImgEventos(){
      $Conexion = new Conexion();
      $con = $Conexion->conectar();

      $respuesta = $con->query("delete from tb_eventos where id_eventos=".$this->id_eventos);

      if($respuesta){
         return true;
      }else{
        return false;
      }
    }

    function gen_fun_create($ext){
      return "imagecreatefrom".$ext;
    }




}
 ?>
