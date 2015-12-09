
<?php include 'scr/php/graficos/graficos.php'; ?>

<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/highcharts-more.js"></script>
<script src="highcharts/js/modules/data.js"></script>

<div class='row'>
    <div class='col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-xs-12 col-sm-12'>
        <div class="container">
            <!-- <div class="tabbable" role="tabpanel" data-example-id="togglable-tabs"> -->
            <div class="centered-pills" id="pill">
                <ul class="nav nav-pills navbar-inner" id="prueba">
                    <li class="active"><a href="#temperatura" data-toggle="pill">Temperatura</a></li>
                    <li><a href="#presion" data-toggle="pill">Presión</a></li>
                    <li><a href="#humedad" data-toggle="pill">Humedad</a></li>
					<li><a href="#radSolar" data-toggle="pill">Radiación Solar</a></li>
					<li><a href="#prec" data-toggle="pill">Precipitación</a></li>
                    <li><a href="#viento" data-toggle="pill">Dirección Viento</a></li>
                </ul>
            </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="temperatura">
                        <div class="span8">
                            <div class="tabbable">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#temperatura1" data-toggle="pill">Cada 1 Hora</a></li>
                                    <li><a href="#temperatura2" data-toggle="pill">Cada 8 Horas</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="temperatura1">
                                        <div id="GraficoTemperatura" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="temperatura2">
                                        <div id="GraficoTemperatura8horas" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="presion">
                        <div class="span8">
                            <div class="tabbable">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#presion1" data-toggle="pill">Cada 1 Hora</a></li>
                                    <li><a href="#presion2" data-toggle="pill">Cada 8 Horas</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="presion1">
                                        <div id="GraficoPresion" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="presion2">
                                        <div id="GraficoPresion8Horas" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
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
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="humedad1">
                                        <div id="GraficoHumedad" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="humedad2">
                                        <div id="GraficoHumedad8horas" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="tab-pane" id="radSolar">
                        <div class="span8">
                            <div class="tabbable">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#radSolar1" data-toggle="pill">Cada 1 Hora</a></li>
                                    <li><a href="#radSolar2" data-toggle="pill">Cada 8 Horas</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="radSolar1">
                                        <div id="GraficoRadiacion" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    <div class="tab-pane" id="radSolar2">
                                        <div id="GraficoRadiacion8horas" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="tab-pane" id="prec">
                        <div class="span8">
                            
                                    <div class="tab-pane fade in active" id="prec1">
                                        <div id="GraficoPrecipitacion" style="min-width: 300px; height: 500px; margin: 0 auto"></div>
                                    </div>
                                    
                             
                        </div>
                    </div>
					
                    <div class="tab-pane" id="viento">
                        <div class="span8">


                                    <div class="tab-pane fade in active">


										

										<div id="GraficoViento" style="min-width: 300px; height: 500px; margin: 0 auto">
										</div>

										<div style="display:none">
											<table id="freq" border="0" cellspacing="0" cellpadding="0">
												<tr nowrap bgcolor="#CCCCFF">
													<th colspan="9" class="hdr">Tabla de Frecuencia (%)</th>
												</tr>
												<tr nowrap bgcolor="#CCCCFF">
													<th class="freq">Dirección</th>
													<th class="freq">Frecuencia (%)</th>
												</tr>
										<?php

										$graficosYali->viento("vPromedio");
										
										?>

											</table>
										</div>



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