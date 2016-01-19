<?php
$datoM = new datos($estacion);

$datoTMes = new datos($estacion);

$datoPrecM = new datos($estacion);

$datoVDVientoM = new datos($estacion);

$datoM->DiaHoy();

$datoTMes->maxminDia($datoM->ano,$datoM->mes,'%');

$datoPrecM->diaSeco('precHoy',$datoM->ano,$datoM->mes,$datoM->dia);
$datoPrecM->diaLluvioso('precHoy',$datoM->ano,$datoM->mes,$datoM->dia);

$datoVDVientoM->datoDom('dVientoActual',$datoM->ano,$datoM->mes,$datoM->dia);
 
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
                                                                <td>".$datoTMes->maxDatoTemp." °C</td>
																<td>a las ".$datoTMes->maxDatoHoraTemp." el ".$datoTMes->maxDatoDiaTemp."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Exterior</strong></td>
                                                                <td>".$datoTMes->minDatoTemp." °C</td> 
																<td>a las ".$datoTMes->minDatoHoraTemp." el ".$datoTMes->minDatoDiaTemp."</td>
                                                            </tr>
															<tr>
																<td><strong>Rango de Temperatura</strong></td>
                                                                <td>".($datoTMes->maxDatoTemp - $datoTMes->minDatoTemp)." °C</td> 
																<td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Sensacion Termica</strong></td>
                                                                <td>".$datoTMes->maxDatoSen." °C</td>
																<td>a las ".$datoTMes->maxDatoHoraSen." el ".$datoTMes->maxDatoDiaSen."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Sensacion Termica</strong></td>
                                                                <td>".$datoTMes->minDatoSen." °C </td>
																<td>a las ".$datoTMes->minDatoHoraSen." el ".$datoTMes->minDatoDiaSen."</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Maxima Humedad Exterior</strong></td>
                                                                <td>".$datoTMes->maxDatoHum." % </td>
																<td>a las ".$datoTMes->maxDatoHoraHum." el ".$datoTMes->maxDatoDiaHum."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Humedad Exterior</strong></td>
                                                                <td>".$datoTMes->minDatoHum." % </td>
																<td>a las ".$datoTMes->minDatoHoraHum." el ".$datoTMes->minDatoDiaHum."</td>
                                                            </tr>
															<tr>
                                                                <td width='50%'><strong>Temperatura Maxima Interior</strong></td>
                                                                <td>".$datoTMes->maxDatoTempI." °C</td>
																<td>a las ".$datoTMes->maxDatoHoraTempI." el ".$datoTMes->maxDatoDiaTempI."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Temperatura Minima Interior</strong></td>
                                                                <td>".$datoTMes->minDatoTempI." °C</td>
																<td>a las ".$datoTMes->minDatoHoraTempI." el ".$datoTMes->minDatoDiaTempI."</td>
                                                            </tr>
															<tr>
                                                                <td><strong>Maxima Humedad Interior</strong></td>
                                                                <td>".$datoTMes->maxDatoHumI." % </td>
																<td>a las ".$datoTMes->maxDatoHoraHumI." el ".$datoTMes->maxDatoDiaHumI."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Minima Humedad Interior</strong></td>
                                                                <td>".$datoTMes->minDatoHumI." % </td>
																<td>a las ".$datoTMes->minDatoHoraHumI." el ".$datoTMes->minDatoDiaHumI."</td>
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
                                                                <td>".$datoTMes->maxDatoPrec." mm</td>
																<td> el ".$datoTMes->maxDatoDiaPrec."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Ritmo Maximo</strong></td>
                                                                <td>".$datoTMes->maxDatoPrecA." mm/hr</td> 
																<td>a las ".$datoTMes->maxDatoHoraPrecA." el ".$datoTMes->maxDatoDiaPrecA."</td>
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
                                                                <td>".$datoTMes->maxDatoViR." kts</td>
																<td>a las ".$datoTMes->maxDatoHoraViR." el ".$datoTMes->maxDatoDiaViR."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Maxima Intencidad del Viento</strong></td>
                                                                <td>".$datoTMes->maxDatoVi." kts</td> 
																<td>a las ".$datoTMes->maxDatoHoraVi." el ".$datoTMes->maxDatoDiaVi."</td>
                                                            </tr>
															<tr>
																<td><strong>Dirección del Viento Dominante</strong></td>
                                                                <td>".$datoVDVientoM->datoDomV."° ".$datoVDViento->letra."</td> 
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
                                                                <td>".$datoTMes->maxDatoPres." hPa</td>
																<td>a las ".$datoTMes->maxDatoHoraPres." el ".$datoTMes->maxDatoDiaPres."</td>
                                                            </tr>
                                                            <tr>
																<td><strong>Presión Minima</strong></td>
                                                                <td>".$datoTMes->minDatoPres." hPa</td> 
																<td>a las ".$datoTMes->minDatoHoraPres." el ".$datoTMes->minDatoDiaPres."</td>
                                                            </tr>
															<tr>
																<td><strong>Radiación Solar Maxima</strong></td>
                                                                <td>".$datoTMes->maxDatoRSol." W/m²</td> 
																<td>a las ".$datoTMes->maxDatoHoraRSol." el ".$datoTMes->maxDatoDiaRSol."</td>
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