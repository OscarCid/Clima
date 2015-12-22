<div class='row'>
    <div class='col-md-12 col-lg-12 col-xs-12 col-sm-12'>
        <div class="container">
           
            <div class="centered-pills" id="pill">
                <ul class="nav nav-tabs navbar-inner" id="datos">
                    <li class="active"><a href="#hoyD" data-toggle="pill">Hoy</a></li>
                    <li><a href="#ayerD" data-toggle="pill">Ayer</a></li>
                    <li><a href="#mesD" data-toggle="pill">Este Mes</a></li>
					<li><a href="#anioD" data-toggle="pill">Este Año</a></li>
                </ul>
            </div>
		
	
				<div class="tab-content">
                    <div class="tab-pane active" id="hoyD">
                        <div class="span8">
<?php
$estacion = $porciones[2];

include "scr/php/consultaMD.php";

    echo "
<div class='row' style='padding-top:10px'>
    <div class='col-md-12'>
    <!-- Primer Panel Temperatura-->
            <div class='col-md-12 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Temperatura y Humedad</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-striped table-hover table-condensed table-responsive'>
                                                
                                                            <tbody>
                                                            <tr>
                                                                <td width='50%'><strong>Temperatura Maxima Exterior</strong></td>
                                                                <td>".$datoTemp->maxDato." °C</td>
																<td>a las ".$datoTemp->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Exterior</strong></td>
                                                                <td>".$datoTemp->minDato." °C</td> 
																<td>a las ".$datoTemp->minDatoHora."</td>
                                                            </tr>
															<tr>
																<td><strong>Rango de Temperatura</strong></td>
                                                                <td>".($datoTemp->maxDato - $datoTemp->minDato)." °C</td> 
																<td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Sensacion Termica</strong></td>
                                                                <td>".$datoSen->maxDato." °C</td>
																<td>a las ".$datoSen->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Sensacion Termica</strong></td>
                                                                <td>".$datoSen->minDato." °C </td>
																<td>a las ".$datoSen->minDatoHora."</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Humedad Exterior</strong></td>
                                                                <td>".$datoHum->maxDato." % </td>
																<td>a las ".$datoHum->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Humedad Exterior</strong></td>
                                                                <td>".$datoHum->minDato." % </td>
																<td>a las ".$datoHum->minDatoHora."</td>
                                                            </tr>
															<tr>
                                                                <td width='50%'><strong>Temperatura Maxima Interior</strong></td>
                                                                <td>".$datoTempI->maxDato." °C</td>
																<td>a las ".$datoTempI->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Interior</strong></td>
                                                                <td>".$datoTempI->minDato." °C</td>
																<td>a las ".$datoTempI->minDatoHora."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Maxima Humedad Interior</strong></td>
                                                                <td>".$datoHumI->maxDato." % </td>
																<td>a las ".$datoHumI->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Humedad Interior</strong></td>
                                                                <td>".$datoHumI->minDato." % </td>
																<td>a las ".$datoHumI->minDatoHora."</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                  
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
            </div>
			
			<div class='col-md-12 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Precipitación</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-striped table-hover table-condensed table-responsive'>
                                                
                                                            <tbody>
                                                            <tr>
                                                                <td width='50%'><strong>Precipitación Hoy</strong></td>
                                                                <td>".$datoPrec->maxDato." mm</td>
																<td></td>
                                                            </tr>
                                                            <tr>
																<td><strong>Ritmo Maximo</strong></td>
                                                                <td>".$datoRitPrec->maxDato." mm/hr</td> 
																<td>a las ".$datoRitPrec->maxDatoHora."</td>
                                                            </tr>
															<tr>
																<td><strong>Dias desde el último día seco</strong></td>
                                                                <td>".$datoPrec->diaSecoDato."</td> 
																<td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Días desde la última lluvia</strong></td>
                                                                <td>".$datoPrec->diaLluviaDato."</td>
																<td></td>
                                                            </tr>
                                                            
                                                            </tbody>
                                                        </table>
                                                  
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
            </div>
			
			<div class='col-md-12 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Viento y fuerza</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-striped table-hover table-condensed table-responsive'>
                                                
                                                            <tbody>
                                                            <tr>
                                                                <td width='50%'><strong>Maxima Rafaga de Viento</strong></td>
                                                                <td>".$datoVRafaga->maxDato." kts</td>
																<td>a las ".$datoVRafaga->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Maxima Intencidad del Viento</strong></td>
                                                                <td>".$datoViento->maxDato." kts</td> 
																<td>a las ".$datoViento->maxDatoHora."</td>
                                                            </tr>
															<tr>
																<td><strong>Dirección del Viento Dominante</strong></td>
                                                                <td>".$datoVDViento->datoDomV."° ".$datoVDViento->letra."</td> 
																<td></td>
                                                            </tr>
                                                            
                                                            
                                                            </tbody>
                                                        </table>
                                                  
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
            </div>
			
			<div class='col-md-12 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Presión</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-striped table-hover table-condensed table-responsive'>
                                                
                                                            <tbody>
                                                            <tr>
                                                                <td width='50%'><strong>Presión Maxima</strong></td>
                                                                <td>".$datoPresion->maxDato." hPa</td>
																<td>a las ".$datoPresion->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Presión Minima</strong></td>
                                                                <td>".$datoPresion->minDato." hPa</td> 
																<td>a las ".$datoPresion->minDatoHora."</td>
                                                            </tr>
															<tr>
																<td><strong>Radiación Solar Maxima</strong></td>
                                                                <td>".$datoRad->maxDato." W/m²</td> 
																<td>a las ".$datoRad->maxDatoHora."</td>
                                                            </tr>
														  
                                                            </tbody>
                                                        </table>
                                                  
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
            </div>
 
    </div>
