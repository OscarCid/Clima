<?php
$con = mysqli_connect('localhost','root','','clima');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$pag=$porciones[2];

?>
	
<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/highcharts-more.js"></script>
<script src="highcharts/js/modules/data.js"></script>
<div id="GraficoViento" style="min-width: 420px; height: 400px; margin: 0 auto"></div>

    <div style="display:none">
        <table id="freq" border="0" cellspacing="0" cellpadding="0">
            <tr nowrap bgcolor="#CCCCFF">
                <th colspan="9" class="hdr">Tabla de Frecuencia (%)</th>
            </tr>
            <tr nowrap bgcolor="#CCCCFF">
                <th class="freq">Dirección</th>
                <th class="freq">Total</th>
            </tr>
<?php
$sql="SELECT * FROM $pag ORDER BY ordenar DESC limit 100;";
$result = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result2 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result3 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result4 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result5 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result6 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result7 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result8 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result9 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result10 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result11 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result12 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result13 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result14 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result15 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$result16 = mysqli_query($con,$sql)or die("Error en: " . mysql_error());
$letra = "";
$array1[]=0;
$array2[]=0;
$array3[]=0;
$array4[]=0;
$array5[]=0;
$array6[]=0;
$array7[]=0;
$array8[]=0;
$array9[]=0;
$array10[]=0;
$array11[]=0;
$array12[]=0;
$array13[]=0;
$array14[]=0;
$array15[]=0;
$array16[]=0;
while($row = mysqli_fetch_array($result)) {
    $dviento = $row["direcViento"];
    switch (true) {
        case (($dviento >= 349.5 && $dviento <= 360) || ($dviento >= 0 && $dviento <= 10.5)): {
			
			$letra = "N";
            $array1[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result2)) {
    $dviento = $row["direcViento"];
	$countNNE=0;
    switch (true) {
        case (($dviento >= 10.5) && $dviento <= 33.5): {
            $letra = "NNE";
			$array2[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result3)) {
    $dviento = $row["direcViento"];
	$countNE=0;
    switch (true) {
        case (($dviento >= 33.5) && $dviento <= 55.5): {
            $letra = "NE";
            $array3[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result4)) {
    $dviento = $row["direcViento"];
	$countENE=0;
    switch (true) {
        case (($dviento >= 55.5) && $dviento <= 78.5): {
            $letra = "ENE";
            $array4[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result5)) {
    $dviento = $row["direcViento"];
	$countE=0;
    switch (true) {
        case (($dviento >= 78.5) && $dviento <= 100.5): {
            $letra = "E";
            $array5[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result6)) {
    $dviento = $row["direcViento"];
	$countESE=0;
    switch (true) {
        case (($dviento >= 100.5) && $dviento <= 123.5): {
            $letra = "ESE";
            $array6[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result7)) {
    $dviento = $row["direcViento"];
	$countSE=0;
    switch (true) {
        case (($dviento >= 123.5) && $dviento <= 145.5): {
            $letra = "SE";
            $array7[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result8)) {
    $dviento = $row["direcViento"];
	$countSSE=0;
    switch (true) {
        case (($dviento >= 145.5) && $dviento <= 168.5): {
            $letra = "SSE";
            $array8[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result9)) {
    $dviento = $row["direcViento"];
	$countS=0;
    switch (true) {
        case (($dviento >= 168.5) && $dviento <= 190.5): {
            $letra = "S";
            $array9[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result10)) {
    $dviento = $row["direcViento"];
	$countSSO=0;
    switch (true) {
        case (($dviento >= 190.5) && $dviento <= 213.5): {
            $letra = "SSO";
            $array10[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result11)) {
    $dviento = $row["direcViento"];
	$countSO=0;
    switch (true) {
        case (($dviento >= 213.5) && $dviento <= 235.5): {
            $letra = "SO";
            $array11[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result12)) {
    $dviento = $row["direcViento"];
	$countOSO=0;
    switch (true) {
        case (($dviento >= 235.5) && $dviento <= 258.5): {
            $letra = "OSO";
            $array12[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result13)) {
    $dviento = $row["direcViento"];
	$countO=0;
    switch (true) {
        case (($dviento >= 258.5) && $dviento <= 280.5): {
            $letra = "O";
            $array13[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result14)) {
    $dviento = $row["direcViento"];
	$countONO=0;
    switch (true) {
        case (($dviento >= 280.5) && $dviento <= 303.5): {
            $letra = "ONO";
            $array14[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result15)) {
    $dviento15 = $row["direcViento"];
	$countNO=0;
    switch (true) {
        case (($dviento >= 303.5) && $dviento <= 325.5): {
            
			$letra = "NO";
            $array15[]=$row['intViento'].'.'.$row['intVientoDec'];
            break;
        }
    }
}

while($row = mysqli_fetch_array($result16)) {
    $dviento = $row["direcViento"];
	$countNNO =0;
    switch (true) {
        case (($dviento >= 325.5) && $dviento <= 349.5): {
            
			$letra = "NNO";
            $array16[]=$row['intViento'].'.'.$row['intVientoDec'];
			
            break;
        }
    }
}

function porcentaje($total, $parte, $redondear = 2) {
    return round($parte / $total * 100, $redondear);
}
$countN=count($array1)-1;
$countNNE=count($array2)-1;
$countNE=count($array3)-1;
$countENE=count($array4)-1;
$countE=count($array5)-1;
$countESE=count($array6)-1;
$countSE=count($array7)-1;
$countSSE=count($array8)-1;
$countS=count($array9)-1;
$countSSO=count($array10)-1;
$countSO=count($array11)-1;
$countOSO=count($array12)-1;
$countO=count($array13)-1;
$countONO=count($array14)-1;
$countNO=count($array15)-1;
$countNNO=count($array16)-1;
            $total = $countN + $countNE + $countNNE + $countE + $countENE + $countESE + $countNNO + $countNO + $countO + $countONO + $countOSO + $countS + $countSE + $countSO + $countSSE + $countSSO;

echo "	<tr nowrap>
			<td class='dir'>N</td>
			<td class='data'>".porcentaje($total, $countN, 2)."</td>
		</TR>
        <tr nowrap bgcolor='#DDDDDD'>
            <td class='dir'>NNE</td>
			<td class='data'>".porcentaje($total, $countNNE, 2)."</td>
		</TR>
        <tr nowrap>
            <td class='dir'>NE</td>
			<td class='data'>".porcentaje($total, $countNE, 2)."</td>
		</TR>
        <tr nowrap  bgcolor='#DDDDDD'>
            <td class='dir'>ENE</td>
			<td class='data'>".porcentaje($total, $countENE, 2)."</td>
		</TR>
        <tr nowrap>
            <td class='dir'>E</td>
			<td class='data'>".porcentaje($total, $countE, 2)."</td>
		</TR>
        <tr nowrap bgcolor='#DDDDDD'>
            <td class='dir'>ESE</td>
			<td class='data'>".porcentaje($total, $countESE, 2)."</td>
		</TR>
        <tr nowrap>
            <td class='dir'>SE</td>
			<td class='data'>".porcentaje($total, $countSE, 2)."</td>
		</TR>
        <tr nowrap bgcolor='#DDDDDD'>
            <td class='dir'>SSE</td>
			<td class='data'>".porcentaje($total, $countSSE, 2)."</td>
		</TR>
        <tr nowrap>
            <td class='dir'>SE</td>
			<td class='data'>".porcentaje($total, $countSE, 2)."</td>
		</TR>
        <tr nowrap bgcolor='#DDDDDD'>
            <td class='dir'>SSO</td>
			<td class='data'>".porcentaje($total, $countSSO, 2)."</td>
		</TR>
        <tr nowrap>
            <td class='dir'>SO</td>
			<td class='data'>".porcentaje($total, $countSO, 2)."</td>
		</TR>
        <tr nowrap bgcolor='#DDDDDD'>
            <td class='dir'>OSO</td>
			<td class='data'>".porcentaje($total, $countOSO, 2)."</td>
		</TR>
        <tr nowrap>
            <td class='dir'>O</td>
			<td class='data'>".porcentaje($total, $countO, 2)."</td>
		</TR>
        <tr nowrap bgcolor='#DDDDDD'>
            <td class='dir'>ONO</td>
			<td class='data'>".porcentaje($total, $countONO, 2)."</td>
		</TR>
        <tr nowrap>
            <td class='dir'>NO</td>
			<td class='data'>".porcentaje($total, $countNO, 2)."</td>
		</TR>
        <tr nowrap  bgcolor='#DDDDDD'>
            <td class='dir'>NNO</td>
			<td class='data'>".porcentaje($total, $countNNO, 2)."</td>
		</tr>
		<tr nowrap>
            <td class='dir'>Total</td>
			<td class='data'>$total</td>
		</TR>";
		

?>

        </table>
    </div>
