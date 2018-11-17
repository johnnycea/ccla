<?php
require("comun.php");
require("./clases/Noticia.php");

 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>CCLA</title>

       <?php
       cargarHead();

        ?>
        <!-- //slider principal -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="./inmersive-slider/jquery.immersive-slider.js"></script>
        <link href='./inmersive-slider/immersive-slider.css' rel='stylesheet' type='text/css'>
        <!-- <link href='./css/estilos-slider-inmersive.css' rel='stylesheet' type='text/css'> -->


        <link rel="stylesheet"  href="./lightslider-master/src/css/lightslider.css"/>

        <style>
          ul{
          list-style: none outside none;
            padding-left: 0;
                margin: 0;
        }
           .item{
                margin-bottom: 60px;
            }
        .content-slider li{
            background-color: #ed3020;
            text-align: center;
            color: #FFF;
        }
        .content-slider h3 {
            margin: 0;
            padding: 70px 0;
        }
        .demo{
          width: 800px;
        }
        </style>


        <link href="./css/camera.css" rel="stylesheet" type="text/css"/>



    </head>
    <body>


  <div class="container-fluid">
<?php
      cargarMenuPrincipal();
 ?>



 <div class="wrapper">

     <div class="main">
       <div class="page_container">
         <div id="immersive_slider">

          <?php
            $noticias_slider = new Noticia();
            $listado_noticias_slider = $noticias_slider->obtenerNoticias(" where estado=1 and tipo_imagen=1 order by id_noticia desc limit 3");

            while($filas = $listado_noticias_slider->fetch_array()){
                   echo '
                   <div class="slide" data-blurred="./imagenes/noticias/'.$filas['ruta_imagen'].'">
                     <div class="content">
                       <h2><a href="http://www.bucketlistly.com" target="_blank">'.$filas['titulo'].'</a></h2>
                       <p>'.$filas['texto'].'</p>
                     </div>
                     <div class="image">
                       <a href="http://www.bucketlistly.com" target="_blank">
                         <img src="./imagenes/noticias/'.$filas['ruta_imagen'].'" alt="Slider 1">
                       </a>
                     </div>
                   </div>
                   ';
            }

           ?>



           <a href="#" class="is-prev">&laquo;</a>
           <a href="#" class="is-next">&raquo;</a>

         </div>
       </div>
     </div>


   <div class="benefits">
     <div class="page_container">

     </div>
   </div>
   <script type="text/javascript">
     $(document).ready( function() {
       $("#immersive_slider").immersive_slider({
         container: ".main"
       });
     });

   </script>
 </div>
 <script>

   var _gaq=[['_setAccount','UA-11278966-1'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
   (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
   g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
   s.parentNode.insertBefore(g,s)}(document,'script'));
 </script>

  <!-- imagen principal -->

<br>
<br>
<br>

<div class="row">
  <?php

  $Noticia = new Noticia();
  $listado_noticias = $Noticia->obtenerNoticias("where tipo_imagen=1 and (estado = 1)");


            $contador = 1;
            while($filas = $listado_noticias->fetch_array()){

             $clase="";
             if($filas['estado']==2){
               $clase="table-warning";
             }

             $fecha=date_create($filas['fecha']);
             $fecha= date_format($fecha, 'd/m/Y');

             echo ' <div class=" col-md-4">
                      <div class="card" class="col-md-3">
                          <img class="card-img-top" src="./imagenes/noticias/'.$filas['ruta_imagen'].'" alt="Card image">

                          <div class="card-body">
                            <h4 class="card-title"><span id="txt_nombre_'.$contador.'" >'.$filas['titulo'].'</span></h4>
                            <p class="card-text"><span id="txt_nombre_'.$contador.'" >'.$filas['texto'].'</span></p>
                            <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$fecha.'</span></p>

                          </div>

                       </div>
                    </div>';

              $contador++;

           }
  ?>
</div>

<br>

<!-- BANNER EMPRESAS -->
<div class="container-fluid">
<div class="item">
    <ul id="content-slider" class="content-slider">
      <?php
          // $Empresa = new Empresa(); //instancio lo de la clase categoria
          // $respuesta = $Empresa->obtenerEmpresasActivas();
          //
          //   while ($filas = $respuesta->fetch_array()) {
          //     echo '
          //           <div>
          //             <a href="./descripcion_empresa.php?idEmpresa='.$filas['id_empresa'].'">
          //               <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" /></a>
          //             </a>
          //           </div>
          //         ';
          //  }
       ?>

    </ul>
</div>
</div>


       </div>


    <footer>

    <?php
      sub_footer();
      ?>
	</footer>


  <script src="./lightslider-master/src/js/lightslider.js"></script>

  <script>

  var ancho_pantalla = screen.width;

  if(ancho_pantalla < 800){
     $(document).ready(function() {
           $("#content-slider").lightSlider({
                loop:true,
                keyPress:true,
                auto:true,
                speed:500,
                item:1,
                thumbItem:9,
                slideMargin: 1,
            });

    });
  }else{
    $(document).ready(function() {

        $("#content-slider").lightSlider({
                  loop:true,
                  keyPress:true,
                  auto:true,
                  speed:600,
                  item:4,
                  thumbItem:9,
                  slideMargin: 2,
              });
    });
  }
  </script>

  <script src="./js/easing.min.js" type="text/javascript"></script>
  <script src="./js/camera.min.js" type="text/javascript"></script>
  <!-- Custom JS --->
  <script src="./js/plugins.js"></script>


  <script>

  var ancho_pantalla = screen.width;
  // alert(ancho_pantalla);
  $(function () {

  if(ancho_pantalla < 800){
    $('.camera_wrap').camera({
      playPause: false,
      navigation: false,
      navigationHover: true,
      hover: false,
      loader: 'bar',
      loaderColor: '#fc8132',
      loaderBgColor: '#222222',
      loaderOpacity: 1,
      loaderPadding: 0,
      time: 2000,
      transPeriod: 1500,
      pauseOnClick: true,
      pagination: false,
      height: '100%',
    });
  }else{
    $('.camera_wrap').camera({
      playPause: false,
      navigation: false,
      navigationHover: true,
      hover: false,
      loader: 'bar',
      loaderColor: '#fc8132',
      loaderBgColor: '#222222',
      loaderOpacity: 1,
      loaderPadding: 0,
      time: 2000,
      transPeriod: 1500,
      pauseOnClick: true,
      pagination: false,
      height: '35%',
    });
  }


  });
  </script>


</body>


</html>
