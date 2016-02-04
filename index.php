<!DOCTYPE html>
<html>
<?php include 'scr/conexion.php';
require_once("scr/php/login/myDBC.php");
?>

<head>
    <title>Meteorología UPLA</title>
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
</head>
<body>
<div class="container-fluid">
<?php
$pag="inicio";
include ("scr/php/menu.php");
?>

<style>
/* unvisited link */
#lonk a:link {
    color: black !important;
	text-decoration: none !important;
}

/* visited link */
#lonk a:visited {
    color: black !important;
	text-decoration: none !important;
}

/* mouse over link */
#lonk a:hover {
    color: black !important;
	text-decoration: none !important;
}

/* selected link */
#lonk a:active {
	text-decoration: none !important;
    color: black !important;
}
</style>

<?php include "scr/php/banner2.php"?>
<div class="col-md-10 col-md-offset-1">

    <div class="row" style="padding-top:5px">
		<h4 class="text-justify">Estaciones Meteorológicas</h4>
        <p class="text-justify">La Facultad de Ingeniería en colaboración con la Dirección de Meteorología de la Armada de Chile y la Corporación Nacional Forestal (CONAF) se encuentra habilitando estaciones meteorológicas Davis en diferentes áreas protegidas de la Región de Valparaíso. En una primera fase se habilitaron El Parque Nacional La Campana y Santuario de la Naturaleza Laguna el Peral. Próximamente se espera agregar La Reserva Nacional El Yali y La Reserva Nacional Lago Peñuelas, finalmente se espera agregar un equipo en las propias dependencias de la Facultad de Ingeniería. Los datos instantáneos son publicados en línea en los enlaces que se presentan a continuación y aquellos investigadores que requieran las series de tiempo pueden solicitarlas a nuestra Facultad.</p>
        <br>
    </div>

    <div class="row" id="lonk">
    <?php    
	$sql="SELECT * FROM estacioneshab WHERE estado = '1'";
    $result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));
    while ($row = mysqli_fetch_array ($result)) {

        echo '                	
		<div class="col-sm-6 col-md-4 col-lg-4">
		<a href="'.$row['estacion'].'">
            <div class="thumbnail">
				<h3 class="text-center">'.$row['nombreEstacion'].'</h3>
                <img src="scr/img/'.ucwords($row['estacion']).'.jpg" alt="..." height="200px" width="500px">
                <div class="caption">

                    <p class="text-center">';
                        
                        $sql1="SELECT * FROM estacion WHERE estacion = '".$row['estacion']."' ORDER BY fecha DESC, hora DESC LIMIT 1 ";
                        $result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));
                        while ($row = mysqli_fetch_array ($result1)) {
                                echo "<strong>Fecha:</strong> ".date("d-m-Y", strtotime($row['fecha']))." <strong>Hora: </strong>  ".date("H:i", strtotime($row['hora']))."<br><strong>Temperatura:</strong> ".$row['temp']."°C";
                        }
        echo '                
                    </p>
                    
                </div>
            </div>
		</a>
        </div>';
	}
?>		
		
		
           

    </div>
</div>

</div>
<?php include ("scr/php/foot.php")?>

</body>

