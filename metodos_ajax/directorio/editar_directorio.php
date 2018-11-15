<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Directorio.php';

$Funciones = new Funciones();


//SE DEFINEN VARIABLES
//SE ASIGNAN LOS VALORES RECIBIDOS
//SE LIMPIAN LOS DATOS RECIBIDOS DE CARACTERES EXTRAÑOS
$id_miembro = $Funciones->limpiarNumeroEntero($_REQUEST['id_miembro']);
$titulo = $Funciones->limpiarTexto($_REQUEST['txt_nombre']);
$cargo = $Funciones->limpiarTexto($_REQUEST['txt_cargo']);
$correo = $Funciones->limpiarTexto($_REQUEST['txt_correo']);

//Creamos objeto de la clase empresa y seteamos sus valores
$Directorio = new Noticia();
$Directorio->setIdNoticia($id_miembro);
$Directorio->setTitulo($titulo);
$Directorio->setTexto($cargo);
$Directorio->setFecha($correo);

// imagen directorio
$numeroRandom= rand(5,1000).date("d").date("m").date("Y");
$nombreImagenActual=$numeroRandom.basename( $_FILES[$campo]['name']);
// $nombreImagenActual= str_replace("�","n",$nombreImagenActual);
// $nombreImagenActual= str_replace("ñ","n",$nombreImagenActual);
// $nombreImagenActual= str_replace("Ñ","N",$nombreImagenActual);

    $target_path = "./imagenes/directorio/";
    $target_path = $target_path.$nombreImagenActual;
    $file = $_FILES[$campo];

          if(move_uploaded_file($file['tmp_name'],"../../imagenes/directorio/".$file['name'])){
               // echo " Ha sido subido satisfactoriamente";
               echo "se subio la imagen";
          }else{
            echo "no se subio";
          }


          $conexion = new Conexion();
          $conexion = $conexion->conectar();

         $consultaFotos="insert into tb_directorio(ruta_foto,id_directio,tipo_imagen) values('".$nombreImagenActual."',".$id_miembro.",".$tipoImagenFinal.")";

         if($conexion->query($consultaFotos)){
           echo "agrega foto";
         }else{
           echo "error al agregar foto";
         }

 ?>
