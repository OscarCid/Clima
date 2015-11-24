
<?php

$estacion = $_POST['probando'];
// NULL
$con = mysqli_connect('localhost','root','','clima');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"clima");
//Consulta datos precipitaciones
$sql2="SELECT * FROM $estacion WHERE precipHoy NOT LIKE 0 OR precipHoyDec NOT LIKE 0 ORDER BY ordenar DESC LIMIT 1";
$result2 = mysqli_query($con,$sql2)or die("Error en: " . mysql_error());

while($row = mysqli_fetch_array($result2)) {
    $ultPrecipFecha = $row["fecha"];
    $ultPrecipHora = $row["hora"];
}

$ano = date("y");

$sql3="SELECT AVG( precipHoy ) AS promedio FROM $estacion WHERE fecha LIKE '%$ano'" ;
$result3 = mysqli_query($con,$sql3)or die("Error en: " . mysql_error());

while($row = mysqli_fetch_array($result3)) {
    $promPrecip = $row["promedio"];
}
$sql4="SELECT AVG( precipHoyDec ) AS promedio FROM $estacion WHERE fecha LIKE '%$ano'" ;
$result4 = mysqli_query($con,$sql4)or die("Error en: " . mysql_error());

while($row = mysqli_fetch_array($result4)) {
    $promPrecipDec = $row["promedio"]/10;
}
$precipAnio = $promPrecip + $promPrecipDec;
//Consulta ultimos datos
$sql="SELECT * FROM $estacion ORDER BY ordenar DESC LIMIT 1;";
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
                                                                <td>Temperatura Exterior</td>
                                                                <td>$row[temp].$row[tempDec] C</td>
                                                                <td>Humedad Exterior</td>
                                                                <td>$row[humedad] %</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temperatura Interior</td>
                                                                <td>$row[tempInterior].$row[tempInteriorDec] C</td>
                                                                <td>Humedad Interior</td>
                                                                <td>$row[humInterior] %</td>
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
                                                                <td>$precipAnio</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Precipitacion esta hora</td>
                                                                <td>$row[precipHoy].$row[precipHoyDec] mm</td>
                                                                <td>Ultima precipitacion</td>
                                                                <td>$ultPrecipFecha $ultPrecipHora</td>
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
                                                            <td>Intencidad del Viento</td>
                                                            <td>$row[intViento].$row[intVientoDec] kts</td>
                                                            <td>Viento Base</td>
                                                            <td>$row[vBase].$row[vBaseDec] kts</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rafaga Viento</td>
                                                            <td>$row[vRafaga].$row[vRafagaDec] kts</td>
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
                                                            <td>Radiacion Solar</td>
                                                            <td>$row[rSolar]</td>
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
