<?php

require_once 'Conexion.php';

Class Noticia{

  private $id_noticia;
  private $titulo;
  private $texto;
  private $estado;

  public function setIdNoticia($id_noticia){
    $this->id_noticia = $id_noticia;
  }
  public function setTitulo ($titulo){
    $this->titulo=$titulo;
  }
  public function setTexto ($texto){
    $this->texto=$texto;
  }
  public function setEstado ($estado){
    $this->estado=$estado;
  }
  public function setIdImagen ($id_imagen){
    $this->id_imagen=$id_imagen;
  }

  public function crearNoticia(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "insert into tb_noticias (titulo, texto) VALUES ('".$this->titulo."', '".$this->texto."');";

    if($Conexion->query($consulta)){
          $resultadoNuevoId = $Conexion->query("SELECT LAST_INSERT_ID() as id");
          $resultadoNuevoId = $resultadoNuevoId->fetch_array();
          return $resultadoNuevoId['id'];
    }else{
        // echo $consulta;
        return false;
    }
  }

  public function modificarNoticia(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "tb_noticias
         SET titulo = '".$this->titulo."',
          texto = '".$this->texto."',
          estado = '".$this->estado."'
           WHERE (id_noticia = '".$this->id_noticia."');";
    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }
  }

  public function eliminarNoticia(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "update tb_noticias SET estado = '3' WHERE (id_noticia = ".$this->id_noticia.") ";

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

  public function obtenerNoticias(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("select * from vista_noticias where tipo_imagen=1");
     return $resultado_consulta;

  }
  public function obtenerNoticiasActivas(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("SELECT * FROM vista_noticias where tipo_imagen=1 and estado=1");
     return $resultado_consulta;

  }

  public function obtenerEmpresasActivasInactivas(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                               where ( estado_empresa=1 or estado_empresa=2 )");
     return $resultado_consulta;

  }

  public function obtenerEmpresasPorCategorias(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("SELECT * from tb_empresas e
                                              left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                              where ie.tipo_imagen=1 AND categoria_empresa = ".$this->categoria_empresa);
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


    public function obtenerEmpresas(){
       $Conexion = new Conexion();
       $Conexion = $Conexion->conectar();

       $resultado_consulta = $Conexion->query("SELECT * from tb_empresas e
                                                left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                where ie.tipo_imagen=1 and e.id_empresa =".$this->id_empresa);

       return $resultado_consulta;

      }


        public function obtenerEmpresasAfiche(){
           $Conexion = new Conexion();
           $Conexion = $Conexion->conectar();

           $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                                    left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                    where ie.tipo_imagen=2 AND estado_empresa=1 AND e.id_empresa=".$this->id_empresa);
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

         $resultado_consulta = $Conexion->query("SELECT * from tb_imagenes_noticias
                                                  where id_noticia=".$this->id_noticia);
         return $resultado_consulta;

      }

      function gen_fun_create($ext){
        return "imagecreatefrom".$ext;
      }
}


 ?>
