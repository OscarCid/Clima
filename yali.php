<!DOCTYPE html>
<html >
<head>
    <title>Estación El Yali - Meteorologia UPLA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="scr/js/actualizarIndex.js"></script>

    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.css">
    <script src="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script>
    jQuery(document).ready(function() {
        $(".oculto").hide();
        $("#div2").show();
        $(".MO").click(function(){
            var nodo = $(this).attr("href");

            if ($(nodo).is(":visible")){
                $(nodo).hide();
                return false;
            }else{
                $(".oculto").hide();
                $(nodo).fadeToggle( "slow" );
                return false;
            }
        });
    });
</script>
</head>
<?php $actual_link = "$_SERVER[REQUEST_URI]";
$porciones = explode("/", $actual_link);
?>
<body onload="actualizarIndex('<?php echo $porciones[2]; ?>'); setInterval(actualizarIndex.bind(null,'<?php echo $porciones[2]; ?>'),5000)">

<div class="container-fluid">

    <?php
    $pag= $porciones[2];
    include ("scr/php/menu.php");
    include ("scr/php/banner.php");

    ?>

    <!-- Div que muestra los datos de scr/php/datosIndex.php -->
    <!-- Tu no tienes alma -->
    <div id="div2" class="oculto">

    <div class="col-md-2 col-md-offset-5" style="padding-bottom: 10px">
        <a href="#div1" class='MO'>
            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-stats left" aria-hidden="true"></span> Graficos</button>
        </a>

        <button type="button" class="btn btn-primary active"><span class="glyphicon glyphicon-list-alt left" aria-hidden="true"></span> Tablas</button>

        <br>
    </div>
    <div class="alert alert-success collapse col-md-10 col-md-offset-1" id="success-alert">
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

        <div class="col-md-2 col-md-offset-5" style="padding-bottom: 10px">

                <button type="button" class="btn btn-primary active"><span class="glyphicon glyphicon-stats left" aria-hidden="true"></span> Graficos</button>

            <a href="#div2" class='MO'>
            <button type="button" class="btn btn-primary "><span class="glyphicon glyphicon-list-alt left" aria-hidden="true"></span> Tablas</button>
            </a>
            <br>
        </div>
        <?php include "prueba.php"?>
    </div>

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="highcharts/js/highcharts.js"></script>
    <script src="highcharts/js/modules/exporting.js"></script>
</div>



<?php include ("scr/php/foot.php")?>





</body>
</html>