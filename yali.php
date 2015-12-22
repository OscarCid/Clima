<!DOCTYPE html>
<html >
<head>
    <title>Estación El Yali - Meteorologia UPLA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Script ajax -->
    <script src="scr/js/actualizarIndex.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.js"></script>
    <!-- Script botones grafico tablas -->
    <script src="scr/js/cambioDiv.js"></script>
</head>
<?php $actual_link = "$_SERVER[REQUEST_URI]";
$porciones = explode("/", $actual_link);

?>
<body onload="actualizarIndex('<?php echo $porciones[2]; ?>'); setInterval(actualizarIndex.bind(null,'<?php echo $porciones[2]; ?>'),60000)">

<div class="container-fluid">

    <?php 
	$pag= $porciones[2];	
    include ("scr/php/menu.php");
    include ("scr/php/banner.php");
	include ("scr/php/alertaInc.php");
    ?>

    <!-- Div que muestra los datos de scr/php/datosIndex.php -->
    <!-- Tu no tienes alma -->
    <div id="div2" class="oculto">

        <div class="col-md-12 col-xs-12" style="padding-bottom: 10px">
            <center>

        <button type="button" class="btn btn-primary active"><span class="glyphicon glyphicon-list-alt left" aria-hidden="true"></span> Tablas</button>

		<a href="#div3" class='MO'>
            <button type="button" class="btn btn-primary "><span class="glyphicon glyphicon-list-alt left" aria-hidden="true"></span> Otro</button>
        </a>
		
        <a href="#div1" class='MO'>
            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-stats left" aria-hidden="true"></span> Graficos</button>
        </a>

            </center>

        </div>

    <div class="alert alert-success collapse col-md-10 col-md-offset-1 col-xs-12" id="success-alert">
        <strong>Espere! </strong>
        Estamos actualizando la informacion para usted.
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            </div>
        </div>
    </div>
        <div id="txtHint">
        </div>

    </div>

    <div id="div1" class="oculto">

        <div class="col-md-12 col-xs-12" style="padding-bottom: 10px">
        <center>
            <a href="#div2" class='MO'>
            <button type="button" class="btn btn-primary "><span class="glyphicon glyphicon-list-alt left" aria-hidden="true"></span> Tablas</button>
            </a>
			
			<a href="#div3" class='MO'>
            <button type="button" class="btn btn-primary "><span class="glyphicon glyphicon-list-alt left" aria-hidden="true"></span> Otro</button>
            </a>
			
            <button type="button" class="btn btn-primary active"><span class="glyphicon glyphicon-stats left" aria-hidden="true"></span> Graficos</button>
        </center>

        </div>
		<?php include "scr/php/prueba.php"?>
        
    </div>
	
	<div id="div3" class="oculto">

        <div class="col-md-12 col-xs-12" style="padding-bottom: 10px">
        <center>
            <a href="#div2" class='MO'>
            <button type="button" class="btn btn-primary "><span class="glyphicon glyphicon-list-alt left" aria-hidden="true"></span> Tablas</button>
            </a>
					
            <button type="button" class="btn btn-primary active"><span class="glyphicon glyphicon-list-alt left" aria-hidden="true"></span> Otro</button>
            
			<a href="#div1" class='MO'>
            <button type="button" class="btn btn-primary "><span class="glyphicon glyphicon-stats left" aria-hidden="true"></span> Graficos</button>
			</a>
		</center>

        </div>
		<?php include "scr/php/datosMD.php"?>
        
    </div>

    <script src="highcharts/js/highcharts.js"></script>
    <script src="highcharts/js/modules/exporting.js"></script>
    <script src="highcharts/export-csv.js"></script>
</div>

<?php include ("scr/php/foot.php")?>

</body>
</html>