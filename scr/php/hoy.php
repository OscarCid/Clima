<?php  
$dato = new datos($estacion);

$datoTotal = new datos($estacion);

$datoPrec = new datos($estacion);

$datoVDViento = new datos($estacion);

$dato->DiaHoy();

$datoTotal->maxminDia($dato->ano,$dato->mes,$dato->dia);

$datoPrec->diaSeco('precHoy',$dato->ano,$dato->mes,$dato->dia);
$datoPrec->diaLluvioso('precHoy',$dato->ano,$dato->mes,$dato->dia);

$datoVDViento->datoDom('dVientoActual',$dato->ano,$dato->mes,$dato->dia);
 
   echo "
<div class='row' style='padding-top:10px'>
    
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
                                                                <td>".$datoTotal->maxDatoTemp." °C</td>
																<td>a las ".$datoTotal->maxDatoHoraTemp."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Exterior</strong></td>
                                                                <td>".$datoTotal->minDatoTemp." °C</td> 
																<td>a las ".$datoTotal->minDatoHoraTemp."</td>
                                                            </tr>
															<tr>
																<td><strong>Rango de Temperatura</strong></td>
                                                                <td>".($datoTotal->maxDatoTemp - $datoTotal->minDatoTemp)." °C</td> 
																<td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Sensacion Termica</strong></td>
                                                                <td>".$datoTotal->maxDatoSen." °C</td>
																<td>a las ".$datoTotal->maxDatoHoraSen."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Sensacion Termica</strong></td>
                                                                <td>".$datoTotal->minDatoSen." °C </td>
																<td>a las ".$datoTotal->minDatoHoraSen."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Maximo Punto de Rocío</strong></td>
                                                                <td>".$datoTotal->maxDatoRocio." °C</td>
																<td>a las ".$datoTotal->maxDatoHoraRocio."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minimo Punto de Rocío</strong></td>
                                                                <td>".$datoTotal->minDatoRocio." °C </td>
																<td>a las ".$datoTotal->minDatoHoraRocio."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Maxima Humedad Exterior</strong></td>
                                                                <td>".$datoTotal->maxDatoHum." % </td>
																<td>a las ".$datoTotal->maxDatoHoraHum."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Minima Humedad Exterior</strong></td>
                                                                <td>".$datoTotal->minDatoHum." % </td>
																<td>a las ".$datoTotal->minDatoHoraHum."</td>
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
                                                                <td>".$datoTotal->maxDatoPrec." mm</td>
																<td></td>
                                                            </tr>
                                                            <tr>
																<td><strong>Ritmo Maximo</strong></td>
                                                                <td>".$datoTotal->maxDatoPrecA." mm/hr</td> 
																<td>a las ".$datoTotal->maxDatoHoraPrecA."</td>
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
                                                                <td>".$datoTotal->maxDatoViR." kts</td>
																<td>a las ".$datoTotal->maxDatoHoraViR."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Maxima Intencidad del Viento</strong></td>
                                                                <td>".$datoTotal->maxDatoVi." kts</td> 
																<td>a las ".$datoTotal->maxDatoHoraVi."</td>
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
                                                                <td>".$datoTotal->maxDatoPres." hPa</td>
																<td>a las ".$datoTotal->maxDatoHoraPres."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Presión Minima</strong></td>
                                                                <td>".$datoTotal->minDatoPres." hPa</td> 
																<td>a las ".$datoTotal->minDatoHoraPres."</td>
                                                            </tr>
															<tr>
																<td><strong>Radiación Solar Maxima</strong></td>
                                                                <td>".$datoTotal->maxDatoRSol." W/m²</td> 
																<td>a las ".$datoTotal->maxDatoHoraRSol."</td>
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

";

?>