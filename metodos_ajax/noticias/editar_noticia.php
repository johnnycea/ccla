<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Noticia.php';

$Funciones = new Funciones();


//SE DEFINEN VARIABLES
//SE ASIGNAN LOS VALORES RECIBIDOS
//SE LIMPIAN LOS DATOS RECIBIDOS DE CARACTERES EXTRAÑOS
$titulo = $Funciones->limpiarTexto($_REQUEST['txt_titulo']);
$texto = $Funciones->limpiarTexto($_REQUEST['txt_texto']);
// $fecha = $_REQUEST['fecha'];
$estado = $Funciones->limpiarNumeroEntero($_REQUEST['estado']);


// $estado = $Funciones->limpiarNumeroEntero($_REQUEST['select_estado_usuario']);

//Creamos objeto de la clase empresa y seteamos sus valores
$Noticia = new Noticia();
$Noticia->setTitulo($titulo);
$Noticia->setTexto($texto);
// $Noticia->setFecha($fecha);
$Noticia->setEstado($estado);

if($Noticia->modificarNoticia()){
   echo "1";


   $contadorFotos = $Funciones->limpiarNumeroEntero($_REQUEST['contadorFotos']);

   for($c=1;$c<=$contadorFotos;$c++){
         $campo= "foto".$c;
         $principal= "principal".$c;
         $afiche= "afiche".$c;

         $tipoImagenFinal = "0";

         if(isset($_REQUEST[$principal])){
           $tipoImagenFinal = "1";
         }else{
           $tipoImagenFinal = "1";
         }
         if(isset($_REQUEST[$afiche])){
           $tipoImagenFinal = "2";
         }else{
           $tipoImagenFinal = "2";
         }

                     $numeroRandom= rand(5,1000).date("d").date("m").date("Y");
                     $nombreImagenActual=$numeroRandom.basename( $_FILES[$campo]['name']);
                     $nombreImagenActual= str_replace("�","n",$nombreImagenActual);
                     $nombreImagenActual= str_replace("ñ","n",$nombreImagenActual);
                     $nombreImagenActual= str_replace("Ñ","N",$nombreImagenActual);

                         $target_path = "../../imagenes/noticias/";
                         $target_path = $target_path.$nombreImagenActual;


                         $target_path= str_replace("�","n",$target_path);
                         $target_path= str_replace("ñ","n",$target_path);
                         $target_path= str_replace("Ñ","N",$target_path);

                                 //--------------cambia a jpg---------------
                                       $imagen=getimagesize($_FILES[$campo]['tmp_name']);//obtenemos el tipo
                                       $extencion=image_type_to_extension($imagen[2],false);//aqui obtenemos la extencion de la imagen
                                       $imagecreate=$Noticia->gen_fun_create($extencion);//generamos el nombre de la funcion a la que hay que llamar
                                       $nimagent=$imagecreate($_FILES[$campo]['tmp_name']);//creamos la imagen con la funcion creada
                                           $archivo=$target_path;
                                           if(imagejpeg($nimagent,$target_path)){

                                               $conexion = new Conexion();
                                               $conexion = $conexion->conectar();


                                               $consulta="insert into tb_imagenes_noticias(ruta_imagen, tipo_imagen, id_noticia) values('".$nombreImagenActual."',".$idCreada.",".$tipoImagenFinal.")";

                                               if($conexion->query($consulta)){
                                                 // echo "agrega foto";
                                               }else{
                                                 echo "error al agregar foto";
                                               }
                                           }

         }


}else{
   echo "2";
}

//
// $numeroRandom= rand(5,1000).date("d").date("m").date("Y");
// $nombreImagenActual=$numeroRandom.basename( $_FILES[$campo]['name']);
// // $nombreImagenActual= str_replace("�","n",$nombreImagenActual);
// // $nombreImagenActual= str_replace("ñ","n",$nombreImagenActual);
// // $nombreImagenActual= str_replace("Ñ","N",$nombreImagenActual);
//
//     $target_path = "./imagenes/empresas/";
//     $target_path = $target_path.$nombreImagenActual;
//     $file = $_FILES[$campo];
//
//           if(move_uploaded_file($file['tmp_name'],"../../imagenes/empresas/".$file['name'])){
//                // echo " Ha sido subido satisfactoriamente";
//                echo "se subio la imagen";
//           }else{
//             echo "no se subio";
//           }
//
//
//           $conexion = new Conexion();
//           $conexion = $conexion->conectar();
//
//          $consultaFotos="insert into tb_imagenes_empresa(ruta_foto,id_empresa,tipo_imagen) values('".$nombreImagenActual."',".$id_empresa.",".$tipoImagenFinal.")";
//
//          if($conexion->query($consultaFotos)){
//            echo "agrega foto";
//          }else{
//            echo "error al agregar foto";
//          }

 ?>
