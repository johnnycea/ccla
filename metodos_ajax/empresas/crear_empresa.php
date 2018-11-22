<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Empresa.php';

$Funciones = new Funciones();
//SE DEFINEN VARIABLES
//SE ASIGNAN LOS VALORES RECIBIDOS
//SE LIMPIAN LOS DATOS RECIBIDOS DE CARACTERES EXTRAÑOS
// $id_miembro = $Funciones->limpiarTexto($_REQUEST['txt_miembro']);
$nombre = $Funciones->limpiarTexto($_REQUEST['txt_nombre']);
$descripcion = $Funciones->limpiarTexto($_REQUEST['txt_descripcion']);
$nombre_campo_imagen= 'txt_imagen';
$telefono = $Funciones->limpiarTexto($_REQUEST['txt_telefono']);
$correo = $Funciones->limpiarTexto($_REQUEST['txt_correo']);
$sitio_web = $Funciones->limpiarTexto($_REQUEST['txt_sitio_web']);
$facebook = $Funciones->limpiarTexto($_REQUEST['txt_facebook']);
$instagram = $Funciones->limpiarTexto($_REQUEST['txt_instagram']);
$estado = $Funciones->limpiarTexto($_REQUEST['cmb_estado']);


// imagen directorio
$numeroRandom= rand(5,1000).date("d").date("m").date("Y");
$nombreImagenActual=$numeroRandom.basename( $_FILES[$nombre_campo_imagen]['name']);
$nombreImagenActual= str_replace("�","n",$nombreImagenActual);
$nombreImagenActual= str_replace("ñ","n",$nombreImagenActual);
$nombreImagenActual= str_replace("Ñ","N",$nombreImagenActual);

    $target_path = "./imagenes/empresas/";
    $target_path = $target_path.$nombreImagenActual;
    $file = $_FILES[$nombre_campo_imagen];

          if(move_uploaded_file($file['tmp_name'],"../../imagenes/empresas/".$nombreImagenActual)){

              //Creamos objeto de la clase empresa y seteamos sus valores
              $Empresa = new Empresa();
              $Empresa->setNombre($nombre);
              $Empresa->setDescripcion($descripcion);
              $Empresa->setImagen($nombreImagenActual);
              $Empresa->setTelefono($telefono);
              $Empresa->setCorreo($correo);
              $Empresa->setSitioWeb($sitio_web);
              $Empresa->setFacebook($facebook);
              $Empresa->setInstagram($instagram);
              $Empresa->setEstado($estado);

              if($Empresa->crearEmpresa()){
                echo "1";
              }else{
                 echo "2";
              }

                  }else{
                    echo "3";
                  }







 ?>
