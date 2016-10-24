<?php
  require('conexion.php');

  session_start();
  
  if(isset($_SESSION["id_usuario"])){
    header("Location: index2.php");
  }
  
  if(!empty($_POST))
  {
    $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $error = '';
    
    $sql = "SELECT numcontrol, password FROM registro WHERE numcontrol = '$usuario' AND password = '$password'";
    $result=$mysqli->query($sql);
    $rows = $result->num_rows;
    
    if($rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['id_usuario'] = $row['numcontrol'];
      $_SESSION['contraseña'] = $row['password'];
      
      header("location: index2.php");
      } else {
      $error = "Los datos son incorrectos.";
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tutorias ITT - Login</title>

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
    background: url('images/fondo4.jpg') center center no-repeat scroll;
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


/* Callout */
.callout {
    display: table;
    width: 100%;
    height: 400px;
    color: #fff;
    background: url('images/fondo9.jpg') no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}
/*Efecto del texto del callout*/
.text-vertical-center {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}


/*Banner Imagen Final--------------------------------------------------------------------*/

/*
 * Start Bootstrap - Landing Page (http://startbootstrap.com/)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */



.network-name {
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 400;
    letter-spacing: 2px;
}

.content-section-a {
    padding: 50px 0;
    background-color: #f8f8f8;
}

.content-section-b {
    padding: 50px 0;
    border-top: 1px solid #e7e7e7;
    border-bottom: 1px solid #e7e7e7;
}

.section-heading {
    margin-bottom: 30px;
}

.section-heading-spacer {
    float: left;
    width: 200px;
    border-top: 3px solid #e7e7e7;
}

.banner {
    padding: 100px 0;
    color: #f8f8f8;
    background: url('images/fondo10.jpg') no-repeat center center;
    background-size: cover;
}

.banner h2 {
    margin: 0;
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
    font-size: 3em;
}

.banner ul {
    margin-bottom: 0;
}

.banner-social-buttons {
    float: right;
    margin-top: 0;
}

@media(max-width:1199px) {
    ul.banner-social-buttons {
        float: left;
        margin-top: 15px;
    }
}

@media(max-width:767px) {
    .banner h2 {
        margin: 0;
        text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
        font-size: 3em;
    }

    ul.banner-social-buttons > li {
        display: block;
        margin-bottom: 20px;
        padding: 0;
    }

    ul.banner-social-buttons > li:last-child {
        margin-bottom: 0;
    }
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
        <a class="mdl-navigation__link" href="index.php"><b>Inicio</b></a>
        <a class="mdl-navigation__link" href="contacto.php"><b>Contacto</b></a>
                <a class="mdl-navigation__link" href="login.php"><b>Iniciar Sesi&oacute;n</b></a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
  <!-- Menu flotante del Lado Izquierdo -->
    <span class="mdl-layout-title">Menu</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="index.php">Inicio</a>
      <a class="mdl-navigation__link" href="contacto.php">Contacto</a>
      <a class="mdl-navigation__link" href="login.php">Iniciar Sesi&oacute;n</a>
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
    <div class="container">

        <!-- Linea delgada -->
        <hr>

        <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Iniciar Sesi&oacute;n</h2>
                
                  <!-- Textfield with Floating Label -->
                    <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" id="form_login" method="POST" enctype="multipart/form-data">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="usuario" name="usuario">
                      <label class="mdl-textfield__label" for="usuario">Usuario</label>
                    </div>
                    </br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="password" id="password" name="password">
                      <label class="mdl-textfield__label" for="password">Contraseña</label>
                    </div>
                    </br>
                  <!-- Colored raised button -->
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                      Iniciar Sesi&oacute;n
                    </button>

                    </form>
                    </br>
                    </br>

                    <b>
                    <p>Si todavia no tienes cuenta, registrate aqui:
                    <a href="registro.php">
                        <button class="mdl-button mdl-js-button mdl-button--primary">
                          Reg&iacute;strate
                        </button></a></p>
                    </a></p>
                    <p>¿Tienes problemas para inciar sesi&oacute;n? <a href="contacto.php">
                      <button class="mdl-button mdl-js-button mdl-button--primary">
                        Click Aqui
                      </button>
                    </a></p>
                    </b>



            </div>
        </div>
</section>

    </br>
    </br>

    <aside class="callout">
        <div class="text-vertical-center">
            <h1>Logueate!</h1>
        </div>
    </aside>

    </br>
    </br>
    </div>

  <!-- Pie de Pagina -->
  <footer class="mdl-mini-footer">
    <div class="mdl-mini-footer__left-section">
      <div class="mdl-logo">Sistema de Tutor&iacute;as ITT</div>
      <ul class="mdl-mini-footer__link-list">
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="acerca.php">Acerda de</a></li>
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


    AYUDA EN LA CONEXION DE BASE DE DATOS
    http://markorobles.com/2016/05/25/sistema-de-usuarios-y-sesiones-en-php-y-mysql-parte-1-login-sesiones-y-logout/
-->