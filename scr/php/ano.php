<?php
$datoAn = new datos($estacion);

$datoTAn = new datos($estacion);

$datoPrecAn = new datos($estacion);

$datoVDVientoAn = new datos($estacion);

$datoAn->DiaHoy();

$datoTAn->maxminDia($datoAn->ano,'%','%');

$datoPrecAn->diaSeco('precHoy',$datoAn->ano,'%','%');
$datoPrecAn->diaLluvioso('precHoy',$datoAn->ano,'%','%');

$datoVDVientoAn->datoDom('dVientoActual',$datoAn->ano,'%','%');
 
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
                                                                <td>".$datoTAn->maxDatoTemp." °C</td>
																<td>a las ".$datoTAn->maxDatoHoraTemp." el ".$datoTAn->maxDatoDiaTemp."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Exterior</strong></td>
                                                                <td>".$datoTAn->minDatoTemp." °C</td> 
																<td>a las ".$datoTAn->minDatoHoraTemp." el ".$datoTAn->minDatoDiaTemp."</td>
                                                            </tr>
															<tr>
																<td><strong>Rango de Temperatura</strong></td>
                                                                <td>".($datoTAn->maxDatoTemp - $datoTAn->minDatoTemp)." °C</td> 
																<td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Sensacion Termica</strong></td>
                                                                <td>".$datoTAn->maxDatoSen." °C</td>
																<td>a las ".$datoTAn->maxDatoHoraSen." el ".$datoTAn->maxDatoDiaSen."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Sensacion Termica</strong></td>
                                                                <td>".$datoTAn->minDatoSen." °C </td>
																<td>a las ".$datoTAn->minDatoHoraSen." el ".$datoTAn->minDatoDiaSen."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Maximo Punto de Rocío</strong></td>
                                                                <td>".$datoTAn->maxDatoRocio." °C</td>
																<td>a las ".$datoTAn->maxDatoHoraRocio." el ".$datoTAn->maxDatoDiaRocio."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minimo Punto de Rocío</strong></td>
                                                                <td>".$datoTAn->minDatoRocio." °C </td>
																<td>a las ".$datoTAn->minDatoHoraRocio." el ".$datoTAn->minDatoDiaRocio."</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Humedad Exterior</strong></td>
                                                                <td>".$datoTAn->maxDatoHum." % </td>
																<td>a las ".$datoTAn->maxDatoHoraHum." el ".$datoTMes->maxDatoDiaHum."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Minima Humedad Exterior</strong></td>
                                                                <td>".$datoTAn->minDatoHum." % </td>
																<td>a las ".$datoTAn->minDatoHoraHum." el ".$datoTMes->minDatoDiaHum."</td>
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
                                                                <td width='50%'><strong>Maxima Precipitación</strong></td>
                                                                <td>".$datoTAn->maxDatoPrec." mm</td>
																<td> el ".$datoTAn->maxDatoDiaPrec."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Ritmo Maximo</strong></td>
                                                                <td>".$datoTAn->maxDatoPrecA." mm/hr</td> 
																<td>a las ".$datoTAn->maxDatoHoraPrecA." el ".$datoTAn->maxDatoDiaPrecA."</td>
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
                                                                <td>".$datoTAn->maxDatoViR." kts</td>
																<td>a las ".$datoTAn->maxDatoHoraViR." el ".$datoTAn->maxDatoDiaViR."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Maxima Intencidad del Viento</strong></td>
                                                                <td>".$datoTAn->maxDatoVi." kts</td> 
																<td>a las ".$datoTAn->maxDatoHoraVi." el ".$datoTAn->maxDatoDiaVi."</td>
                                                            </tr>
															<tr>
																<td><strong>Dirección del Viento Dominante</strong></td>
                                                                <td>".$datoVDVientoAn->datoDomV."° ".$datoVDVientoAn->letra."</td> 
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
                                                                <td>".$datoTAn->maxDatoPres." hPa</td>
																<td>a las ".$datoTAn->maxDatoHoraPres." el ".$datoTAn->maxDatoDiaPres."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Presión Minima</strong></td>
                                                                <td>".$datoTAn->minDatoPres." hPa</td> 
																<td>a las ".$datoTAn->minDatoHoraPres." el ".$datoTAn->minDatoDiaPres."</td>
                                                            </tr>
															<tr>
																<td><strong>Radiación Solar Maxima</strong></td>
                                                                <td>".$datoTAn->maxDatoRSol." W/m²</td> 
																<td>a las ".$datoTAn->maxDatoHoraRSol." el ".$datoTAn->maxDatoDiaRSol."</td>
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