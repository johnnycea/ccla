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
$fecha = $_REQUEST['fecha'];
$estado = $Funciones->limpiarNumeroEntero($_REQUEST['estado']);
// $imagen = $Funciones->limpiarTexto($_REQUEST['imagen']);


//Creamos objeto de la clase empresa y seteamos sus valores
$Noticia = new Noticia();
$Noticia->setTitulo($titulo);
$Noticia->setTexto($texto);
$Noticia->setFecha($fecha);
$Noticia->setEstado($estado);
// $Noticia->setImagen($imagen)


if($idCreada = $Noticia->crearNoticia()){
   echo "1";
echo "la empresa creada es id_ ".$idCreada;

   $contadorFotos = $Funciones->limpiarNumeroEntero($_REQUEST['contadorFotos']);

  // echo "contador es: ".$contadorFotos;
   for($c=1;$c<=$contadorFotos;$c++){
         $campo= "foto".$c;
         $principal= "principal".$c;

         $tipoImagenFinal = "0";

         if(isset($_REQUEST[$principal])){
           $tipoImagenFinal = "1";
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


                                               $consulta="insert into tb_imagenes_noticias(ruta_imagen, tipo_imagen, id_noticia) values('".$nombreImagenActual."',".$tipoImagenFinal.",".$idCreada.")";

                                               if($conexion->query($consulta)){
                                                 echo "agrega foto";
                                               }else{
                                                 echo "error al agregar foto ".$consulta;
                                               }
                                           }

         }
}else{
   echo "2";
}


 ?>
