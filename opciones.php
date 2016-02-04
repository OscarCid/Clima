<!DOCTYPE html>
<html>
<?php
require_once("scr/php/login/myDBC.php");
if(isset($_SESSION['session']))
{
	include_once "scr/conexion.php";
	
?>

<head>
    <title>Formulario - Meteorología UPLA</title>
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
	});
	</script>
</head>
<body>

	<div class="container-fluid">   

		<?php 
		$pag="inicio";
		include "scr/php/menu.php";
		include "scr/php/banner2.php";
		
		$sql0="select * from usuarios where id = ".$_SESSION["id"]."";
		$result0 = mysqli_query($con,$sql0)or die("Error en: " .  mysqli_error($con));

		while($row = mysqli_fetch_array($result0)) {
			$nombre = $row['nombre'];
			$apellido = $row['apellidos']; 
			$correo = $row['correo'];
			$pass = $row['password']; 
		}
		
		?>
		
		
	
				<div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Editar</div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" action="scr/php/login/actualizar.php" role="form" method="post">
                                <div class="form-group has-feedback">		                                
                                    <label for="nombre" class="col-md-3 control-label">Nombre(s)</label>
                                    <div class="col-md-8">
                                        <input type="text" id ="nombre" class="form-control" name="nombre" required="" placeholder="Nombre" value="<?php echo $nombre?>">	
                                		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">	                                
                                    <label for="apellidos" class="col-md-3 control-label">Apellido(s)</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" required="" placeholder="Apellido" value="<?php echo $apellido?>">
										
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">									
                                    <label for="correo" class="col-md-3 control-label">Correo</label>
                                    <div class="col-md-8">										
                                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo o Email" required="" readonly value="<?php echo $correo?>">	
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">	
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="pass" id="pass" required="" placeholder="Password" value="<?php echo $pass?>">
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="form-group has-feedback">		
                                    <label for="password" class="col-md-3 control-label">Confirmar Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="repass" id="repass" required="" data-match="#pass" data-match-error="Oops, no coinciden" placeholder="Password" value="<?php echo $pass?>">
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
                            </div>
								
                                <div class="form-group">                                       
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="submit" class="btn btn-info" name="sign" value="Actualizar">  
                                    
                            <?php if($_SESSION['user'] == 'admin'){
							
							echo'	                                       
                                    
                                        <a href="4" class="btn btn-default" role="button">Menú Admin</a>  
                                    
                                ';
							}?>
									</div>
								</div>
							
                            </form>
							
							
                         </div>
                    </div>
				</div>
	


	</div>
	<?php 
	include ("scr/php/foot.php");
	
	}else
	echo'<script type="text/javascript">
	  alert("Registrarse para ver este contenido");
	  window.location="index"
	</script>'; 
	?>
	
</body>

</html>
