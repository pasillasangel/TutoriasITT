<?php
	session_start();
	require 'conexion.php';

	$nombreC=$_POST['nombreC'];
	$correoC=$_POST['correoC'];
	$asuntoC=$_POST['asuntoC'];
	$mensajeC=$_POST['mensajeC'];

	//Regresar los valores correctos
	$_SESSION['imp2']=$_POST;

	//Arreglo contador de errores
	$errores=array();

	//Patrones
	$pNombreAsunto = "/^[a-zA-Z]+((\s)|([a-zA-Z]))*$/";
	$pCorreo = "/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/";

	if(preg_match($pNombreAsunto, $nombreC))
	{

	}
	else
	{
		$errores[]=true;
		$_SESSION['error1']="Ingrese un NOMBRE correcto.";
	}

	if(preg_match($pCorreo, $correoC))
	{

	} 
	else
	{
		$errores[]=true;
		$_SESSION['error2']="Ingrese un CORREO correcto.";
	}

	if(preg_match($pNombreAsunto, $asuntoC))
	{

	}
	else
	{
		$errores[]=true;
		$_SESSION['error3']="Ingrese un ASUNTO correcto.";
	}

	if($mensajeC=="")
	{
		$errores[]=true;
		$_SESSION['error4']="Ingrese su MENSAJE.";
	}

	if(count($errores)>0)
	{
		header('location:contacto.php');	
	}
	else
	{
		$comentario = "
			Nombre: $_POST[nombreC]
			Email: $_POST[correoC]
			Comentario: $_POST[mensajeC]
		";

		$headers = 'From: '.$destino."\r\n".
		'Reply-To:'.$destino."\r\n".
		'X-Mailer: PHP/'.phpversion();

		//Enviamos el mensaje
		$bool = mail("pasillasangel@gmail.com",$asuntoC, $comentario, $headers);
		session_destroy(); //Destruye los datos
		header('location:contactoCompleto.php'); //Redirecciona

	}

?>