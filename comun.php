<?php
function comprobarSession(){
  @session_start();
  if(isset($_SESSION['run']) and isset($_SESSION['nombre'])){

  }else{
     header("location: index.php");
  }
}

    function cargarHead(){
?>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/estilos.css">
        <!-- <link rel="stylesheet" href="./css/estilosSlider.css"> -->
        <link rel="stylesheet" type="text/css" href="./css/sweet-alert.css">
        <link rel="stylesheet" type="text/css" href="./css/sweet-alert.css">

        <script src='./js/jquery-3.1.0.min.js'></script>
        <!-- <script src='./js/moment.min.js'></script> -->
        <script src='./js/bootstrap.min.js'></script>

        <!-- <script src="./js/validaciones.js"></script> -->
        <script src="./js/fontawesome-all.min.js"></script>
        <script src="./js/sweetalert.min.js"></script>
        <script src='./js/moment.min.js'></script>

  <?php
}
    function cargarCategorias(){
?>

    <style>
    #listado_categorias .categorias{
      text-decoration: none;
      display: inline;
      color:white;
      font-size: 17px;
      padding-bottom: 0px;
    }
    #listado_categorias .categorias-md{
      text-decoration: none;
      display: inline;
      color:white;
      font-size: 17px;
      padding-bottom: 0px;
      margin-left: 0px;
    }
    </style>

      <!-- <div id="listado_categorias" class="container-fluid">
        <center>
           <div class="row justify-content-center">

             <?php
                 // $Categoria = new Categoria(); //instancio lo de la clase categoria
                 // $respuesta = $Categoria->obtenerCategorias();
                 //
                 //
                 //   while ($filas = $respuesta->fetch_array()) {
                 //
                 //     echo '<div class=" d-none d-md-block categorias-md col-md-1">
                 //           <center>
                 //             <a href="categorias.php?id='.$filas['id_categoria'].'">
                 //                <span class="'.$filas['icono'].'"></span>
                 //                <br />
                 //                <label for="">'.$filas['descripcion_categoria'].'</label>
                 //              </a>
                 //           </center>
                 //              <span>&nbsp&nbsp</span>
                 //           </div>';
                 //
                 //     echo '<div class="col-3 d-md-none col-md-3 categorias">
                 //            <center>
                 //             <a href="categorias.php?id='.$filas['id_categoria'].'">
                 //                <span class="'.$filas['icono'].'"></span>
                 //                <br />
                 //                <label for="">'.$filas['descripcion_categoria'].'</label>
                 //              </a>
                 //            </center>
                 //
                 //           </div>';
                 //  }
              ?>
            </div>
          </center>
       </div> -->

  <?php
}




function VentanaCargando(){
  ?>
<style>
.loader,
.loader:before,
.loader:after {
  background: #b63333;
  -webkit-animation: load1 1s infinite ease-in-out;
  animation: load1 1s infinite ease-in-out;
  width: 1em;
  height: 4em;
}
.loader:before,
.loader:after {
  position: absolute;
  top: 0;
  content: '';
}
.loader:before {
  left: -1.5em;
}
.loader {
  text-indent: -9999em;
  margin: 40% auto;
  position: relative;
  font-size: 11px;
  -webkit-animation-delay: 0.16s;
  animation-delay: 0.16s;
}
.loader:after {
  left: 1.5em;
  -webkit-animation-delay: 0.32s;
  animation-delay: 0.32s;
}
@-webkit-keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0 #b63333;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em #b63333;
    height: 5em;
  }
}
@keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0 #b63333;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em #b63333;
    height: 5em;
  }
}
</style>
  <div id="contenedor">
      <div class="loader" id="loader">Loading...</div>
   </div>

  <?php
}

