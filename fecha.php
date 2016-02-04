<!DOCTYPE html>
<html >
<head>
    <title>Datos historicos - Meteorologia UPLA</title>
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
    <!-- Script botones grafico tablas -->
    <script src="scr/js/cambioDiv.js"></script>
</head>
<?php
$porciones = $_GET['pag'];
include_once "scr/conexion.php";
$actual_link = "$_SERVER[REQUEST_URI]";
$sql="SELECT * FROM estacioneshab WHERE estacion = '".$porciones."'";
$result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));
while ($row = mysqli_fetch_array ($result)) {
    $nombre = $row['nombreEstacion'];
	$lon = $row['lon'];
	$lat = $row['lat'];
	$emb = $row['emb'];
	if ($row['estado'] == 0){
		echo'<script type="text/javascript">
		alert("Estación Deshabilitada");
		window.location="index"
		</script>';
	}
}
?>

<body>

<div class="container-fluid">

    <?php 
	$pag = $porciones;	
    include ("scr/php/menu.php");
    include ("scr/php/banner.php");
	
	$estacion = $porciones;

	include "scr/php/consultaMD.php";
	
    ?>
	<div class='row'>
		<div class='col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-xs-12 col-sm-12'>
			
           
				<div class="centered-pills" id="pill">
					<ul class="nav nav-tabs navbar-inner" id="datos">
						<li class="active"><a href="#hoyD" data-toggle="pill">Hoy</a></li>
						<li><a href="#ayerD" data-toggle="pill">Ayer</a></li>
						<li><a href="#mesD" data-toggle="pill">Este Mes</a></li>
						<li><a href="#anioD" data-toggle="pill">Este Año</a></li>
					</ul>
				</div>
		
	
			<div class="tab-content">
                    <div class="tab-pane active" id="hoyD">
                        <div class="span8">
							<?php include_once "scr/php/hoy.php";?>
						</div>
					</div>		
			
					<div class="tab-pane" id="ayerD">
                        <div class="span8">
							<?php include_once "scr/php/ayer.php";?>
                        </div>
                    </div>
			
					<div class="tab-pane" id="mesD">
                        <div class="span8">
							<?php include_once "scr/php/mes.php";?>
                        </div>
                    </div>
					<div class="tab-pane" id="anioD">
                        <div class="span8">
							<?php include_once "scr/php/ano.php";?>
                        </div>
                    </div>			
			
			
		</div>
	</div>
</div>
    <div class='col-md-10 col-md-offset-1'>
        <div class='col-md-6 col-xs-12'>
		<a href='<?php echo $estacion;?>'>
			<button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-list-alt left' aria-hidden='true'></span>
				Volver a la estación
			</button>			
		</a>
		</div>
	</div>	
</div>
<?php include ("scr/php/foot.php")?>


</body>
</html>
