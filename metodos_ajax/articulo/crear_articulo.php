<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Articulo.php';

$Funciones = new Funciones();


//SE DEFINEN VARIABLES
//SE ASIGNAN LOS VALORES RECIBIDOS
//SE LIMPIAN LOS DATOS RECIBIDOS DE CARACTERES EXTRAÑOS
// $id_miembro = $Funciones->limpiarTexto($_REQUEST['txt_miembro']);
$titulo = $Funciones->limpiarTexto($_REQUEST['txt_titulo']);
$texto = $Funciones->limpiarTexto($_REQUEST['txt_texto']);
$nombre_campo_imagen= 'txt_imagen';


// imagen directorio
$numeroRandom= rand(5,1000).date("d").date("m").date("Y");
$nombreImagenActual=$numeroRandom.basename( $_FILES[$nombre_campo_imagen]['name']);
$nombreImagenActual= str_replace("�","n",$nombreImagenActual);
$nombreImagenActual= str_replace("ñ","n",$nombreImagenActual);
$nombreImagenActual= str_replace("Ñ","N",$nombreImagenActual);

    $target_path = "./imagenes/articulo/";
    $target_path = $target_path.$nombreImagenActual;
    $file = $_FILES[$nombre_campo_imagen];

          if(move_uploaded_file($file['tmp_name'],"../../imagenes/articulo/".$nombreImagenActual)){

              //Creamos objeto de la clase empresa y seteamos sus valores
              $Articulo = new Articulo();
              $Articulo->setTitulo($titulo);
              $Articulo->setTexto($texto);
              $Articulo->setImagen($nombreImagenActual);

              if($Articulo->crearArticulo()){
                echo "1";
              }else{
                 echo "2";
              }

          }
          // else{
          //   echo "3";
          // }







 ?>
