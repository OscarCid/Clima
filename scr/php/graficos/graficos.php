<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oscar
 * Date: 22/11/2015
 * Time: 21:41
 */
        include 'scr/php/graficos/consultas.php';
        $graficosYali = new graficos($porciones[2]);
    ?>
<!-- Grafico Temperatura 1 Hora -->
<script type="text/javascript">
    var f = new Date();
    setInterval(function () {
        $('#GraficoTemperatura').highcharts().reflow();
    }, 10);
    $(function () {
        $('#GraficoTemperatura').highcharts({
            title: {
                text: 'Temperatura Interior - Temperatura Exterior'
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
                    text: 'Celcius (°C)'
                },
                min: 0
            },

            series: [{
                name: 'Temperatura Interior',
                data: [
                    <?php
                        $graficosYali->unaHora("temp","si");
                    ?>
                ]
            },
                {
                    name: 'Temperatura Exterior',
                    data: [
                        <?php
                            $graficosYali->unaHora("tempInterior","si");
                        ?>
                    ]
                }]
        });
    });
</script>
<!-- Grafico Temperatura 8 Hora -->
<script type="text/javascript">
    var f = new Date();
    setInterval(function () {
        $('#GraficoTemperatura8horas').highcharts().reflow();
    }, 10);
    $(function () {
        $('#GraficoTemperatura8horas').highcharts({
            title: {
                text: 'Temperatura Interior - Temperatura Exterior'
            },
            subtitle: {
                text: 'Tendencia de las ultimos 7 Dias'
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
                    text: 'Celcius (°C)'
                },
                min: 0
            },

            series: [{
                name: 'Temperatura Exterior',
                data: [
                    <?php
                        $graficosYali->tresTomas("temp","si");
                    ?>
                ]
            },
                {
                    name: 'Temperatura Interior',
                    data: [
                        <?php
                            $graficosYali->tresTomas("tempInterior","si");
                        ?>
                    ]
                }]
        });
    });
</script>
<!-- Grafico Viento -->

<!-- Grafico Humedad  1 hora-->
<script type="text/javascript">
    setInterval(function () {
        $('#GraficoHumedad').highcharts().reflow();
    }, 10);
    $(function () {
        $('#GraficoHumedad').highcharts({
            title: {
                text: 'Humedad Interior - Humedad Exterior'
            },
            subtitle: {
                text: 'Tendencia de las ultimos 7 Dias'
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
                    text: 'Humedad ( % )'
                },
                min: 0
            },

            series: [{
                name: 'Humedad Exterior',
                data: [
                    <?php
                        $graficosYali->unaHora("humedad","no");
                    ?>
                ]
            },
                {
                    name: 'Humedad Interior',
                    data: [
                        <?php
                            $graficosYali->unaHora("humInterior","no");
                        ?>
                    ]
                }]
        });
    });
</script>
<!-- Grafico Humedad 8 horas -->
<script type="text/javascript">
    setInterval(function () {
        $('#GraficoHumedad8horas').highcharts().reflow();
    }, 10);
    $(function () {
        $('#GraficoHumedad8horas').highcharts({
            title: {
                text: 'Humedad Interior - Humedad Exterior'
            },
            subtitle: {
                text: 'Tendencia de las ultimos 7 Dias'
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
                    text: 'Humedad ( % )'
                },
                min: 0
            },

            series: [{
                name: 'Humedad Exterior',
                data: [
                    <?php
                        $graficosYali->tresTomas("humedad","no");
                    ?>
                ]
            },
                {
                    name: 'Humedad Interior',
                    data: [
                        <?php
                            $graficosYali->tresTomas("humInterior","no");
                        ?>
                    ]
                }]
        });
    });
</script>
<!-- Grafico Presion 1 Hora -->
<script type="text/javascript">
    setInterval(function () {
        $('#GraficoPresion').highcharts().reflow();
    }, 10);
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
                        $graficosYali->unaHora("presion","si")
                    ?>
                ]
            }]
        });
    });
</script>
<!-- Grafico Presion 8 Horas -->
<script type="text/javascript">
    setInterval(function () {
        $('#GraficoPresion8Horas').highcharts().reflow();
    }, 10);
    $(function () {
        $('#GraficoPresion8Horas').highcharts({
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
                        $graficosYali->tresTomas("presion","si")
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
                        $graficosYali->unaHora("rSolar","no")
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
