
    <?php include 'scr/php/graficos/graficos.php'; ?>
    <style>
        .navbar .nav,
        .navbar .nav > li {
            float:none;
            display:inline-block;
            *display:inline; /* ie7 fix */
            *zoom:1; /* hasLayout ie7 trigger */
            vertical-align: top;
        }

        .navbar-inner {
            text-align:center;
        }
    </style>


<div class='row'>
    <div class='col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-xs-12'>
        <div class="container">
            <!-- <div class="tabbable" role="tabpanel" data-example-id="togglable-tabs"> -->
            <div class="centered-pills" id="pill">
                <ul class="nav nav-pills navbar-inner" id="prueba">
                    <li class="active"><a href="#temperatura" data-toggle="pill">Temperatura</a></li>
                    <li><a href="#presion" data-toggle="pill">Presión</a></li>
                    <li><a href="#humedad" data-toggle="pill">Humedad</a></li>
                </ul>
            </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="temperatura">
                        <div class="span8">
                            <div class="tabbable">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#temperatura1" data-toggle="pill">Cada 1 Hora</a></li>
                                    <li><a href="#temperatura2" data-toggle="pill">Cada 8 Horas</a></li>
                                    <li><a href="#temperatura3" data-toggle="pill">Cada 1 Dia</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="temperatura1">
                                        <div id="GraficoTemperatura" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="temperatura2">
                                        <div id="GraficoTemperatura8horas" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
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
                                        <div id="GraficoPresion" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <p>I'm in Section 4.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="humedad">
                        <div class="span8">
                            <div class="tabbable">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#humedad1" data-toggle="pill">Cada 1 Hora</a></li>
                                    <li><a href="#humedad2" data-toggle="pill">Cada 8 Horas</a></li>
                                    <li><a href="#humedad3" data-toggle="pill">Cada 1 Dia</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="humedad1">
                                        <div id="GraficoHumedad" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="humedad2">
                                        <div id="GraficoHumedad8horas" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="humedad3">
                                        <p>I'm in Section 4.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            <script>
                $("#prueba").bootstrapDynamicTabs();
            </script>
        </div>
    </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $('#tabs').tab();

    });
</script>