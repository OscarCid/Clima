<!DOCTYPE html>
<html>
<?php
require_once("scr/php/login/myDBC.php");
?>

<head>
    <title>Formulario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="scr/js/actualizarIndex.js"></script>
    <link rel="icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script type="text/javascript" src="scr/js/jquery.Rut.js" ></script>
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
                        <div class="panel-title">Ingresar</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                    <div class=" control col-md-12">        
                        <form id="loginform" class="form-horizontal" action="scr/php/login/login.php" role="form" method="post" >
                        
						
						<div class="form-group has-feedback">    
								<div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo o Email" required="" autofocus="" value="" >   
								</div>
									<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									<span class="help-block with-errors"></span>
						</div>
                        <div class="form-group has-feedback">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" required="" placeholder="contraseña">
								</div>
									<span class="glyphicon form-control-feedback" aria-hidden="true"></span>	
						</div>
						

								
                        <div style="margin-top:10px" class="form-group">
                                   
                                    
                                      <input name="submit" type="submit" id="btn-login" class="btn btn-success" value=" Entrar ">
                                   
                        </div>

								
								
						<div class="form-group">
								
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            No estas registrado! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Registrate aquí
                                        </a>
                                        </div>
                                
						</div>    
                        </form>     

                    </div> 
					</div>                     
            </div>  

		</div> 
	
				<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Registrar</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Ingresa aquí</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" action="scr/php/login/agregar.php" role="form" method="post">
                                
<!--                            <div class="form-group has-feedback">                                        
                                    <label for="rut2" class="col-md-3 control-label">Rut</label>
                                    <div class="col-md-8">
                                        <input type="text" name="rut2" id="rut2" pattern="[0-9]{1,2}.[0-9]{3}.[0-9]{3}-[0-9Kk]{1}" class="form-control" placeholder="11.111.111-1" required="" >
                                		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>							-->
							<div class="form-group has-feedback">		                                
                                    <label for="nombre" class="col-md-3 control-label">Nombre(s)</label>
                                    <div class="col-md-8">
                                        <input type="text" id ="nombre" class="form-control" name="nombre" required="" placeholder="Nombre">	
                                		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">	                                
                                    <label for="apellidos" class="col-md-3 control-label">Apellido(s)</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" required="" placeholder="Apellido">
										
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">									
                                    <label for="correo" class="col-md-3 control-label">Correo</label>
                                    <div class="col-md-8">										
                                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo o Email" required="" >	
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">	
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="pass" id="pass" required="" placeholder="Password">
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="form-group has-feedback">		
                                    <label for="password" class="col-md-3 control-label">Confirmar Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="repass" id="repass" required="" data-match="#pass" data-match-error="Oops, no coinciden" placeholder="Password">
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
                            </div>
								
                                <div class="form-group">                                       
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" class="btn btn-info" name="sign" value="Registrar">  
                                    </div>
                                </div>
							
                            </form>
                         </div>
                    </div>
				</div>
	


	</div>
	<?php include ("scr/php/foot.php")?>
	
</body>

</html>
