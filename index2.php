<?php
  session_start();
  require 'conexion.php';
  
  if(!isset($_SESSION["id_usuario"])){
    header("Location: index.php");
  }

  $idUsuario = $_SESSION['id_usuario'];

  $sql = "SELECT * FROM registro WHERE numcontrol = '$idUsuario'";
  $result=$mysqli->query($sql);
  
  $row = $result->fetch_assoc();

  //Para mostrar nombre de su carrera y no su numero (id de carrera)
  $sqlcarrea = "SELECT carreras.descripC FROM carreras, registro WHERE carreras.carreraid = ".$row['id_carrera']." AND registro.id_carrera = ".$row['id_carrera']."";
  $resultcarre=$mysqli->query($sqlcarrea);

  $rowcarre = $resultcarre->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tutorias ITT - Bienvenido</title>

  <!-- Latest compiled and minified CSS BootStrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- ICONOS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- FUENTE -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <!-- COLORES PRIMARIOS-->
	<link rel="stylesheet" type="text/css" href="css/material.min-colors.css">
	
</head>


<style>


/*IMAGEN PRINCIPAL - Pie de pagina*/
/* Header Image Background - Change the URL below to your image path (example: ../images/background.jpg) */
.business-header {
    height: 300px;
    background: url('images/fondo8.jpg') center center no-repeat scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}
/* Customize the text color and shadow color and to optimize text legibility. */
.tagline {
    text-shadow: 0 0 10px #000;
    color: #fff;
}
.img-center {
    margin: 0 auto;
}


</style>

<body>


<!-- BARRA PRICIPAL -->
<div class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Titulo -->
      <span class="mdl-layout-title">Sistema de Tutor&iacute;as ITT</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation (BARRA PRICIPAL) -->
      <nav class="mdl-navigation">
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="index2.php"><b>Inicio</b></a>
        <a class="mdl-navigation__link" href="logout.php"><b>Cerrar Sesi&oacute;n</b></a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
  <!-- Menu flotante del Lado Izquierdo -->
    <span class="mdl-layout-title">Menu</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="index2.php">Inicio</a>
      <a class="mdl-navigation__link" href="logout.php">Cerrar Sesi&oacute;n</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">

    <!--IMAGEN PRINCIPAL-->
    <!-- Image Background Page Header -->
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="tagline">Tutor&iacute;as ITT</h1>
                </div>
            </div>
        </div>
    </header>

 <!-- Contenido de la pagina -->
     

