<?php
	$con = mysqli_connect('localhost','root','','clima');
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}
	$sql="SELECT * FROM $pag ORDER BY ordenar DESC LIMIT 1";
	$result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));
	while($row = mysqli_fetch_array($result)) {
		
		$temp=(float)$row['temp'];
		$hum=$row['humedad'];
		$viento=(float)$row['vPromedio'];
		
		if($temp >= '30' && $hum <= '30' && $viento >= '16.2'){
			echo '
			
			<script type="text/javascript">
				alert("¡¡¡Alerta!!! Peligro de incendio en la zona");
				
			</script>
			
			<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡¡¡Alerta!!!</strong> Posible incendio en la zona (Alerta 30/30/30).
  </div>';
		}
	}
?>