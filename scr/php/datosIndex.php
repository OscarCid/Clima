
<?php
include_once "../conexion.php";
$estacion = $_POST['probando'];
// NULL

//Consulta datos precipitaciones
$ano='';
$mes='';
$dia='';
$sql0="SELECT * FROM estacion WHERE estacion = '".$estacion."'  ORDER BY fecha DESC, hora DESC LIMIT 1;";
$result0 = mysqli_query($con,$sql0)or die("Error en: " .  mysqli_error($con));

while($row = mysqli_fetch_array($result0)) {
    $Fecha = $row["fecha"];
	list( $ano, $mes, $dia  ) = split( '[/.-]', $Fecha);
	
}

$sql2="SELECT * FROM estacion WHERE estacion = '".$estacion."' AND precHoy NOT LIKE '0.0' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result2 = mysqli_query($con,$sql2)or die();
    $ultPrecipFecha = "--";
    $ultPrecipHora = "--";

while($row = mysqli_fetch_array($result2)) {
		
    $ultPrecipFecha = date("d-m-Y", strtotime($row['fecha']));
    $ultPrecipHora = date("H:i", strtotime($row['hora']));

}


$sql3="SELECT AVG( precHoy ) AS promedio FROM estacion WHERE estacion = '".$estacion."' AND fecha LIKE '$ano%'" ;
$result3 = mysqli_query($con,$sql3)or die("Error en: " . mysqli_error($con));

while($row = mysqli_fetch_array($result3)) {
    $promPrecip = $row["promedio"];
}

$precipAnio = number_format($promPrecip, 6, '.','');

$sql4="SELECT SUM(precHoy) AS precMensual FROM (SELECT DISTINCT(fecha), precHoy FROM estacion WHERE estacion = '".$estacion."' AND fecha LIKE '$ano-$mes-%' AND precHoy NOT LIKE '0.0') AS tabla";
$result4 = mysqli_query($con,$sql4)or die("Error en: " . mysqli_error($con));

$precMes= "0";
while($row = mysqli_fetch_array($result4)) {
    $precMes=$row['precMensual'];
}

$sql5="SELECT * FROM estacion WHERE estacion = '".$estacion."' AND fecha LIKE '$ano-$mes-$dia' AND precHoy NOT LIKE '0.0' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result5 = mysqli_query($con,$sql5)or die("Error en: " . mysqli_error($con));
$precDia="0.0";
while($row = mysqli_fetch_array($result5)) {
   
		$precDia=$row['precHoy'];
		
	
}

//Consulta ultimos datos

$sql="SELECT * FROM estacion WHERE estacion = '".$estacion."' ORDER BY fecha DESC, hora DESC LIMIT 1;";
$result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));