</div>

";

?>
	</div>
</div>		
			
					<div class="tab-pane" id="ayerD">
                        <div class="span8">
<?php

echo "
<div class='row' style='padding-top:10px'>
    <div class='col-md-12'>
    <!-- Primer Panel Temperatura-->
            <div class='col-md-12 col-xs-12'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title'>Temperatura y Humedad</h3>
                                                </div>
                                                <div class='panel-body'>
                                                <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='bs-example' data-example-id='bordered-table'>
                                                        <table class='table table-striped table-hover table-condensed table-responsive'>
                                                
                                                            <tbody>
                                                            <tr>
                                                                <td width='50%'><strong>Temperatura Maxima Exterior</strong></td>
                                                                <td>".$datoTempA->maxDato." °C</td>
																<td>a las ".$datoTempA->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Exterior</strong></td>
                                                                <td>".$datoTempA->minDato." °C</td> 
																<td>a las ".$datoTempA->minDatoHora."</td>
                                                            </tr>
															<tr>
																<td><strong>Rango de Temperatura</strong></td>
                                                                <td>".($datoTempA->maxDato - $datoTempA->minDato)." °C</td> 
																<td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Sensacion Termica</strong></td>
                                                                <td>".$datoSenA->maxDato." °C</td>
																<td>a las ".$datoSenA->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Sensacion Termica</strong></td>
                                                                <td>".$datoSenA->minDato." °C </td>
																<td>a las ".$datoSenA->minDatoHora."</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Humedad Exterior</strong></td>
                                                                <td>".$datoHumA->maxDato." % </td>
																<td>a las ".$datoHumA->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Humedad Exterior</strong></td>
                                                                <td>".$datoHumA->minDato." % </td>
																<td>a las ".$datoHumA->minDatoHora."</td>
                                                            </tr>
															<tr>
                                                                <td width='50%'><strong>Temperatura Maxima Interior</strong></td>
                                                                <td>".$datoTempIA->maxDato." °C</td>
																<td>a las ".$datoTempIA->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Interior</strong></td>
                                                                <td>".$datoTempIA->minDato." °C</td>
																<td>a las ".$datoTempIA->minDatoHora."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Maxima Humedad Interior</strong></td>
                                                                <td>".$datoHumIA->maxDato." % </td>
																<td>a las ".$datoHumIA->maxDatoHora."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Humedad Interior</strong></td>
                                                                <td>".$datoHumIA->minDato." % </td>
																<td>a las ".$datoHumIA->minDatoHora."</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                  
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
            </div>
			
			
 
    </div>
</div>

";

?>
                        </div>
                    </div>
			
		</div>
	</div>
</div>