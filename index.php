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
        <link rel="stylesheet" href='./css/fullcalendar.min.css' />
        <link rel="stylesheet" href='./css/fullcalendar.print.min.css' media='print' />
        <link href='./inmersive-slider/immersive-slider.css' rel='stylesheet' type='text/css'>



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

   <div class="col-md-7">
     <div class="row">
          <?php

          $Noticia = new Noticia();
          $listado_noticias = $Noticia->obtenerNoticias("where tipo_imagen=1 and (estado = 1)");

                    $contador = 1;
                    while($filas = $listado_noticias->fetch_array()){

                     $fecha=date_create($filas['fecha']);
                     $fecha= date_format($fecha, 'd/m/Y');

                     echo ' <div class=" col-md-4">
                              <div class="card" class="col-md-3">
                                  <img class="card-img-top" src="./imagenes/noticias/'.$filas['ruta_imagen'].'" alt="Card image">

                                  <div class="card-body">
                                    <h4 class="card-title"><span id="txt_nombre_'.$contador.'" >'.$filas['titulo'].'</span></h4>
                                    <p class="card-text"><span id="txt_nombre_'.$contador.'" >'.substr($filas['texto'],0,100).'...</span></p>
                                    <p class="card-text"><span  id="txt_nombre_'.$contador.'" >'.$fecha.'</span></p>
                                  </div>

                               </div>
                            </div>';
                      $contador++;
                   }
          ?>
       </div>
      </div>

      <script>
        $(document).ready(function() {




          var eventos_agendados=0;

               var initialLocaleCode = 'es';

               $('#calendar').fullCalendar({
                 header: {
                   // left: 'prev,next today',
                   // center: 'title',
                   // right: 'agendaDay,agendaWeek,month'
                 },
                   editable: false,
                   eventLimit: true, // allow "more" link when too many events
                   selectable: true,
                   selectHelper: true,
                 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles',
                          'Jueves', 'Viernes', 'Sabado'],
                 dayNamesShort:['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                 monthNames:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                 monthNamesShort:['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                             'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                 buttonText: {
                           today:    'Hoy',
                           month:    'Mes',
                           week:     'Semana',
                           day:      'Dia',
                           list:     'Lista'
                       },
                 allDayText:"Todo el dia",
                 hiddenDays: [0],
                 minTime:"08:00:00",
                 maxTime:"22:00:00",
                 firstDay:1,
                 columnFormat:'ddd D',
                 titleFormat: 'MMMM YYYY',
                 defaultView:'month',

                          select: function(start, end){

                           $("#formulario_actividad")[0].reset();
                           $("#txt_id_actividad").val("");
                           $("#modal_actividad #txt_inicio").val(moment(start).format('DD-MM-YYYY HH:mm'));
                           $("#modal_actividad #txt_fin").val(moment(end).format('DD-MM-YYYY HH:mm'));
                           $("#btn_eliminar_actividad").addClass("d-none");

                           $("#modal_actividad").modal('show');

                         },
                         eventRender: function(event, element){
                           element.bind('click', function(){
                             $('#modal_actividad #txt_id_actividad').val(event.id);
                             $('#modal_actividad #txt_descripcion_actividad').val(event.title);
                             $('#modal_actividad #txt_lugar_actividad').val(event.lugar);
                             $("#btn_eliminar_actividad").removeClass("d-none");

                             $("#modal_actividad #txt_inicio").val(event.start.format('DD-MM-YYYY HH:mm'));
                             $("#modal_actividad #txt_fin").val(event.end.format('DD-MM-YYYY HH:mm'));

                             $("#modal_informacion_actividad").modal('show');
                           });
                         },
                         eventDrop: function(event, delta, revertFunc) { // si changement de position
                           modificarFechaActividad(event.id,event.start.format(),event.end.format());
                         },
                         eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                           modificarFechaActividad(event.id,event.start.format(),event.end.format());
                         },


                 events:[
                           {
                            id: '1',
                            title: 'hola',
                            start: '2018-04-02 13:00',
                            end: '2018-04-02 14:00',
                          },
                      ],

               });
            });

      $(document).ready(function(){
      actualizarEventos(false);
      });
      </script>

      <div class="col-md-5">
          <div class="col-lg-12 text-center">
              <h1>Eventos próximos</h1>
              <!-- <p class="lead">Completa con rutas de archivo predefinidas que no tendrás que cambiar!</p> -->
              <div id='calendar' style="" class=" card col-12"></div>
              </div>
          </div>
      </div>

</div>
  <script src='./js/fullcalendar.min.js'></script>
  <script type="text/javascript" src="./inmersive-slider/jquery.immersive-slider.js"></script>

  <footer>
    <?php sub_footer(); ?>
	</footer>


</body>
</html>
