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
<?php include 'scr/php/graficos/graficos.php'; ?>
<body>

<div class='row'>
    <div class='col-md-10 col-md-offset-1'>
        <div class="container">
            <div class="tabbable" role="tabpanel" data-example-id="togglable-tabs">
                <ul class="nav nav-pills" id="prueba">
                    <li class="active"><a href="#temperatura" data-toggle="tab">Temperatura</a></li>
                    <li><a href="#presion" data-toggle="tab">Presion</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="temperatura">
                        <div class="span8">
                            <div class="tabbable">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#temperatura1" data-toggle="tab">Cada 1 Hora</a></li>
                                    <li><a href="#temperatura2" data-toggle="tab">Cada 3 Horas</a></li>
                                    <li><a href="#temperatura3" data-toggle="tab">Cada 1 Dia</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="temperatura1">
                                        <div id="GraficoTemperatura" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="temperatura2">
                                        <p>I'm in Section 4.</p>
                                    </div>
                                    <div class="tab-pane" id="temperatura3">
                                        <p>I'm in Section 4.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="presion">
                        <div class="span8">
                            <div class="tabbable">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#tab3" data-toggle="tab">Section 3</a></li>
                                    <li><a href="#tab4" data-toggle="tab">Section 4</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab3">
                                        <div id="GraficoHumedad" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <p>I'm in Section 4.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#prueba").bootstrapDynamicTabs();
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