<?php
include_once "../conexion.php";
if($_GET){
	$id = $_REQUEST['id'];

	$sql = "DELETE FROM usuarios WHERE id = $id";

	if (mysqli_query($con, $sql)) {
		echo 'Record deleted successfully
		<script>window.location="../../4"</script>';
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
		echo '<script>window.location="../../4"</script>';
	}
}
?>