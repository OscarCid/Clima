<?php
include_once "../conexion.php";
//Hacer post del archivo anterior
if($_POST){
	$nombre = $_POST['nombre'];
	$archivo = $_POST['archivo'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
	//Sacar el embed del iframe
	$actual_link = $_POST['mapa'];
	$por = explode('<iframe', $actual_link);
	$por1 = explode ('"',$por[1]);
	$por2 = explode ('pb=',$por1[1]);
	$emb = $por2[1];
	//Guardar imagen en la carpeta img
	$cad = ucwords($archivo);
	$arc = strtolower($archivo);
	$tamano = $_FILES [ 'file' ][ 'size' ]; // Leemos el tamaño del fichero 
	$tamaño_max="50000000000000000"; // Tamaño maximo permitido 
	if( $tamano <= $tamaño_max){ // Comprobamos el tamaño  
		$destino = '../img/' ; // Carpeta donde se guardata 
		$sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/ 
		$tipo=$sep[1]; // Obtenemos el tipo de imagen que es 
		if($tipo == "gif" || $tipo == "pjpeg" || $tipo == "bmp" || $tipo == "jpg" || $tipo == "jpeg"){ 
			move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$cad.'.jpg'); 
	 
		//Insertar a la tabla estacioneshab
		$sql="INSERT INTO estacioneshab (estacion, nombreEstacion, estado, lat, lon, emb) VALUES ('".$arc."', '".$nombre."', '1', '".$latitud."', '".$longitud."', '".$emb."')";
		$result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));

		echo "<strong>".$nombre."</strong><br><strong>".$archivo."</strong><br><strong>".$latitud."</strong><br><strong>".$longitud."</strong><br><strong>".$emb."</strong>";
		echo '<img src="../img/'.$cad.'.jpg" class="img-thumbnail" width="304" height="236">'; 
		?>
		<iframe src='https://www.google.com/maps/embed?pb=<?php echo $emb?>' iframe width='100%' height='265px' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'  style='border:0' allowfullscreen></iframe>
		<?php
		$fichero = '../estacion.php';
		$nuevo_fichero = '../../'.$archivo.'.php';
		if (!copy($fichero, $nuevo_fichero)) {echo "Error al crear $nuevo_fichero...\n";}
		echo '<script>window.location="../../4"</script>';
		} 
		else echo'<script type="text/javascript">
				  alert("El tipo de archivo no es permitido.");
				  window.location="../../4"
				</script>';// Si no es el tipo permitido
	} 
	else echo'<script type="text/javascript">
				  alert("El archivo supera el tamaño permitido.");
				  window.location="../../4"
				</script>';// Si supera el tamaño de permitido
}	
?>

