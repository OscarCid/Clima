<?php
$datoA = new datos ($estacion);

$datoTotalA = new datos($estacion);

$datoPrecA = new datos($estacion);

$datoVDVientoA = new datos($estacion);

$datoA->DiaAyer();

$datoTotalA->maxminDia($datoA->ano,$datoA->mes,$datoA->dia);

$datoPrecA->diaSeco('precHoy',$datoA->ano,$datoA->mes,$datoA->dia);
$datoPrecA->diaLluvioso('precHoy',$dato->ano,$datoA->mes,$datoA->dia);

$datoVDVientoA->datoDom('dVientoActual',$datoA->ano,$datoA->mes,$datoA->dia);
 
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
                                                                <td>".$datoTotalA->maxDatoTemp." °C</td>
																<td>a las ".$datoTotalA->maxDatoHoraTemp."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Exterior</strong></td>
                                                                <td>".$datoTotalA->minDatoTemp." °C</td> 
																<td>a las ".$datoTotalA->minDatoHoraTemp."</td>
                                                            </tr>
															<tr>
																<td><strong>Rango de Temperatura</strong></td>
                                                                <td>".($datoTotalA->maxDatoTemp - $datoTotalA->minDatoTemp)." °C</td> 
																<td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Sensacion Termica</strong></td>
                                                                <td>".$datoTotalA->maxDatoSen." °C</td>
																<td>a las ".$datoTotalA->maxDatoHoraSen."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Sensacion Termica</strong></td>
                                                                <td>".$datoTotalA->minDatoSen." °C </td>
																<td>a las ".$datoTotalA->minDatoHoraSen."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Maximo Punto de Rocío</strong></td>
                                                                <td>".$datoTotalA->maxDatoRocio." °C</td>
																<td>a las ".$datoTotalA->maxDatoHoraRocio."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minimo Punto de Rocío</strong></td>
                                                                <td>".$datoTotalA->minDatoRocio." °C </td>
																<td>a las ".$datoTotalA->minDatoHoraRocio."</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Humedad Exterior</strong></td>
                                                                <td>".$datoTotalA->maxDatoHum." % </td>
																<td>a las ".$datoTotalA->maxDatoHoraHum."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Minima Humedad Exterior</strong></td>
                                                                <td>".$datoTotalA->minDatoHum." % </td>
																<td>a las ".$datoTotalA->minDatoHoraHum."</td>
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
                                                                <td>".$datoTotalA->maxDatoPrec." mm</td>
																<td></td>
                                                            </tr>
                                                            <tr>
																<td><strong>Ritmo Maximo</strong></td>
                                                                <td>".$datoTotalA->maxDatoPrecA." mm/hr</td> 
																<td>a las ".$datoTotalA->maxDatoHoraPrecA."</td>
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
                                                                <td>".$datoTotalA->maxDatoViR." kts</td>
																<td>a las ".$datoTotalA->maxDatoHoraViR."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Maxima Intencidad del Viento</strong></td>
                                                                <td>".$datoTotalA->maxDatoVi." kts</td> 
																<td>a las ".$datoTotalA->maxDatoHoraVi."</td>
                                                            </tr>
															<tr>
																<td><strong>Dirección del Viento Dominante</strong></td>
                                                                <td>".$datoVDVientoA->datoDomV."° ".$datoVDVientoA->letra."</td> 
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
                                                                <td>".$datoTotalA->maxDatoPres." hPa</td>
																<td>a las ".$datoTotalA->maxDatoHoraPres."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Presión Minima</strong></td>
                                                                <td>".$datoTotalA->minDatoPres." hPa</td> 
																<td>a las ".$datoTotalA->minDatoHoraPres."</td>
                                                            </tr>
															<tr>
																<td><strong>Radiación Solar Maxima</strong></td>
                                                                <td>".$datoTotalA->maxDatoRSol." W/m²</td> 
																<td>a las ".$datoTotalA->maxDatoHoraRSol."</td>
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