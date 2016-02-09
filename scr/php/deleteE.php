<?php
include_once "../conexion.php";
if($_GET){
	$id = $_REQUEST['id'];
	
	$sql1 = "select * from estacioneshab where id = $id";
	$result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));
	while($row = mysqli_fetch_array($result1)){
		$archivo = $row['estacion'];
		$cad = ucwords($archivo);
	}
	
	$sql = "DELETE FROM estacioneshab WHERE id = $id";

	if (mysqli_query($con, $sql)) {
		echo 'Record deleted successfully';
		echo '<script>window.location="../../4"</script>';
		$nombre_archivo = "../../".$archivo.".php";
		$nombre_foto = "../img/".$cad.".jpg";
		unlink("$nombre_archivo");
		unlink("$nombre_foto");
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
		echo '<script>window.location="../../4"</script>';
	}
}
?>