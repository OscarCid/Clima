<html>
<head>
    <title>Highcharts Tutorial</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <?php include 'scr/conexion.php';?>
    <script>
        $(function () {
            $('#container').highcharts({
                title: {
                    text: 'Presion'
                },
                xAxis: {
                    title: {
                        enabled: true,
                        text: 'Horas'
                    },
                    type: 'datetime',

                    dateTimeLabelFormats : {
                        hour: '%I %p',
                        minute: '%I:%M %p'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Presion (hPa)'
                    }
                },
/*
                tooltip: {
                    formatter: function() {
                        return ''+
                            "" +
                            'Time: '+ Highcharts.dateFormat('%I:%M %p', this.x);
                    }
                },
*/
                series: [{
                    name: 'Presion',
                    data: [
                        <?php
                            $dbname="test";
                            $tablename="septiembre";

                            $query="SELECT * FROM (SELECT * FROM $tablename  ORDER BY id DESC LIMIT 145) AS TempTable ORDER BY TempTable.id ASC;";
                            $result=mysql_db_query ($dbname, $query, $link);
                            while ($row = mysql_fetch_array ($result))
                            {
                            $hora = $row['hora'];
                            $fecha = $row['fecha'];
                            list($hora, $minuto) = split('[/:.-]', $hora);
                            list($dia, $mes, $año) = split('[/:.-]', $fecha);
                            $mes=$mes-1;

                            echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$row['presion'].".".$row['presionDec']."],";
                            }
                        ?>
                    ]
                }]
            });
        });
    </script>
</head>
<body>
<div id="container" style="width: 700px; height: 400px; margin: 0 auto"></div>

</body>
</html>