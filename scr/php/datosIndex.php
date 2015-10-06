<!DOCTYPE html>
<html>
<head>
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
    echo "<div class='row'>
        <div class='col-md-8 col-md-offset-2'>
                            <!-- Primer Panel Temperatura-->
                                        <div class='panel panel-success'>
                                            <div class='panel-heading'>
                                                <h3 class='panel-title'>Temperatura y Humedad</h3>
                                            </div>
                                            <div class='panel-body'>
                                            <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='bs-example' data-example-id='bordered-table'>
                                                    <table class='table table-bordered'>
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
    </div>

    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
                            <!-- Panel Viento-->
                                        <div class='panel panel-success'>
                                            <div class='panel-heading'>
                                                <h3 class='panel-title'>Informacion sobre el viento</h3>
                                            </div>
                                            <div class='panel-body'>
                                            <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='bs-example' data-example-id='bordered-table'>
                                                    <table class='table table-bordered'>
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
    </div>";
    mysqli_close($con);
}
?>
</body>
</html>