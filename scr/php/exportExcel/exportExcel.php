<?php
// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");

// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=estacion.xls");

// Add data table
include 'db.php';
$excel = new graficos();
echo'
<table border="1">
    <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Estacion</th>
        <th>Temperatura Exterior</th>
        <th>Humedad Exterior</th>
        <th>Punto de Rocio</th>
        <th>Velocidad Viento Promedio</th>
        <th>Velocidad Viento Rafaga</th>
        <th>Direccion del Viento</th>
        <th>Precitipacion Actual</th>
        <th>Precipiracion Hoy</th>
        <th>Presion Atmosferica</th>
        <th>Precipitacion Total</th>
        <th>Temperatura Interior</th>
        <th>Humedad Interior</th>
        <th>Ultimo Viento Detectado</th>
        <th>Wind Chill</th>
        <th>Heat Index</th>
    </tr>
    ';
    $excel->excel("campana");
echo '</table>';
?>