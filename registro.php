<?php
  session_start();
  
  $imprimir=$_SESSION['imp'];

  if(isset($_SESSION["id_usuario"])){
    header("Location: index2.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tutorias ITT - Registro</title>

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
    background: url('images/fondo12.jpeg') center center no-repeat scroll;
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
    background: url('images/fondo11.jpg') no-repeat center center scroll;
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
                <h2>Reg&iacute;strate</h2>
                  <?php
                  if(isset($_SESSION['exito']))
                  {
                    echo "<center><p><font color='blue'>".$_SESSION['exito']."</font><p></center>";
                  }
                  else
                  {
                    echo "";
                  }
                  unset($_SESSION['exito']);
                  
                  ?>
                  <!-- Textfield with Floating Label -->
                  <form action="validarRegistro.php"  id="registro" name="registro" method="POST" enctype="multipart/form-data">
                        <?php
                        if(isset($_SESSION['error1']))
                        {
                          echo "<center><font color='red'>".$_SESSION['error1']."</font></center>";
                        }
                        else
                        {
                          echo "";
                        }
                        unset($_SESSION['error1']);
                        ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="usuario" name="usuario" value="<?php echo $imprimir['usuario']; ?>">
                      <label class="mdl-textfield__label" for="usuario">N&uacute;mero de Control</label>
                    </div>
                    </br>
                          <?php
                          if(isset($_SESSION['error2']))
                          {
                            echo "<center><font color='red'>".$_SESSION['error2']."</font></center>";
                          }
                          else
                          {
                            echo "";
                          }
                          
                          unset($_SESSION['error2']);
                          
                          ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="nombre" name="nombre" value="<?php echo $imprimir['nombre']; ?>">
                      <label class="mdl-textfield__label" for="nombre">Nombres</label>
                    </div>
                    </br>
                          <?php
                          if(isset($_SESSION['error3']))
                          {
                            echo "<center><font color='red'>".$_SESSION['error3']."</font></center>";
                          }
                          else
                          {
                            echo "";
                          }
                          
                          unset($_SESSION['error3']);
                          
                          ?>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="apellidos" name="apellidos" value="<?php echo $imprimir['apellidos']; ?>">
                      <label class="mdl-textfield__label" for="apellidos">Apellidos</label>
                    </div>
                    </br>
                          <?php
                          if(isset($_SESSION['error4']))
                          {
                            echo "<center><font color='red'>".$_SESSION['error4']."</font></center>";
                          }
                          else
                          {
                            echo "";
                          }
                          
                          unset($_SESSION['error4']);
                          ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="semestre" name="semestre" value="<?php echo $imprimir['semestre']; ?>">
                      <label class="mdl-textfield__label" for="semestre">Semestre (N&uacute;mero)</label>
                    </div>
                    </br>
                          <?php
                          if(isset($_SESSION['error5']))
                          {
                            echo "<center><font color='red'>".$_SESSION['error5']."</font></center>";
                          }
                          else
                          {
                            echo "";
                          }
                          
                          unset($_SESSION['error5']);
                          ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="telefono" name="telefono" value="<?php echo $imprimir['telefono']; ?>">
                      <label class="mdl-textfield__label" for="telefono">Tel&eacute;fono</label>
                    </div>
                    </br>
                          <?php
                          if(isset($_SESSION['error6']))
                          {
                            echo "<center><font color='red'>".$_SESSION['error6']."</font></center>";
                          }
                          else
                          {
                            echo "";
                          }
                          
                          unset($_SESSION['error6']);
                          ?>
                        <label>Selecciona tu Carrera</label>
                        </br>
                            <?php
                            $n = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');
                            $carre=array('Arquitectura','Contador Publico','Ing. Ambiental','Ing. Biomedia','Ing. Bioquimica','Ing. Civil','Ing. Electromecanica', 'Ing. Electronica', 'Ing. en Aeronautica', 'Ing. en Diseño Industrial', 'Ing. Gestion Empresarial', 'Ing. Informatica', 'Ing. en Logistica', 'Ing. en Nanotecnologia', 'Ing. Sistemas Computacionales', 'Ing. en Tecnologias de la Informacion y Comunicaciones', 'Ing. Industrial', 'Ing. Quimica', 'Ing. Mecanica', 'Lic. en Administracion');
                            ?>
                        <select class="form" id="carreras" name="carreras">
                          <option value="0" disabled selected>Carreras</option>
                          <?php
                            for ($i=0; $i < count($carre); $i++) 
                            { 
                              if ($imprimir['carreras']==$n[$i]) 
                              {
                          ?>
                          <option value="<?php echo $n[$i]; ?>" selected="selected"><?php echo $carre[$i]; ?></option>
                          <?php
                              }
                              else
                              {
                                
                          ?>      
                          <option value="<?php echo $n[$i]; ?>"><?php echo $carre[$i]; ?></option>
                          <?php
                              }
                          }
                          ?>
                        </select>
                    </br>
                    </br>
                          <?php
                          if(isset($_SESSION['error7']))
                          {
                            echo "<center><font color='red'>".$_SESSION['error7']."</font></center>";
                          }
                          else
                          {
                            echo "";
                          }
                          
                          unset($_SESSION['error7']);
                          ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="correo" name="correo" value="<?php echo $imprimir['correo']; ?>">
                      <label class="mdl-textfield__label" for="correo">Correo</label>
                    </div>
                    </br>
                          <?php
                          if(isset($_SESSION['error8']))
                          {
                            echo "<center><font color='red'>".$_SESSION['error8']."</font></center>";
                          }
                          else
                          {
                            echo "";
                          }
                          
                          unset($_SESSION['error8']);
                          ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="password" id="pass" name="pass">
                      <label class="mdl-textfield__label" for="pass">Contraseña</label>
                    </div>
                    </br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="password" id="rpass" name="rpass">
                      <label class="mdl-textfield__label" for="rpass">Repetir Contraseña</label>
                    </div
>                    </br>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                      Reg&iacute;strate
                    </button>
                  </form>
                    </br>
                    </br>

                    <b>
                    <p>Si ya tienes cuenta, inicia sesi&oacute;n desde aqui: 
                    <a href="login.php">
                        <button class="mdl-button mdl-js-button mdl-button--primary">
                          Inicia Sesi&oacute;n
                        </button></a></p>
                    </b>
            </div>
        </div>
</section>

    </br>
    </br>

    <aside class="callout">
        <div class="text-vertical-center">
            <h1>Reg&iacute;strate!</h1>
        </div>
    </aside>

    </br>
    </br>
    </div>

    </br>
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
-->