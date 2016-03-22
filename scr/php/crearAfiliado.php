<?php
include_once "../conexion.php";
//Hacer post del archivo anterior
if($_POST){
	$nombre = $_POST['afiliado'];
	$enunciado = $_POST['enunciado'];
	$link = $_POST['link'];
	//Sacar el embed del iframe
	//Guardar imagen en la carpeta img
	$tamano = $_FILES [ 'file' ][ 'size' ]; // Leemos el tamaño del fichero 
	$tamaño_max="50000000000000000"; // Tamaño maximo permitido 
	$nombre_archivo = $_FILES [ 'file' ][ 'name' ];
	if( $tamano <= $tamaño_max){ // Comprobamos el tamaño  
		$destino = '../img/' ; // Carpeta donde se guardata 
		$sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/ 
		$tipo=$sep[1]; // Obtenemos el tipo de imagen que es 
		if($tipo == "gif" || $tipo == "pjpeg" || $tipo == "bmp" || $tipo == "jpg" || $tipo == "jpeg" || $tipo == "png"){ 
			move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$nombre_archivo); 
		
		//Insertar a la tabla afiliado
			$sql="INSERT INTO afiliado (afiliado, enunciado, imagen, link) VALUES ('".$nombre."', '".$enunciado."', '".$nombre_archivo."', '".$link."')";
			$result = mysqli_query($con,$sql)or die("Error en: " .  mysqli_error($con));
			echo '<script>window.location="../../4"</script>';
		}	else {
			echo'<script type="text/javascript">
				  alert("El tipo de archivo no es permitido.");
				  window.location="../../4"
				</script>';// Si no es el tipo permitido
				}
	} else {
		echo'<script type="text/javascript">
				  alert("El archivo supera el tamaño permitido.");
				  window.location="../../4"
				</script>';// Si supera el tamaño de permitido
			}
}	
?>

