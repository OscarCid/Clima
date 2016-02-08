<!DOCTYPE html>
<html>

<head>
    <title>Contraseña perdida - Meteorología UPLA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="favicon.ico">
	<!-- Script ajax -->
    <script src="scr/js/actualizarIndex.js"></script>
	<script src="scr/js/actualizarMD.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.js"></script>
	<script type="text/javascript" src="scr/js/validator.js" ></script>

	<script>
	$(document).ready(function(){
		$('#loginform').validator();
		$('#signupform').validator();
		$('#rut1').Rut();
		$('#rut2').Rut();
	});
	</script>
</head>
<body>

	<div class="container-fluid">   

		<?php 
		$pag="inicio";
		include "scr/php/menu.php";
		include "scr/php/banner2.php";?>
		
		<div id="loginbox" style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Ingresa tu correo registrado</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                    <div class=" control col-md-12">        
                        <form id="loginform" class="form-horizontal" action="" role="form" method="post" >
                        
						
						<div class="form-group has-feedback">    
								<div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo o Email" autofocus="" required="" value="" >   
								</div>
									<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									<span class="help-block with-errors"></span>
						</div>

						

								
                        <div style="margin-top:10px" class="form-group">
                                   
                                    
                                      <input name="submit" type="submit" id="btn-login" class="btn btn-success" value=" Entrar ">
                                   
                        </div>  
                        </form>     

                    </div> 
					</div>                     
            </div>  

		</div> 
<div class="col-md-8 col-md-offset-3">
	<div style="height:15px">
<?php
include_once "scr/conexion.php";
if($_POST){
	


$buscado = $_POST['correo'];

$sql0="select * from usuarios where correo = '$buscado'";
$result0 = mysqli_query($con,$sql0)or die("Error en: " .  mysqli_error($con));
if( $result0->num_rows == 0)
	{
		echo	'<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error!</strong> No se ha encontrado el correo ingresado, intenta nuevamente.
				</div>';	
	}else{
			while($row = mysqli_fetch_array($result0)) {
				$nombre = $row['nombre'];
				$apellido = $row['apellidos']; 
				$correo = $row['correo'];
				$pass = $row['password']; 
			}
			echo   '<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Exito!</strong> Se ha enviado un correo para ingresar a su cuenta.
					</div>';

			$destinatario = $correo; 
			$asunto = "Contraseña perdida - Meteorología UPLA"; 
			$cuerpo = " 
				<html> 
				<head> 
				<title>¿Contraseña perdida? Nosotros la encontramos</title> 
				</head> 
				<body> 
				<h3>Hola $nombre $apellidos ,</h3> 
				<p> 
				<b>Bienvenido/a a la página de Estaciones Meteorológicas de la Universidad de Playa Ancha</b>. <br>Gracias por contactarnos, presiona el siguiente link para entrar a tu cuenta. 
				</p>
				
				<a href='http://sistema.meteorologiaupla.cl/Clima/scr/php/login/login.php?correo=$correo&password=$pass' >Click aquí</a>
				<br>
				Recuerda cambiar tu contraseña después en el menú de Editar (seleccionar donde está tu nombre).
				</body> 
			</html> 
				"; 

				//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

			mail($destinatario,$asunto,$cuerpo,$headers);
			}
	}
?></div>
</div>		
</div>



	<?php include ("scr/php/foot.php");

?>	
</body>

</html>
