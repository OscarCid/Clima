<?php
include_once "../../conexion.php";
echo '<a href="../../../4"><button>Regresar</button></a><br>';
if($_POST){
	$estacion = $_POST['estacionSelect'] ;
	$nombre_archivo = $_FILES [ 'file2' ][ 'name' ];
	$destino = '../../txt/' ;
	move_uploaded_file ( $_FILES [ 'file2' ][ 'tmp_name' ], $destino . '/'.$nombre_archivo);
	$archivo = "../../txt/".$nombre_archivo;

	function multiexplode ($delimiters,$string) {

		$ready = str_replace($delimiters, $delimiters[0], $string);
		$launch = explode($delimiters[0], $ready);
		return  $launch;
	}

	$file = new SplFileObject($archivo);
	$i=0;
	// Loop until we reach the end of the file.
	while (!$file->eof()) {
		// Echo one line from the file.
		$linea = $file->fgets();

		$partes = multiexplode(array(",","."),$linea);

		$aux = explode("-", $partes[0]);

		if (isset($aux[0]) and isset($aux[1]) and isset($aux[2]))
		{
			$fecha = $aux[2]."-".$aux[1]."-".$aux[0];
		}


		if (isset($fecha) and isset($partes[1]) and isset($partes[2]) and isset($partes[38]))
		{
			$query = "INSERT INTO estacion (fecha, hora, estacion, temp, humedad, pRocio, vPromedio, vRafaga, direcViento, precActual, precHoy, presion, precTotal, tempInterior, humInterior, uViento, senTermica, indHumidex, uvIndex, rSolar, evotrans, evotransAnual, tAparente, rSolarMax, hSol_hoy, dVientoActual) VALUES
				('".$fecha."','".$partes[1]."','".$estacion."','".$partes[2].".".$partes[3]."','".$partes[4]."','".$partes[5].".".$partes[6]."','".$partes[7].".".$partes[8]."','".$partes[9].".".$partes[10]."','".$partes[11]."','".$partes[12].".".$partes[13]."','".$partes[14].".".$partes[15]."','".$partes[16].".".$partes[17]."','".$partes[18].".".$partes[19]."','".$partes[20].".".$partes[21]."','".$partes[22]."','".$partes[23].".".$partes[24]."','".$partes[25].".".$partes[26]."','".$partes[27].".".$partes[28]."','".$partes[29].".".$partes[30]."','".$partes[31]."','".$partes[32].".".$partes[33]."','".$partes[34].".".$partes[35]."','".$partes[36].".".$partes[37]."','".$partes[38]."','".$partes[36].".".$partes[37]."','".$partes[38]."')";
			// -- fecha -----,-- hora---------,----estacion----,----------- temp--------------,----humedad------,------------pRocio------------,-------vPromedio---------------,------vRafaga------------------,---direcViento----,---------precActual--------------,----------.-----precHoy----------,------------presion--------------,-------------precTotal-----------,------------tempInterior---------,---humInterior---,--------uViento------------------,-----------senTermica------------,-----------indhumidex------------,-----------uvIndex---------------,------rSolar-----,----------evotrans---------------,-------evotranAnual--------------,--------tAparente----------------,----rSolarMax----,----------hSol_hoy---------------,--dViento-Actual

		}

		if ($con->query($query) == TRUE)
		{
			$i++;
			echo "New record created successfully<br>";
		}
		else
		{
			echo "Error: " .$query. " <br> -- <br>" . $con->error. "<br>";
		}
	}

	// Unset the file to call __destruct(), closing the file handle.
	$file = null;
	unlink($archivo);
	$con->close();
	}
?>