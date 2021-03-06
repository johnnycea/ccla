<?php

require_once 'Conexion.php';

Class Empresa{

  private $id_empresa;
  private $nombre_empresa;
  private $descripcion;
  private $imagen;
  private $telefono;
  private $correo;
  private $sitio_web;
  private $facebook;
  private $instagram;
  private $estado;

  public function setIdEmpresa($id_empresa){
    $this->id_empresa = $id_empresa;
  }
  public function setNombre ($nombre_empresa){
    $this->nombre_empresa=$nombre_empresa;
  }
  public function setDescripcion ($descripcion){
    $this->descripcion=$descripcion;
  }
  public function setImagen ($imagen){
    $this->imagen = $imagen;
  }
  public function setTelefono ($telefono){
    $this->telefono=$telefono;
  }
    public function setCorreo ($correo){
      $this->correo=$correo;
    }
    public function setSitioWeb ($sitio_web){
      $this->sitio_web=$sitio_web;
    }
    public function setFacebook ($facebook){
      $this->facebook=$facebook;
    }
    public function setInstagram ($instagram){
      $this->instagram=$instagram;
    }
    public function setEstado ($estado){
      $this->estado=$estado;
    }

  public function crearEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "insert INTO tb_empresas_relacionadas (nombre_empresa, descripcion_empresa, ruta_imagen, telefono, correo, sitio_web, facebook, instagram, estado)
      VALUES ('".$this->nombre_empresa."', '".$this->descripcion."', '".$this->imagen."' , '".$this->telefono."', '".$this->correo."', '".$this->sitio_web."','".$this->facebook."', '".$this->instagram."','".$this->estado."');";
    if($Conexion->query($consulta)){
          $resultadoNuevoId = $Conexion->query("SELECT LAST_INSERT_ID() as id");
          $resultadoNuevoId = $resultadoNuevoId->fetch_array();
          return $resultadoNuevoId['id'];
    }else{
        // echo $consulta;
        return false;
    }
  }

  public function modificarEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "update tb_empresas
         SET nombre_empresa = '".$this->nombre_empresa."',
          descripcion_empresa = '".$this->descripcion_empresa."',
          categoria_empresa = '".$this->categoria_empresa."',
          ruta_imagen = '".$this->estado_empresa."',
          video_empresa = '".$this->video_empresa."',
          coordenadas = '".$this->coordenadas_empresa."',
          facebook = '".$this->facebook."',
          instagram = '".$this->instagram."',
          horario = '".$this->horario."'
           WHERE (id_empresa = '".$this->id_empresa."');";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }
  }

  public function eliminarEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "update tb_empresas_relacionadas set estado_empresa='2' WHERE (id_empresa = ".$this->id_empresa.") ";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }

  }

  public function eliminarImgEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "delete from tb_imagenes_empresa WHERE (id_imagen = ".$this->id_imagen.") ";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }

  }

  public function obtenerEmpresas(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas_relacionadas");
     return $resultado_consulta;

  }



  public function buscarEmpresas($texto_buscar){

     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

       $resultado_consulta = $Conexion->query("SELECT * from tb_empresas e
                                                inner join categoria_empresas c on e.categoria_empresa=c.id_categoria
                                                left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                where tipo_imagen=1 and
                                                (e.nombre_empresa like '%".$texto_buscar."%'
                                                or e.descripcion_empresa like '%".$texto_buscar."%'
                                                or c.descripcion_categoria like '%".$texto_buscar."%'
                                                )");
     return $resultado_consulta;

    }



        public function obtenerImgEmpresas(){
          $Conexion = new Conexion();
          $Conexion = $Conexion->conectar();

          $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                                   left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                   where ie.tipo_imagen=1 AND estado_empresa=1 AND e.id_empresa=".$this->id_empresa);
          return $resultado_consulta;

       }


       public function obtenerImgEmpresasTodas(){
         $Conexion = new Conexion();
         $Conexion = $Conexion->conectar();

         $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                                  left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                  where ie.tipo_imagen=0 AND estado_empresa=1 AND e.id_empresa=".$this->id_empresa);
         return $resultado_consulta;

      }

       public function mostrarImagenesUnaEmpresaParaModificar(){
         $Conexion = new Conexion();
         $Conexion = $Conexion->conectar();

         $resultado_consulta = $Conexion->query("SELECT * from tb_imagenes_empresa
                                                  where id_empresa=".$this->id_empresa);
         return $resultado_consulta;

      }

      function gen_fun_create($ext){
        return "imagecreatefrom".$ext;
      }
}


 ?>