while($row = mysqli_fetch_array($result)) {
    
	$dviento = $row["direcViento"];
	$viento = $row["vPromedio"];
    $letra = "";
	$beufort = "";
	$beufortNum = "";
    switch(true)
    {
        case (($dviento >= 349.5 && $dviento <= 360) || ($dviento >= 0 && $dviento <= 10.5)):
        {
            $letra= "N";
            break;
        }
        case (($dviento >= 10.5) && $dviento <= 33.5):
        {
            $letra= "NNE";
            break;
        }
        case (($dviento >= 33.5) && $dviento <= 55.5):
        {
            $letra= "NE";
            break;
        }
        case (($dviento >= 55.5) && $dviento <= 78.5):
        {
            $letra= "ENE";
            break;
        }
        case (($dviento >= 78.5) && $dviento <= 100.5):
        {
            $letra= "E";
            break;
        }
        case (($dviento >= 100.5) && $dviento <= 123.5):
        {
            $letra= "ESE";
            break;
        }
        case (($dviento >= 123.5) && $dviento <= 145.5):
        {
            $letra= "SE";
            break;
        }
        case (($dviento >= 145.5) && $dviento <= 168.5):
        {
            $letra= "SSE";
            break;
        }
        case (($dviento >= 168.5) && $dviento <= 190.5):
        {
            $letra= "S";
            break;
        }
        case (($dviento >= 190.5) && $dviento <= 213.5):
        {
            $letra= "SSO";
            break;
        }
        case (($dviento >= 213.5) && $dviento <= 235.5):
        {
            $letra= "SO";
            break;
        }
        case (($dviento >= 235.5) && $dviento <= 258.5):
        {
            $letra= "OSO";
            break;
        }
        case (($dviento >= 258.5) && $dviento <= 280.5):
        {
            $letra= "O";
            break;
        }
        case (($dviento >= 280.5) && $dviento <= 303.5):
        {
            $letra= "ONO";
            break;
        }
        case (($dviento >= 303.5) && $dviento <= 325.5):
        {
            $letra= "NO";
            break;
        }
        case (($dviento >= 325.5) && $dviento <= 349.5):
        {
            $letra= "NNO";
            break;
        }
    }
	
	switch(true)
    {
        case ($viento >= 0 && $viento < 1):
        {
            $beufort= "Calma";
			$beufortNum = "0";
            break;
        }
        case (($viento >= 1) && $viento < 4):
        {
            $beufort= "Ventolina";
			$beufortNum = "1";
            break;
        }
        case (($viento >= 4) && $viento < 7):
        {
            $beufort= "Flojito (Brisa muy débil)";
			$beufortNum = "2";
            break;
        }
        case (($viento >= 7) && $viento < 11):
        {
            $beufort= "Flojo (Brisa Ligera)";
            $beufortNum = "3";
			break;
        }
        case (($viento >= 11) && $viento < 17):
        {
            $beufort= "Bonancible (Brisa moderada)";
            $beufortNum = "4";
			break;
        }
        case (($viento >= 17) && $viento < 22):
        {
            $beufort= "Fresquito (Brisa fresca)";
            $beufortNum = "5";
			break;
        }
        case (($viento >= 22) && $viento < 28):
        {
            $beufort= "Fresco (Brisa fuerte)";
            $beufortNum = "6";
			break;
        }
        case (($viento >= 28) && $viento < 34):
        {
            $beufort= "Frescachón (Viento fuerte)";
            $beufortNum = "7";
			break;
        }
        case (($viento >= 34) && $viento < 41):
        {
            $beufort= "Temporal (Viento duro)";
            $beufortNum = "8";
			break;
        }
		case (($viento >= 41) && $viento < 48):
        {
            $beufort= "Temporal fuerte (Muy duro)";
            $beufortNum = "9";
			break;
        }
        case (($viento >= 48) && $viento < 56):
        {
            $beufort= "Temporal duro (Temporal)";
            $beufortNum = "10";
			break;
        }
        case (($viento >= 56) && $viento < 64):
        {
            $beufort= "Temporal muy duro (Borrasca)";
            $beufortNum = "11";
			break;
        }
        case (($viento >= 64)):
        {
            $beufort= "	Temporal huracanado (Huracán)";
            $beufortNum = "12";
			break;
        }
    }
	
    echo "
<div class='row'>
    <div class='col-md-10 col-md-offset-1'>
	
        <div class='col-md-12 col-xs-12'>
		
		<strong><h4>Condiciones para el dia ".date("d-m-Y", strtotime($row['fecha']))." a las ".date("H:i", strtotime($row['hora']))."</h4></strong>
		
		</div>
	
    <!-- Primer Panel Temperatura-->
            <div class='col-md-6 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Temperatura y Humedad</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-bordered table-condensed table-responsive'>
                                                
                                                            <tbody>
                                                            <tr>
                                                                <td><strong>Temperatura Exterior</strong></td>
                                                                <td>$row[temp] °C</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Aparente</strong></td>
                                                                <td>$row[tAparente] °C</td>                                                                
                                                            </tr>
															<tr>
																<td><strong>Sensación Termica</strong></td>
                                                                <td>$row[senTermica] °C</td>
                                                            </tr>
															<tr>
																<td><strong>Punto de Rocío</strong></td>
                                                                <td>$row[pRocio] °C</td>
                                                            </tr>
															<tr>
																<td><strong>Humedad Exterior</strong></td>
                                                                <td>$row[humedad] %</td>
                                                            </tr>
															
															
                                                            <tr>
                                                                <td width='50%'><strong>Evotranspiración</strong></td>
                                                                <td>$row[evotrans] mm</td>
                                                            </tr>
                                                            
															
                                                            </tbody>
                                                        </table>
                                                  
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
            </div>
    <!-- Panel Precipitaciones-->
            <div class='col-md-6 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Precipitacion</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-bordered table-condensed table-responsive'>

                                                            <tbody>
                                                            <tr>
                                                                <td width='50%'><strong>Precipitacion hoy</strong></td>
                                                                <td>$precDia mm</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Ritmo</strong></td>
                                                                <td>$row[precActual] mm/hr</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Precipitacion este mes</strong></td>
                                                                <td>$precMes mm</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Precipitaciones este año</strong></td>
                                                                <td>$precipAnio mm</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Precipitacion esta hora</strong></td>
                                                                <td>$row[precHoy] mm</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Ultima precipitacion</strong></td>
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
    <div class='col-md-10 col-md-offset-1'>
<!-- Panel Viento-->
        <div class='col-md-6 col-xs-12'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                <h3 class='panel-title'>Viento y Fuerza</h3>
                                            </div>
                                            <div class='panel-body'>
                                            <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='bs-example' data-example-id='bordered-table'>
                                                    <table class='table table-bordered table-condensed table-responsive'>
                                                        
                                                        <tbody>
                                                        <tr>
                                                            <td width='50%'><strong>Intencidad del Viento</strong></td>
                                                            <td>$row[vPromedio] kts 

                                                        </tr>
                                                        <tr>
															<td><strong>Rafaga Viento</strong></td>
                                                            <td>$row[vRafaga] kts</td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td><strong>Direccion del Viento</strong></td>
                                                            <td>$row[direcViento]° $letra</td>
														
                                                        </tr>
														<tr>
                                                            
                                                            <td><strong>Escala de Beaufort F$beufortNum</strong></td>
                                                            <td>$beufort</td>
														
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
										</div>
                                
        </div>
<!-- Panel Presion-->
        <div class='col-md-6 col-xs-12'>
                           
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                <h3 class='panel-title'>Presión atmosferica y tendencia</h3>
                                            </div>
                                            <div class='panel-body'>
                                            <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='bs-example' data-example-id='bordered-table'>
                                                    <table class='table table-bordered table-condensed table-responsive'>
                                                        
                                                        <tbody>
                                                        <tr>
                                                            <td width='50%'><strong>Presion</strong></td>
                                                            <td>$row[presion] hPa</td>
                                                        </tr>
														<tr>
															<td><strong>Radiación Solar</strong></td>
                                                            <td>$row[rSolar] W/m²</td>
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
