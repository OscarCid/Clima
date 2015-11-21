<!DOCTYPE html>
<html >
<head>
    <title>Estación El Peral - Meteorologia UPLA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="scr/js/actualizarIndex.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<?php $actual_link = "$_SERVER[REQUEST_URI]";
$porciones = explode("/", $actual_link);
?>

<body onload="actualizarIndex('<?php echo $porciones[2]; ?>'); setInterval(actualizarIndex.bind(null,'<?php echo $porciones[2]; ?>'),2000)">
<div class="container-fluid">
    <?php
    $pag=$porciones[2];
    include ("scr/php/menu.php");
    include ("scr/php/banner.php"); ?>
    <!-- Div que muestra los datos de scr/php/datosIndex.php -->
    <!-- Tu no tienes alma -->
    <div id="txtHint"></div>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</div>
<?php include ("scr/php/foot.php")?>
</body>
</html>