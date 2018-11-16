<?php

require_once 'Conexion.php';

Class Directorio{

  private $id_miembro;
  private $nombre;
  private $cargo;
  private $correo;

  public function setIdMiembro($id_miembro){
    $this->id_miembro = $id_miembro;
  }
  public function setNombre ($nombre){
    $this->nombre = $nombre;
  }
  public function setCargo ($cargo){
    $this->cargo = $cargo;
  }
  public function setCorreo ($correo){
    $this->correo = $correo;
  }

  public function crearDirectorio(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "insert into tb_directorio (nombre, cargo, correo) VALUES ('".$this->nombre."', '".$this->cargo."','".$this->correo."');";

    if($Conexion->query($consulta)){
          $resultadoNuevoId = $Conexion->query("SELECT LAST_INSERT_ID() as id");
          $resultadoNuevoId = $resultadoNuevoId->fetch_array();
          return $resultadoNuevoId['id'];
    }else{
        // echo $consulta;
        return false;
    }
  }

  public function modificarDirectorio(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "UPDATE tb_directorio
         SET nombre = '".$this->nombre."',
          cargo = '".$this->cargo."',
          correo = '".$this->correo."'
           WHERE (id_miembro = '".$this->id_miembro."');";
    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }
  }

  public function eliminarDirectorio(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "update tb_directorio WHERE (id_miembro = ".$this->id_miembro.") ";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }

  }

  public function eliminarImgNoticia(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "delete from tb_imagenes_noticias WHERE (id_imagen = ".$this->id_imagen.") ";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }

  }

  public function obtenerDirectorio(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("select * from tb_directorio;");
     return $resultado_consulta;

  }



      function gen_fun_create($ext){
        return "imagecreatefrom".$ext;
      }
}


 ?>
