<!DOCTYPE html>
<html>
<?php
require_once("scr/php/login/myDBC.php");
if(isset($_SESSION['session']) && $_SESSION['user'] == 'admin')
{
	include_once "scr/conexion.php";
	
?>

<head>
    <title>Menú Administrador - Meteorología UPLA</title>
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
	<link href="scr/css/fileinput.min.css" rel="stylesheet" type="text/css" />    
	<script src="scr/js/fileinput.min.js" type="text/javascript"></script>

    <script src="scr/js/fileinput_locale_es.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="scr/js/validator.js" ></script>
	<script>
	$(document).ready(function(){
		$('#loginform').validator();
		$('#signupform').validator();
	});
	
	function ver(image){
	document.getElementById('image').innerHTML = "<img src='"+image+"'>" 
	}
	</script>	

</head>
<body>

<div class="container-fluid">   

		<?php 
		$pag="inicio";
		include "scr/php/menu.php";
		include "scr/php/banner2.php";
		
		$titulolat = "Donde encontrar la latitud en Maps";
		//$textolat = "Haciendo click en cualquier parte del mapa, aparecera una caja en la parte inferior con el nombre de la ciudad, el primer numero que aparece es la latitud.";
		?>
		<br>
	<div class="container-fluid" style="margin-top:50px" >	
		<div class = "col-md-10 col-md-offset-1 col-xs-12">
		<ul class="nav nav-tabs" id="cosa">
			<li class="active"><a data-toggle="tab" href="#home">Crear Estación</a></li>
			<li><a data-toggle="tab" href="#menu1">Deshabilitar Estación</a></li>
			<li><a data-toggle="tab" href="#menu2">Control de Usuarios</a></li>
			
		</ul>
		</div>
	</div>	
		
	<div class="tab-content">
		<div class="tab-pane fade in active" id="home">
			<div class="container">
				<div id="signupbox" style=" margin-top:10px" class="mainbox col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title"><strong>Crear nueva estación</strong></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" enctype="multipart/form-data" action="scr/php/crearEstacion" role="form" method="post">
                                <div class="form-group has-feedback">		                                
                                    <label for="nombre" class="col-md-3 control-label">Nombre Estación:</label>
                                    <div class="col-md-8">
                                        <input type="text" id ="nombre" class="form-control" name="nombre" required="" placeholder="Nombre" >	
                                		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">	                                
                                    <label for="archivo" class="col-md-3 control-label">Nombre de archivo:</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="archivo" name="archivo" required="" placeholder="Archivo" >
										
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">									
                                    <label for="latitud" class="col-md-3 control-label" >Latitud:</label>
                                    <div class="col-md-8">										
                                        <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Latitud" required="" >	
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>	
							<div class="form-group has-feedback">	
                                    <label for="longitud" class="col-md-3 control-label">Longitud:</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="longitud" id="longitud" required="" placeholder="Longitud" >
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="form-group has-feedback">	
                                    <label for="mapa" class="col-md-3 control-label">Mapa:</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="mapa" id="mapa" required="" placeholder="Mapa" >
                            		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="form-group has-feedback">		
                                    <label for="file" class="col-md-3 control-label">Imagen:</label>
                                    <div class="col-md-8">
                                        <input type="file" data-show-upload="false" class="file" name="file" id="file" required="" onChange="ver(form.file.value)">
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <div class="col-md-offset-3 col-md-9">
								
								<span class="help-block with-errors"></span>
								</div>
                            </div>
								
                                <div class="form-group">                                       
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-info" name="submit">
											<span class="glyphicon glyphicon-upload left" aria-hidden="true"></span> Crear
										</button>
										<a href="opciones" class="btn btn-default" role="button">Volver</a>
                                    </div>
                                </div>
							
                            </form>
                         </div>
                    </div>
				</div>
			</div>
		</div><!-- home -->
		
		<div id="menu1" class="tab-pane fade">
			
			<div class="container">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
			<p style="padding-top:5px"><strong><h4>Deshabilitar Estación</h4></strong></p>
            </div>
            <div class="col-md-10 col-md-offset-1 col-xs-12 ">
            <div class="table-responsive">
                 
                <table class="table table-striped table-bordered ">
                      <thead>
                        <tr>
                          <th>Nombre Estación</th>
                          <th>Nombre archivo</th>
                          <th>Latitud</th>
                          <th>Longitud</th>
						  <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>
			
			<?php
					$sql = "select * from estacioneshab order by id asc";
					$result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));

					while($row = mysqli_fetch_array($result)){
						echo  '
		
							<tr>
							<form method="POST"><input type="hidden" name="id" value="'.$row["id"].'">
                                <td style="vertical-align: middle;">'. $row['nombreEstacion'] . '</td>
                                <td style="vertical-align: middle;">'. $row['estacion'] . '</td>
                                <td style="vertical-align: middle;">'. $row['lat'] . '</td>
								<td style="vertical-align: middle;">'. $row['lon'] . '</td>
                                <td width=250>';
								
                                if ($row["estado"]==1){
									echo '<button class="btn btn-danger" type="submit" name="submitD"  ><span class="glyphicon glyphicon-remove left" aria-hidden="true"></span> Deshabilitar estación</button>';
								}else if ($row["estado"]==0){
									echo '<button class="btn btn-success" type="submit" name="submitH" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Habilitar estación</button>';
								}
						        
								
						echo    '               
                                </td>
								</form>
                            </tr>
                       
                      
						';	
					}
					
					$id = $_POST['id'];
					if (isset($_POST['submitD'])){
						echo "adios<br>";
						$sql1 = "UPDATE estacioneshab SET estado = '0' WHERE id = '".$id."'";
						$result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));
						echo "<meta http-equiv='refresh' content='0'>";
					}else if(isset($_POST['submitH'])){
						echo "hola<br>";
						$sql1 = "UPDATE estacioneshab SET estado = '1' WHERE id = '".$id."'";
						$result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));
						echo "<meta http-equiv='refresh' content='0'>";
					}
					
			?>
			            </tbody>
					</table>
				</div><div class="row" style="padding-left:15px"><a href="opciones" class="btn btn-default" role="button">Volver</a></div>
				</div>
				<div class="col-md-8 col-md-offset-3">
					<div style="height:15px"></div>
				</div>
			</div>
		</div><!-- menu1 -->
		
		<div id="menu2" class="tab-pane fade">
			<div class="container">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
			<p style="padding-top:5px"><strong><h4>Control de usuarios</h4></strong></p>
            </div>
            <div class="col-md-10 col-md-offset-1 col-xs-12 ">
            <div class="table-responsive">
					 
					<table class="table table-striped table-bordered ">
						<thead>
							<tr>
							  <th>Nombre</th>
							  <th>Apellido</th>
							  <th>Correo</th>
							  <th>Tipo de cuenta</th>
							  <th>Acción</th>
							</tr>
						</thead>
						<tbody>
