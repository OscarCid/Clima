<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php include 'scr/conexion.php';?>
    <!-- Grafico Temperatura -->
    <script type="text/javascript">
        var f = new Date();
        $(function () {
            $('#GraficoTemperatura').highcharts({
                title: {
                    text: 'Temperatura - Punto de rocio'
                },
                subtitle: {
                    text: 'Tendencia de las ultimas 12 horas'
                },
                exporting: {
                    buttons: {
                        contextButton: {
                            symbol: 'url(scr/img/save.gif)'
                        }
                    }
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
                        text: 'Nudoss (Kts)'
                    },
                    min: 0
                },

                series: [{
                    name: 'Temperatura',
                    data: [
                        <?php
                        include 'scr/consulta 12horas.php';
                            while ($row = mysql_fetch_array ($result))
                            {
                            $hora = $row['hora'];
                            $fecha = $row['fecha'];
                            list($hora, $minuto) = split('[/:.-]', $hora);
                            list($dia, $mes, $año) = split('[/:.-]', $fecha);
                            $mes=$mes-1;

                            echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$row['temp'].".".$row['tempDec']."],";
                            }
                        ?>
                    ]
                },
                    {
                        name: 'Punto de Rocio',
                        data: [
                            <?php
                            include 'scr/consulta 12horas.php';
                                while ($row = mysql_fetch_array ($result))
                                {
                                $hora = $row['hora'];
                                $fecha = $row['fecha'];
                                list($hora, $minuto) = split('[/:.-]', $hora);
                                list($dia, $mes, $año) = split('[/:.-]', $fecha);
                                $mes=$mes-1;

                                echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$row['pRocio'].".".$row['pRocioDec']."],";
                                }
                            ?>
                        ]
                    }]
            });
        });
    </script>

    <!-- Grafico Viento -->
    <script type="text/javascript">
        $(function () {
            $('#GraficoViento').highcharts({
                title: {
                    text: 'Velocidad Viento'
                },
                subtitle: {
                    text: 'Tendencia de las ultimas 12 horas'
                },
                exporting: {
                    buttons: {
                        contextButton: {
                            symbol: 'url(scr/img/save.gif)'
                        }
                    }
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
                        text: 'Nudoss (Kts)'
                    },
                    min: 0
                },

                series: [{
                    name: 'Velocidad Media',
                    data: [
                        <?php
                            include 'scr/consulta 12horas.php';
                            while ($row = mysql_fetch_array ($result))
                            {
                            $hora = $row['hora'];
                            $fecha = $row['fecha'];
                            list($hora, $minuto) = split('[/:.-]', $hora);
                            list($dia, $mes, $año) = split('[/:.-]', $fecha);
                            $mes=$mes-1;

                            echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$row['vMedio'].".".$row['vMedioDec']."],";
                            }
                        ?>
                    ]
                },
                    {
                        name: 'Velocidad Rafaga',
                        data: [
                            <?php
                                include 'scr/consulta 12horas.php';
                                while ($row = mysql_fetch_array ($result))
                                {
                                $hora = $row['hora'];
                                $fecha = $row['fecha'];
                                list($hora, $minuto) = split('[/:.-]', $hora);
                                list($dia, $mes, $año) = split('[/:.-]', $fecha);
                                $mes=$mes-1;

                                echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$row['vRafaga'].".".$row['vRafagaDec']."],";
                                }
                            ?>
                        ]
                    }]
            });
        });
    </script>
    <!-- Grafico Humedad -->
    <script type="text/javascript">
        $(function () {
            $('#GraficoHumedad').highcharts({
                title: {
                    text: 'Humedad'
                },
                subtitle: {
                    text: 'Tendencia de las ultimas 12 horas'
                },
                exporting: {
                    buttons: {
                        contextButton: {
                            symbol: 'url(scr/img/save.gif)'
                        }
                    }
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
                        text: 'Humedad (%)'
                    }
                },

                series: [{
                    name: 'Humedad',
                    data: [
                        <?php
                            include 'scr/consulta 12horas.php';
                            while ($row = mysql_fetch_array ($result))
                            {
                            $hora = $row['hora'];
                            $fecha = $row['fecha'];
                            list($hora, $minuto) = split('[/:.-]', $hora);
                            list($dia, $mes, $año) = split('[/:.-]', $fecha);
                            $mes=$mes-1;

                            echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$row['humedad']."],";
                            }
                        ?>
                    ]
                }]
            });
        });
    </script>
    <!-- Grafico Presion -->
    <script type="text/javascript">
        $(function () {
            $('#GraficoPresion').highcharts({
                title: {
                    text: 'Presion'
                },
                subtitle: {
                    text: 'Tendencia de las ultimas 12 horas'
                },
                exporting: {
                    buttons: {
                        contextButton: {
                            symbol: 'url(scr/img/save.gif)'
                        }
                    }
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

                series: [{
                    name: 'Presion',
                    data: [
                        <?php
                            include 'scr/consulta 12horas.php';
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
    <!-- grafico Radiacion solar -->
    <script type="text/javascript">
        // Data retrieved from http://vikjavev.no/ver/index.php?spenn=2d&sluttid=16.06.2015.
        $(function () {
            $('#GraficoRadiacion').highcharts({
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Radiacion Solar'
                },
                subtitle: {
                    text: 'Tendencia de las ultimas 12 horas'
                },
                exporting: {
                    buttons: {
                        contextButton: {
                            symbol: 'url(scr/img/save.gif)'
                        }
                    }
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
                        text: 'Potencia (W/m^2)'
                    },
                    min: 0,
                    minorGridLineWidth: 0,
                    gridLineWidth: 0,
                    alternateGridColor: null,
                    plotBands: [{ // Bajo
                        from: 0,
                        to: 83.4,
                        color: 'rgba(142, 233, 55, 0.2)',
                        label: {
                            text: 'Bajo',
                            style: {
                                color: '#606060'
                            }
                        }
                    }, { // Light breeze
                        from: 83.5,
                        to: 166,
                        color: 'rgba(251, 255, 55, 0.2)',
                        label: {
                            text: 'Medio',
                            style: {
                                color: '#606060'
                            }
                        }
                    }, { // Gentle breeze
                        from: 167,
                        to: 221,
                        color: 'rgba(255, 158, 6, 0.2)',
                        label: {
                            text: 'Alto',
                            style: {
                                color: '#606060'
                            }
                        }
                    }, { // Moderate breeze
                        from: 222,
                        to: 305,
                        color: 'rgba(255, 47, 6, 0.2)',
                        label: {
                            text: 'Muy Alto',
                            style: {
                                color: '#606060'
                            }
                        }
                    }, { // Fresh breeze
                        from: 306,
                        to: 10000,
                        color: 'rgba(179, 0, 255, 0.2)',
                        label: {
                            text: 'Extremo',
                            style: {
                                color: '#606060'
                            }
                        }
                    }]
                },
                series: [{
                    name: 'Radiacion',
                    data: [
                        <?php
                            include 'scr/consulta 12horas.php';
                            while ($row = mysql_fetch_array ($result))
                            {
                            $hora = $row['hora'];
                            $fecha = $row['fecha'];
                            list($hora, $minuto) = split('[/:.-]', $hora);
                            list($dia, $mes, $año) = split('[/:.-]', $fecha);
                            $mes=$mes-1;

                            echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$row['rSolar']."],";
                            }
                        ?>
                    ]
                }],
                navigation: {
                    menuItemStyle: {
                        fontSize: '10px'
                    }
                }
            });
        });
    </script>
    <style>
        .tab-content > .tab-pane {
            display: block;
            height: 0;
            overflow-y: hidden;
        }

        .tab-content > .active {
            height: auto;
        }
    </style>

</head>

<body>

<div class='row'>
    <div class='col-md-8 col-md-offset-2'>
        <!-------->
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="Graficos" class="nav nav-pills">
                <li class="active"><a href="#tab1" data-toggle="tab">Humedad</a></li>
                <li><a href="#tab2" data-toggle="pill">Presion</a></li>
                <li><a href="#tab3" data-toggle="pill">Temperatura</a></li>
                <li><a href="#tab4" data-toggle="pill">Viento</a></li>
                <li><a href="#tab5" data-toggle="pill">Radiacion</a></li>
                <li><a href="#tab6" data-toggle="pill">Ubicacion</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div id="tab1" class="tab-pane fade in active">
                    <div id="GraficoHumedad" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                </div>
                <div id="tab2" class="tab-pane fade">
                    <div id="GraficoPresion" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                </div>
                <div class="tab-pane fade" id="tab3">
                    <div id="GraficoTemperatura" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                </div>
                <div class="tab-pane fade" id="tab4">
                    <div id="GraficoViento" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                </div>
                <div class="tab-pane fade" id="tab5">
                    <div id="GraficoRadiacion" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                </div>
                <div class="tab-pane fade" id="tab6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13269.836758480427!2d-71.6968742!3d-33.7487981!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDQ0JzU2LjAiUyA3McKwNDInMDAuMCJX!5e0!3m2!1ses-419!2scl!4v1443649161129"
                            iframe width="100%" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  style="border:0" allowfullscreen></iframe>
                    <br>


                </div>
            </div>
        </div>
        <script>
            $("#Graficos").bootstrapDynamicTabs();
        </script>
    </div>
</div>

</body>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $('#tabs').tab();

    });
</script>

<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>
<script src="highcharts/export-csv.js"></script>

</html>