<!-- MDL Tab Container -->
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <!-- Tab Bars -->
  <div class="mdl-tabs__tab-bar">
      <a href="#panel1" class="mdl-tabs__tab is-active">Datos Generales</a>
      <a href="#panel2" class="mdl-tabs__tab">Mis Tutor&iacute;as</a>
      <a href="#panel3" class="mdl-tabs__tab">Tutorias</a>
      <a href="#panel4" class="mdl-tabs__tab">Mis Clases</a>
  </div>

  <!-- MDL tab panels, is-active to denote currently active -->
  <div class="mdl-tabs__panel is-active" id="panel1">
    <ul>
    <center>

        <h2>Datos Generales</h2>
        <h3><?php echo 'Bienvenid@ '.utf8_decode($row['nombres']); ?></h3>
          </br>
			<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="800">
			  <tbody>
          <tr>
            <td class="mdl-data-table__cell"><h5>Numero de Control:</h5></td>
            <td> </td>
            <td><h4><?php echo utf8_decode($row['numcontrol']); ?></h4></td>
          </tr>
			    <tr>
            <td class="mdl-data-table__cell"><h5>Nombre Completo:</h5></td>
            <td> </td>
            <td><h4><?php echo utf8_decode($row['nombres']).' '.utf8_decode($row['apellidos']); ?></h4></td>
			    </tr>
			    <tr>
            <td class="mdl-data-table__cell"><h5>Correo Electronico:</h5></td>
            <td></td>
			      <td><h4><?php echo utf8_decode($row['correo']); ?></h4></td>
			    </tr>
          <tr>
            <td class="mdl-data-table__cell"><h5>Semestre</h5></td>
            <td></td>
            <td><h4><?php echo utf8_decode($row['semestre']); ?></h4></td>
          </tr>
          <tr>
            <td class="mdl-data-table__cell"><h5>Telefono:</h5></td>
            <td></td>
            <td><h4><?php echo utf8_decode($row['telefono']); ?></h4></td>
          </tr>
          <tr>
            <td class="mdl-data-table__cell"><h5>Carrera:</h5></td>
            <td></td>
            <td><h4><?php echo utf8_decode($rowcarre['descripC']); ?></h4></td>
          </tr>
			  </tbody>
			</table>
	</center>
    </ul>
  </div>
  
  <!-- MDL Tab panel 2 -->
  <div class="mdl-tabs__panel" id="panel2">
        <center>
        <h2>Mis Tutor&iacute;as</h2>
          </br>
             <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell"><h5>Nombre</h5></th>
                  <th><h5>Maestro</h5></th>
                  <th><h5>Hora Entrada</h5></th>
                  <th><h5>Hora Salida</h5></th>
                  <th><h5>Sal&oacute;n</h5></th>
                  <th><h5>Cupo</h5></th>
                  <th><h5>Cancelar Suscripcion</h5></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="mdl-data-table__cell"><h5>Acrylic (Transparent)</h5></td>
                  <td><h5>25</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><div id="tooltip3" class="icon material-icons">create</div>
                      <div class="mdl-tooltip" for="tooltip3">Modificar Clase</div>
                  </td>
                </tr>
                <tr>
                  <td class="mdl-data-table__cell"><h5>Plywood (Birch)</h5></td>
                  <td><h5>50</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><div id="tooltip3" class="icon material-icons">create</div>
                      <div class="mdl-tooltip" for="tooltip3">Modificar Clase</div>
                  </td>
                </tr>
              </tbody>
            </table>
        </center>
  </div>
  
    <div class="mdl-tabs__panel" id="panel3">
    <ul>
    <center>
        <h2>Tutor&iacute;as</h2>
            </br>
             <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell"><h5>Nombre</h5></th>
                  <th><h5>Maestro</h5></th>
                  <th><h5>Hora Entrada</h5></th>
                  <th><h5>Hora Salida</h5></th>
                  <th><h5>Sal&oacute;n</h5></th>
                  <th><h5>Cupo</h5></th>
                  <th><h5>Suscribirse</h5></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="mdl-data-table__cell"><h5>Acrylic (Transparent)</h5></td>
                  <td><h5>25</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><div id="tooltip3" class="icon material-icons">create</div>
                      <div class="mdl-tooltip" for="tooltip3">Modificar Clase</div>
                  </td>
                </tr>
                <tr>
                  <td class="mdl-data-table__cell"><h5>Plywood (Birch)</h5></td>
                  <td><h5>50</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><div id="tooltip3" class="icon material-icons">create</div>
                      <div class="mdl-tooltip" for="tooltip3">Modificar Clase</div>
                  </td>
                </tr>
              </tbody>
            </table>
  </center>
    </ul>
  </div>


  <!-- MDL Tab panel 4 -->
  <div class="mdl-tabs__panel" id="panel4">
      <center>
            <h2>Mis Clases</h2>
            <table width="300">
              <thead>
                  <tr>
                    <td>
                      <b><h5>Agrega nueva Clase</h5></b>
                   </td>
                   <td></td>
                   <td></td>
                   <td></td>
                   
                   <td>
                   <a href="agregarClase.php">
                     <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                  <i class="material-icons">add</i>
                  
                   </td></a>
                  </tr>
              </thead>
            </table>
            </br></br>
             <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell"><h5>Nombre</h5></th>
                  <th><h5>Hora Entrada</h5></th>
                  <th><h5>Hora Salida</h5></th>
                  <th><h5>Sal&oacute;n</h5></th>
                  <th><h5>L&iacute;mite</h5></th>
                  <th><h5>Modificar</h5></th>
                  <th><h5>Eliminar</h5></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="mdl-data-table__cell"><h5>Acrylic (Transparent)</h5></td>
                  <td><h5>25</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><h5>$2.90</h5></td>
                  <td><div id="tooltip3" class="icon material-icons">create</div>
                      <div class="mdl-tooltip" for="tooltip3">Modificar Clase</div>
                  </td>
                  <td><div id="tooltip2" class="icon material-icons">clear</div>
                      <div class="mdl-tooltip" for="tooltip2">Eliminar Clase</div>
                  </td>
                </tr>
                <tr>
                  <td class="mdl-data-table__cell"><h5>Plywood (Birch)</h5></td>
                  <td><h5>50</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><h5>$1.25</h5></td>
                  <td><div id="tooltip3" class="icon material-icons">create</div>
                      <div class="mdl-tooltip" for="tooltip3">Modificar Clase</div>
                  </td>
                  <td><div id="tooltip2" class="icon material-icons">clear</div>
                      <div class="mdl-tooltip" for="tooltip2">Eliminar Clase</div>
                  </td>
                </tr>
              </tbody>
            </table>
      </center>
    </div>
  </div>
    </br>
    </br>
    </div>
    </br>
    <!-- Pie de Pagina -->
    <footer class="mdl-mini-footer">
      <div class="mdl-mini-footer__left-section">
        <div class="mdl-logo">Sistema de Tutor&iacute;as ITT</div>
        <ul class="mdl-mini-footer__link-list">
            <li><a href="acerca2.php">Acerda de</a></li>
        </ul>
      </div>
    </footer>

  </main>

</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="js/material.min.js"></script>
</body>

</html>


<!-- 

Diseñada mayormente en MDL:
https://getmdl.io/

Basada en los diseños de BootStrap:
(business-header)
https://startbootstrap.com/template-overviews/business-frontpage/
https://github.com/BlackrockDigital/startbootstrap-business-frontpage/tree/master/css

(callout)
https://startbootstrap.com/template-overviews/stylish-portfolio/
https://github.com/BlackrockDigital/startbootstrap-stylish-portfolio/tree/master/css

(banner)
https://startbootstrap.com/template-overviews/landing-page/
https://github.com/BlackrockDigital/startbootstrap-landing-page


    
    <aside class="callout">
        <div class="text-vertical-center">
            <h1>Ayuda a tus Compañeros</h1>
        </div>
    </aside>


    <center>
    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text"><b>Sistema de Tutor&iacute;as ITT</b></h2>
      </div>
      <div class="mdl-card__supporting-text">
        <b>Apoya a tus compañeros a ser mejores en sus materias.</b>
      </div>
      <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
          Empieza Ahora!
        </a>
      </div>
    </div>

    </center>
-->