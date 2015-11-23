<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.css">
    <script src="bootstrap/bootstrap-dynamic-tabs/bootstrap-dynamic-tabs.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style>
        .tab-content > .tab-pane {
            display: block;
            height: 0;
            overflow-y: hidden;
        }

        .tab-content > .active {
            height: auto;
        }
        .nav-tabs > li, .nav-pills > li {
            float:none;
            display:inline-block;
        }

        .nav-pills{
            text-align:center;
        }
    </style>

</head>

<body>

<div class='row'>
    <div class='col-md-10 col-md-offset-1'>
        <!---- Tabs seleccion tipo grafico (temp, humedad, viento, etc. ---->
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="Graficos" class="nav nav-pills">
                <li class="active"><a href="#tab1" data-toggle="tab">Humedad</a></li>
                <li><a href="#tab2" data-toggle="pill">Presion</a></li>
                <li><a href="#tab3" data-toggle="pill">Temperatura</a></li>
                <li><a href="#tab4" data-toggle="pill">Viento</a></li>
                <li><a href="#tab5" data-toggle="pill">Radiacion</a></li>
                <li><a href="#tab6" data-toggle="pill">Precipitaciones</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div id="tab1" class="tab-pane fade in active">
                        <ul id="horaPresion" class="nav nav-pills">
                            <li class="active"><a href="#presion1" data-toggle="tab">1 Hora</a></li>
                            <li><a href="#presion2" data-toggle="pill">3 mediciones al dia</a></li>
                            <li><a href="#presion3" data-toggle="pill">1 dia</a></li>
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div id="presion1" class="tab-pane fade in active">
                                <div id="GraficoHumedad" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                            </div>
                            <div id="presion2" class="tab-pane fade">
                                <div id="GraficoPresion" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                            </div>
                            <div class="tab-pane fade" id="presion3">
                                <div id="GraficoTemperatura" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                            </div>
                        </div>
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
            </div>
        </div>
        <script>
            $("#Graficos").bootstrapDynamicTabs();
            $("#horaPresion").bootstrapDynamicTabs();
        </script>
    </div>
</div>

</body>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $('#tabs').tab();

    });
</script>

<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>
<script src="highcharts/export-csv.js"></script>

</html>