<?php
	$sql1 = "select * from usuarios order by id asc";
	$result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));

	while($row = mysqli_fetch_array($result1)){
		echo  '
		
							<tr>
							<form method="POST"><input type="hidden" name="id" value="'.$row["id"].'">
                                <td style="vertical-align: middle;">'. $row['nombre'] . '</td>
                                <td style="vertical-align: middle;">'. $row['apellidos'] . '</td>
                                <td style="vertical-align: middle;">'. $row['correo'] . '</td>
								<td style="vertical-align: middle;">'. $row['tipo'] . '</td>
                                <td width=250>';
								
                                if ($row["sup"]==0){
									if ($row['correo']==$_SESSION['mail']){
										echo '<button class="btn btn-danger" type="submit" name="submitD" disabled ><span class="glyphicon glyphicon-remove left" aria-hidden="true"></span> Deshabilitar cuenta</button>';
									}else{
										echo '<button class="btn btn-danger" type="submit" name="submitD"  ><span class="glyphicon glyphicon-remove left" aria-hidden="true"></span> Deshabilitar cuenta</button>';
									}
								}else if ($row["sup"]==1){
									echo '<button class="btn btn-success" type="submit" name="submitH" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Habilitar cuenta</button>';
								}
						        
								
        echo    '               
                                </td>
								</form>
                            </tr>
                       
                      
';	
	}	
	
	$id = $_POST['id'];
	if (isset($_POST['submitD'])){
		echo "adios<br>";
		$sql1 = "UPDATE usuarios SET sup = '1' WHERE id = '".$id."'";
		$result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));
		echo "<meta http-equiv='refresh' content='0'>";
	}else if(isset($_POST['submitH'])){
		echo "hola<br>";
		$sql1 = "UPDATE usuarios SET sup = '0' WHERE id = '".$id."'";
		$result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));
		echo "<meta http-equiv='refresh' content='0'>";
	}
?>
						</tbody>
					</table>
				</div><div class="row" style="padding-left:15px"><a href="opciones" class="btn btn-default" role="button">Volver</a></div>
				</div>
				<div class="col-md-8 col-md-offset-3">
					<div style="height:45px"></div>
				</div>
			</div> <!-- /container -->
		</div><!-- menu2 -->
		
	</div>
</div>

<script type="text/javascript">
    $("#cosa").bootstrapDynamicTabs();
	$('#file').fileinput({
        language: 'es',
        allowedFileExtensions : ['jpg', 'png','gif'],
    });
</script>

	<?php 
	include ("scr/php/foot.php");
	
	}else
	echo'<script type="text/javascript">
	  alert("No tienes permisos de administrador");
	  window.location="index"
	</script>'; 
	?>
	
</body>

</html>