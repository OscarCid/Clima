<?php
include_once "scr/conexion.php";
$sql1="ALTER TABLE estacioneshab ADD afiliado VARCHAR( 50 ) after creacion";
$result1 = mysqli_query($con,$sql1)or die("Error en: " .  mysqli_error($con));
?>