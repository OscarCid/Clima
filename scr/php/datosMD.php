<div class='row'>
    <div class='col-md-12 col-lg-12 col-xs-12 col-sm-12'>
        <div class="container">
           
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
<?php

$estacion = 'yali';
// NULL
$con = mysqli_connect('localhost','root','','clima');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"clima");
//Consulta datos precipitaciones

$sql0="SELECT * FROM $estacion ORDER BY fecha DESC, hora DESC LIMIT 1;";
$result0 = mysqli_query($con,$sql0)or die("Error en: " .  mysqli_error($con));

while($row = mysqli_fetch_array($result0)) {
    $Fecha = $row["fecha"];
	list( $ano, $mes, $dia  ) = split( '[/.-]', $Fecha);
	
}


$sql1="SELECT * FROM $estacion WHERE temp = (SELECT MIN(temp) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result1)) {
	$tMinHoy = $row['temp'];
	$thMinHoy = date("H:i", strtotime($row['hora']));
}

$sql2="SELECT * FROM $estacion WHERE temp = (SELECT MAX(temp) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result2 = mysqli_query($con,$sql2)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result2)) {
	$tMaxHoy = $row['temp'];
	$thMaxHoy = date("H:i", strtotime($row['hora']));
}

$sql3="SELECT * FROM $estacion WHERE senTermica = (SELECT MIN(senTermica) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result3 = mysqli_query($con,$sql3)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result3)) {
	$stMinHoy = $row['senTermica'];
	$sthMinHoy = date("H:i", strtotime($row['hora']));
}

$sql4="SELECT * FROM $estacion WHERE senTermica = (SELECT MAX(senTermica) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result4 = mysqli_query($con,$sql4)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result4)) {
	$stMaxHoy = $row['senTermica'];
	$sthMaxHoy = date("H:i", strtotime($row['hora']));
}
$sql5="SELECT * FROM $estacion WHERE humedad = (SELECT MIN(humedad) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result5 = mysqli_query($con,$sql5)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result5)) {
	$hMinHoy = $row['humedad'];
	$hhMinHoy = date("H:i", strtotime($row['hora']));
}

$sql6="SELECT * FROM $estacion WHERE humedad = (SELECT MAX(humedad) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result6 = mysqli_query($con,$sql6)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result6)) {
	$hMaxHoy = $row['humedad'];
	$hhMaxHoy = date("H:i", strtotime($row['hora']));
}
$sql7="SELECT * FROM $estacion WHERE tempInterior = (SELECT MIN(tempInterior) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result7 = mysqli_query($con,$sql7)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result7)) {
	$tIMinHoy = $row['tempInterior'];
	$tIhMinHoy = date("H:i", strtotime($row['hora']));
}

$sql8="SELECT * FROM $estacion WHERE tempInterior = (SELECT MAX(tempInterior) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result8 = mysqli_query($con,$sql8)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result8)) {
	$tIMaxHoy = $row['tempInterior'];
	$tIhMaxHoy = date("H:i", strtotime($row['hora']));
}
$sql9="SELECT * FROM $estacion WHERE humInterior = (SELECT MIN(humInterior) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result9 = mysqli_query($con,$sql9)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result9)) {
	$hIMinHoy = $row['humInterior'];
	$hIhMinHoy = date("H:i", strtotime($row['hora']));
}

$sql10="SELECT * FROM $estacion WHERE humInterior = (SELECT MAX(humInterior) FROM $estacion WHERE fecha LIKE '%$mes-$dia') AND fecha LIKE '%$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
$result10 = mysqli_query($con,$sql10)or die("Error en: " .  mysqli_error($con));
while($row = mysqli_fetch_array($result10)) {
	$hIMaxHoy = $row['humInterior'];
	$hIhMaxHoy = date("H:i", strtotime($row['hora']));
}


//Consulta ultimos datos

$sql="SELECT * FROM $estacion ORDER BY fecha DESC, hora DESC LIMIT 1;";
$result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));

while($row = mysqli_fetch_array($result)) {

    echo "
<div class='row' style='padding-top:10px'>
    <div class='col-md-12'>
    <!-- Primer Panel Temperatura-->
            <div class='col-md-12 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Temperatura y Humedad</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-striped table-hover table-condensed table-responsive'>
                                                
                                                            <tbody>
                                                            <tr>
                                                                <td width='50%'><strong>Temperatura Maxima Exterior</strong></td>
                                                                <td>".$tMaxHoy." °C</td>
																<td>a las $thMaxHoy</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Exterior</strong></td>
                                                                <td>".$tMinHoy." °C</td> 
																<td>a las $thMinHoy</td>
                                                            </tr>
															<tr>
																<td><strong>Rango de Temperatura</strong></td>
                                                                <td>".($tMaxHoy - $tMinHoy)." °C</td> 
																<td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Sensacion Termica</strong></td>
                                                                <td>$stMaxHoy °C</td>
																<td>a las $sthMaxHoy</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Sensacion Termica</strong></td>
                                                                <td>$stMinHoy °C </td>
																<td>a las $sthMinHoy</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Humedad Exterior</strong></td>
                                                                <td>$hMaxHoy % </td>
																<td>a las $hhMaxHoy</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Humedad Exterior</strong></td>
                                                                <td>$hMinHoy % </td>
																<td>a las $hhMinHoy</td>
                                                            </tr>
															<tr>
                                                                <td width='50%'><strong>Temperatura Maxima Interior</strong></td>
                                                                <td>$tIMaxHoy °C</td>
																<td>a las $tIhMaxHoy</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Interior</strong></td>
                                                                <td>$tIMinHoy °C</td>
																<td>a las $tIhMinHoy</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Maxima Humedad Interior</strong></td>
                                                                <td>$hIMaxHoy % </td>
																<td>a las $hIhMaxHoy</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Humedad Interior</strong></td>
                                                                <td>$hIMinHoy % </td>
																<td>a las $hIhMinHoy</td>
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
";
    mysqli_close($con);
}

?>			</div>
			</div>
			
					<div class="tab-pane" id="ayerD">
                        <div class="span8">
                            
                        </div>
                    </div>
			
		</div>
	</div>
</div>