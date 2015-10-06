
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Highcharts Example</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">
        ${demo.css}
    </style>
    <?php include 'scr/conexion.php';?>
    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Velocidad Viento Rafaga vs Velocidad Viento Medio'
                },
                subtitle: {
                    text: 'Comparacion'
                },
                xAxis: {
                    title: {
                        text: 'Hora'
                    },
                    categories: [<?php
                        $dbname="test";
                            $tablename="septiembre";

         $query="SELECT * FROM (SELECT * FROM $tablename where hora like '%:00' ORDER BY id DESC LIMIT 12) AS TempTable ORDER BY TempTable.id ASC;";
                            $result=mysql_db_query ($dbname, $query, $link);
                            while ($row = mysql_fetch_array ($result))
                                { echo "'".$row['hora']."', ";}

                            ?>]
                },
                yAxis: {
                    title: {
                        text: 'Kts (Nudos)'
                    },
                    labels: {
                        formatter: function () {
                            return this.value;
                        }
                    },
                    min: 0
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Velocidad Viento (Medio)',
                    marker: {
                        symbol: 'square'
                    },
                    data: [<?php
                        $dbname="test";
                            $tablename="septiembre";
                            $query="SELECT * FROM (SELECT * FROM $tablename where hora like '%:00' ORDER BY id DESC LIMIT 12) AS TempTable ORDER BY TempTable.id ASC;";
                            $result=mysql_db_query ($dbname, $query, $link);
                            while ($row = mysql_fetch_array ($result))
                                { echo $row['vMedio'].".".$row['vMedioDec'].", ";}
                            ?>
                    ]

                }, {
                    name: 'Velocidad Viento (Rafaga)',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: [<?php
                        $dbname="test";
                            $tablename="septiembre";
                            $query="SELECT * FROM (SELECT * FROM $tablename where hora like '%:00' ORDER BY id DESC LIMIT 12) AS TempTable ORDER BY TempTable.id ASC;";
                            $result=mysql_db_query ($dbname, $query, $link);
                            while ($row = mysql_fetch_array ($result))
                                { echo $row['vRafaga'].".".$row['vRafagaDec'].", ";}
                            ?>]
                }]
            });
        });
    </script>
</head>
<body>
<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

</body>
</html>