<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="scr/js/actualizarIndex.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body onload="actualizarIndex(); setInterval('actualizarIndex()',2000)">
<div class="container-fluid">
<?php
$pag="yali";
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

