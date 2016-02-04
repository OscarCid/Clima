<?php
//incluimos el archivo para manipular la base de datos
require_once "myDBC.php";

//Recibimos en variables los campos del registro
//Con trim quitamos espacios en blanco al inicio y final
$nombre = trim($_POST['nombre']);
$apellidos = trim($_POST['apellidos']);
$correo = trim($_POST['correo']);
$pass = trim($_POST['pass']);
$repass = trim($_POST['repass']);
$patron1 = ("/^[a-z]+$/i"); //Expresión regular para solo caracteres

//Validamos todos los campos con OR, si al menos hay uno que no cumpla la condición
//El if se anula y mostramos un error y redirigimos al registro
//filter_var es una expresión regular nativa de PHP
if( $nombre == '' || preg_match(!$patron1, $nombre) || $apellidos == ''  || preg_match(!$patron1, $apellidos) || $correo == '' || !filter_var($correo, FILTER_VALIDATE_EMAIL) || ($pass != $repass) || $pass == "" || $repass == "" ){
		echo'<script type="text/javascript">
			 alert("Error: Datos invalidos en el formulario");
			 window.location="../../../registro.php"
			 </script>';
		
	}
	//Si la validación fue exitosa entonces 
	//Creamos un nuevo objeto de la clase y
	//Usamos el método de agregar usuario con lo parámetros 
	//Correspondientes
	else{
		$mydb = new myDBC();
		$pass_oculto =  crypt($pass,"$1$rasmusle$");
		$mydb->agregaUsuario($nombre, $apellidos, $correo, $pass_oculto);
						$destinatario = $correo; 
						$asunto = "Comprovación del correo - Meteorología UPLA"; 
						$cuerpo = ' 
						<html> 
						<head> 
						   <title>Comprovación del correo</title> 
						</head> 
						<body> 
						<h3>Hola '.$nombre.' '.$apellidos.' ,</h3> 
						<p> 
						<b>Bienvenido/a a la página de Estaciones Meteorológicas de la Universidad de Playa Ancha</b>. <br>Gracias por registrarte, este mensaje es para verificar tu correo electronico. 
						<br>Tu contraseña es: <strong>'.$pass.'</strong>
						</p> 
						</body> 
						</html> 
						'; 

						//para el envío en formato HTML 
						$headers = "MIME-Version: 1.0\r\n"; 
						$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

						mail($destinatario,$asunto,$cuerpo,$headers);
		
	}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>SERVIDOR</title>
</head>

<body bgcolor="blue">
	
</body>

</html>
