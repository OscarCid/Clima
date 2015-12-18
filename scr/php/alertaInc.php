<?php
	$con = mysqli_connect('localhost','root','','clima');
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}
	
	switch ($pag)
                {
				case 'yali':
                $estacionAf = 'Estación Meteorológica El Yali'                               ;

                break;
                case 'campana':
                $estacionAf = 'Estación Meteorológica La Campana'                                ;

                break;
                case 'peral':
                $estacionAf = 'Estación Meteorológica El Peral'                                ;

                break;

                default:
                return 'Error';
				}
	
	$sql="SELECT * FROM $pag ORDER BY fecha DESC, hora DESC LIMIT 1";
	$result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));
	while($row = mysqli_fetch_array($result)) {
		
		$temp=(float)$row['temp'];
		$hum=$row['humedad'];
		$viento=(float)$row['vPromedio'];
		
		if($temp >= '30' && $hum <= '30' && $viento >= '16.2'){
			
						/*$destinatario = "maikelocops3@gmail.com"; 
						$asunto = "Alerta de Incendio - Meteorología UPLA"; 
						$cuerpo = ' 
						<html> 
						<head> 
						   <title>Comprovación del correo</title> 
						</head> 
						<body> 
						<h1>Hola,</h1> 
						<p> 
						<b>Este correo es de alerta de incendio en la '.$estacionAf.'.
						</p> 
						</body> 
						</html> 
						'; 

						//para el envío en formato HTML 
						$headers = "MIME-Version: 1.0\r\n"; 
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

						//dirección del remitente 
						$headers .= "From: Michel Lira <michel.lira8@gmail.com>\r\n"; 

						//dirección de respuesta, si queremos que sea distinta que la del remitente 
						$headers .= "Reply-To: michel.lira8@gmail.com\r\n"; 

						mail($destinatario,$asunto,$cuerpo,$headers);*/
			
			echo '
			
			<script type="text/javascript">
				alert("¡¡¡Alerta!!! Peligro de incendio en la zona");
				
			</script>
			
			<div class="col-md-10 col-md-offset-1 alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡¡¡Alerta!!!</strong> Posible incendio en la zona (Alerta 30/30/30).
  </div>';
		}
	}
?>