
    <?php include 'scr/php/graficos/graficos.php'; ?>
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


<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $('#tabs').tab();

    });
</script>