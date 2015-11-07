<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<?php

$con = mysqli_connect('localhost','root','','clima');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"clima");
$sql="SELECT * FROM yali ORDER BY ordenar DESC LIMIT 1;";
$result = mysqli_query($con,$sql)or die("Error en: " . mysql_error());


while($row = mysqli_fetch_array($result)) {
    echo "
<div class='row'>
    <div class='cold-md-12'>
    <!-- Primer Panel Temperatura-->
            <div class='col-md-5 col-md-offset-1 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Temperatura y Humedad</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-bordered table-condensed table-responsive'>
                                                            <thead>
                                                            <tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Fecha</td>
                                                                <td>$row[fecha]</td>
                                                                <td>Hora</td>
                                                                <td>$row[hora]</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temperatura</td>
                                                                <td>$row[temp].$row[tempDec] C</td>
                                                                <td>Humedad</td>
                                                                <td>$row[humedad] %</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Punto de Rocio</td>
                                                                <td>$row[pRocio].$row[pRocioDec] C</td>
                                                                <td>Indice de Calor</td>
                                                                <td>$row[indCalor].$row[indCalorDec] C</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
            </div>
    <!-- Panel Precipitaciones-->
            <div class='col-md-5 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Precipitacion</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-bordered table-condensed table-responsive'>
                                                            <thead>
                                                            <tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Precipitacion hoy</td>
                                                                <td>?</td>
                                                                <td>Ritmo</td>
                                                                <td>$row[ritmoLLuvia].$row[ritmoLLuviaDec] mm/hr</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Precipitacion este mes</td>
                                                                <td>?</td>
                                                                <td>Precipitaciones este año</td>
                                                                <td>?</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Precipitacion esta hora</td>
                                                                <td>$row[precipHoy].$row[precipHoyDec] mm</td>
                                                                <td>Ultima precipitacion</td>
                                                                <td>?</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
            </div>
    </div>
</div>

<div class='row'>
    <div class='cold-md-12'>
<!-- Panel Viento-->
        <div class='col-md-5 col-md-offset-1 col-xs-12'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                <h3 class='panel-title'>Viento y Fuerza</h3>
                                            </div>
                                            <div class='panel-body'>
                                            <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='bs-example' data-example-id='bordered-table'>
                                                    <table class='table table-bordered table-condensed table-responsive'>
                                                        <thead>
                                                        <tr>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Velocidad viento (rafaga)</td>
                                                            <td>$row[vRafaga].$row[vRafagaDec] kts</td>
                                                            <td>Velocidad viento (medio)</td>
                                                            <td>$row[vMedio].$row[vMedioDec] kts</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Direccion del Viento</td>
                                                            <td>$row[direcViento]</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>
        </div>
<!-- Panel Presion-->
        <div class='col-md-5 col-xs-12'>
                            <!-- Panel Presion-->
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                <h3 class='panel-title'>Presion atmosferica y tendencia</h3>
                                            </div>
                                            <div class='panel-body'>
                                            <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='bs-example' data-example-id='bordered-table'>
                                                    <table class='table table-bordered table-condensed table-responsive'>
                                                        <thead>
                                                        <tr>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Presion</td>
                                                            <td>$row[presion].$row[presionDec] hPa</td>
                                                            <td>Steady</td>
                                                            <td>?</td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>
        </div>
    </div>
</div>
";
    mysqli_close($con);
}
?>
</body>
</html>