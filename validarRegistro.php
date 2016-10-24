<?php
	session_start();
	require 'conexion.php'; //Conexion

	//Variables recibidas
	$usuario=$_POST['usuario'];
	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$semestre=$_POST['semestre'];
	$telefono=$_POST['telefono'];
	$carreras=$_POST['carreras'];
	$correo=$_POST['correo'];
	$pass=$_POST['pass'];
	$rpass=$_POST['rpass'];

	//Regresar los valores correctos
	$_SESSION['imp']=$_POST;

	//Arreglo contador de errores
	$errores=array();

	//Patrones
	$nc = "/^[0-9]{8}$/";
	$patronNomApell = "/^[a-zA-Z]+((\s)|([a-zA-Z]))*$/";
	$patronDigitos = "/^[0-9]+$/";
	$patronSemestre = "/^(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15)$/";
	$patronTelefono = "/^[0-9]{10}$/";
	$patronCorreo = "/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/";


	if(preg_match($nc, $usuario))
	{
		//Nada
	}
	else
	{
		$errores[]=true;
		$_SESSION['error1']="Ingrese un NUMERO DE CONTROL correcto.";
	}

	if(preg_match($patronNomApell, $nombre))
	{
		//Nada
	}
	else
	{
		$errores[]=true;	
		$_SESSION['error2']="Ingrese un NOMBRE(S) correcto(s).";
	}

	if(preg_match($patronNomApell, $apellidos))
	{
		//Nada
	}
	else
	{
		$errores[]=true;	
		$_SESSION['error3']="Ingrese un APELLIDOS correctos.";
	}

	if(preg_match($patronSemestre, $semestre))
	{
		//Nada
	}
	else
	{
		$errores[]=true;	
		$_SESSION['error4']="Ingrese un SEMESTRE correcto.";
	}

	if(preg_match($patronTelefono, $telefono))
	{
		//Nada
	}
	else
	{
		$errores[]=true;	
		$_SESSION['error5']="Ingrese un TELEFONO correcto.";
	}

	if($carreras==0)
	{
		$errores[]=true;
		$_SESSION['error6']="Debe seleccionar una CARRERA.";
	}
	else
	{
		//Nada
	}

	if(preg_match($patronCorreo, $correo))
	{
		//Nada
	}
	else
	{
		$errores[]=true;
		$_SESSION['error7']="Ingrese un CORREO correcto.";
	}



	if(($pass != $rpass)||($pass == "") || ($rpass==""))
	{
		$errores[]=true;
		$_SESSION['error8']="Ingrese una PASSWORD correcto y deden coincidir.";
	}


	if(!empty($_POST))
		{
			
			$error = '';
			
			$sqlUser = "SELECT numcontrol FROM registro WHERE numcontrol = '$usuario'";
			$resultUser=$mysqli->query($sqlUser);
			$rows = $resultUser->num_rows;
			
			if($rows > 0) {
				$errores[]=true;
				$_SESSION['error1']="¡NUMERO DE CONTROL YA EXISTE!";
			}
		}


	if(count($errores)>0)
	{
		header('location:registro.php');	
	}
	else
	{
		//$sql = "SELECT numcontrol FROM registro";
		//$result=$mysqli->query($sql);
		
		//$bandera = false;
		
		$sqlUsuario = "INSERT INTO registro VALUES('$usuario','$nombre','$apellidos','$semestre', '$telefono', '$carreras', '$correo', '$pass')";
		$resultUsuario = $mysqli->query($sqlUsuario);
		
		if($resultUsuario>0)
		{
			//$bandera = true;
			//$_SESSION['exito']="El registro se ha logrado con éxito";
			session_destroy(); //Destruir los valores introducidos
			header('location:registroCompleto.php'); //Redireccionar a RegistroCompleto
		}
		else {
			$_SESSION['exito']="Error al Registrar";
			header('location:registro.php');
		}

	}



?>