function cargarMenuConfiguraciones(){
  $url= basename($_SERVER['PHP_SELF']);

  if($url=="administracion_noticias.php"){
      echo '<a href="./administracion_noticias.php" class="active btn btn-info col-12">Noticias </a>';
  }else{
      echo '<a href="./administracion_noticias.php" class="btn btn-info col-12">Noticias </a>';
  }
  echo'<hr>';

  if($url=="administracion_directorio.php"){
      echo '<a href="./administracion_directorio.php" class="active btn btn-info col-12">Directorio </a>';
  }else{
      echo '<a href="./administracion_directorio.php" class="btn btn-info col-12">Directorio</a>';
  }
  echo'<hr>';

  if($url=="administracion_articulo.php"){
      echo '<a href="./administracion_articulo.php" class="active btn btn-info col-12">Articulo </a>';
  }else{
      echo '<a href="./administracion_articulo.php" class="btn btn-info col-12">Articulo </a>';
  }


  echo'<hr>';

  if($url=="administracion_evento.php"){
      echo '<a href="./administracion_evento.php" class="active btn btn-info col-12">Eventos </a>';
  }else{
      echo '<a href="./administracion_evento.php" class="btn btn-info col-12">Eventos </a>';
  }

  echo'<hr>';

  if($url=="administracion_empresas.php"){
    echo '<a href="./administracion_empresas.php" class="active btn btn-info col-12">Empresa </a>';
  }else{
    echo '<a href="./administracion_empresas.php" class="btn btn-info col-12">Empresa </a>';
  }
  echo'<hr>';

  echo '<a href="./cerrarSesion.php" class=" btn btn-danger col-12">Cerrar Sesión </a>';

  echo'<hr>';
  //
  // if($url=="usuarios.php"){
  //     echo '<a href="./usuarios.php" class="active btn btn-info col-12">Usuarios </a>';
  // }else{
  //     echo '<a href="./usuarios.php" class="btn btn-info col-12">Usuarios </a>';
  // }
  //
  //    echo'<hr>';

  // if($url=="departamentos.php"){
  //     echo '<a href="./departamentos.php" class="active btn btn-info col-12">Departamentos </a>';
  // }else{
  //     echo '<a href="./departamentos.php" class="btn btn-info col-12">Departamentos </a>';
  // }

  ?>


  <?php
}

function cargarMenuPrincipal(){
?>



<style>
.bg-light {
    background-color: #22678f!important;
}
.nav-link{
    background-color: #22678f!important;
    color:white!important;
    font-size: 20px;
    margin-right: 2px;
    padding-top:15px;
    padding-bottom:15px;  /*inferior*/
}
#menu_principal{
  margin:0;
  padding: 0;
}
</style>

<div class="container-fluid">
    <nav id="menu_principal" class="navbar navbar-expand-lg navbar-light ">

      <a class="navbar-brand" href="./index.php">
        <img src="./img/logoccla.png" width="240" height="100" class="d-inline-block align-top" alt="">
      </a>


      <ul class="navbar-nav mr-sm-1  ml-auto">

        <li class="nav-item active">
          <img src="./img/footer1.png" width="80" height="80" class="d-inline-block align-top" alt="">
        </li>
        <li class="nav-item active">
          <img src="./img/footer2.png" width="180" height="80" class="d-inline-block align-top" alt="">
        </li>
        <li class="nav-item active">
          <img src="./img/footer3.png" width="150" height="80" class="d-inline-block align-top" alt="">
        </li>

      </ul>

    </nav>

 </div>
</div>


<div id="menu_principal" class="container-fluid">
    <nav id="menu_principal" class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03" >

          <ul class="navbar-nav mr-sm-1  ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">&nbsp;&nbsp;Inicio<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Descuentos.php">&nbsp;&nbsp;¿Quienes somos?<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Descuentos.php">&nbsp;&nbsp;Ser socio<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="eventos.php">&nbsp;&nbsp;Servicios<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="quienes_somos.php">&nbsp;&nbsp;Bio Bio Crece<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="quienes_somos.php">&nbsp;&nbsp;Biblioteca<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contactanos.php">&nbsp;&nbsp;Contactanos<span class="sr-only"></span></a>
            </li>
          </ul>
      </div>
    </nav>

 </div>
</div>

<?php
}


function sub_footer(){
 ?>

<div class="sub_footer">
    <span>&copy;Todos Los Derechos Reservados</span>

</div>

<?php }

function login(){ ?>
  <script>
      $('#inicio_sesion').submit(function(){
          event.preventDefault();
          $.ajax({
              url:"../comun/validarSesion.php",
              data:$('#inicio_sesion').serialize(),
              success:function(respuesta){

              if(respuesta == '1'){
              window.location = 'indexAdmin.php';
              }else if(respuesta == '2'){
                  window.location = 'perfil-usuario.php';

              }else{
                   alert("Usuario no Registrado en el sistema o sin los permisos Necesarios.");
                   location.reload();
              }
          }

          });
      });
  </script>
  <?php }
