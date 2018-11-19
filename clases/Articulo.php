<?php

require_once 'Conexion.php';

Class Articulo{

  private $id_articulo;
  private $titulo;
  private $texto;
  private $imagen;

  public function setIdArticulo ($id_articulo){
    $this->id_articulo = $id_articulo;
  }
  public function setTitulo ($titulo){
    $this->titulo = $titulo;
  }
  public function setTexto ($texto){
    $this->texto = $texto;
  }
  public function setImagen ($imagen){
    $this->imagen = $imagen;
  }

  public function crearArticulo(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "insert into tb_articulos (titulo, texto, ruta_imagen) VALUES ('".$this->titulo."', '".$this->texto."', '".$this->imagen."');";

    if($Conexion->query($consulta)){
          $resultadoNuevoId = $Conexion->query("SELECT LAST_INSERT_ID() as id");
          $resultadoNuevoId = $resultadoNuevoId->fetch_array();
          return $resultadoNuevoId['id'];
    }else{
        // echo $consulta;
        return false;
    }
  }

  public function modificarArticulo(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "update tb_articulos
         SET titulo = '".$this->titulo."',
          texto = '".$this->texto."'
           WHERE (id_articulo = '".$this->id_articulo."');";
    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }
  }

  public function eliminarArticulo(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "DELETE FROM tb_articulos WHERE (id_articulo = ".$this->id_articulo.") ";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }

  }

  public function eliminarImgArticulo(){
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

  public function obtenerArticulo(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("select * from tb_articulos;");
     return $resultado_consulta;

  }



      function gen_fun_create($ext){
        return "imagecreatefrom".$ext;
      }
}


 ?>
