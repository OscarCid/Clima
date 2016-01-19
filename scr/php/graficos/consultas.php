<?php
class graficos
{
	private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $estacion = "";
    private $coneccion = "";
	private $base = "clima";

    public function __construct($estacion)
    {
        $this->estacion = $estacion;
        $this->coneccion = new mysqli($this->host, $this->user, $this->password, $this->base) or die ("<center>No se puede conectar con la base de datos\n</center>\n");
        if ($this->coneccion ->connect_errno)
        {
            echo "Fallo al conectar a MySQL: (" . $this->coneccion ->connect_errno . ") " . $this->coneccion ->connect_error;
        }
    }

    public function unaHora($grafico)
    {
        
                if ($this->estacion == "campana") {
                    $primero = "SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '%:50:00' ORDER BY fecha DESC, hora DESC LIMIT 12;";
                    $segundo = "SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '%:00:00' ORDER BY fecha DESC, hora DESC LIMIT 12;";
                    $tercero = "SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '%:10:00' ORDER BY fecha DESC, hora DESC LIMIT 12;";
                }
                else{
					$primero = "SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '%:55:00' ORDER BY fecha DESC, hora DESC LIMIT 12;";
					$segundo = "SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '%:00:00' ORDER BY fecha DESC, hora DESC LIMIT 12;";
					$tercero = "SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '%:05:00' ORDER BY fecha DESC, hora DESC LIMIT 12;";
				}


                $resultado1 = $this->coneccion -> query($primero) or trigger_error($this->coneccion ->error);
                $resultado2 = $this->coneccion -> query($segundo) or trigger_error($this->coneccion ->error);
                $resultado3 = $this->coneccion -> query($tercero) or trigger_error($this->coneccion ->error);
                while($fila1 = $resultado1 -> fetch_array() and $fila2 = $resultado2 -> fetch_array() and $fila3 = $resultado3 -> fetch_array())
                {
                    $hora = $fila2['hora'];
                    $fecha = $fila2['fecha'];
                    list($hora, $minuto, $segundos) = split('[/:.-]', $hora);
                    list($año, $mes, $dia) = split('[/:.-]', $fecha);
                    $mes=$mes-1;
                    $temperatura = (($fila1[$grafico])+($fila2[$grafico])+($fila3[$grafico]))/3;
                    $temperatura = number_format($temperatura, 2, '.', '');
                    echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$temperatura."],";
                }
               
        
    }

    public function tresTomas($grafico)
    {
        
                $cero1="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '23:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";
                $cero2="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '00:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";
                $cero3="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '01:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";
                $ocho1="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '07:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";
                $ocho2="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '08:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";
                $ocho3="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '09:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";
                $cuatro1="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '15:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";
                $cuatro2="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '16:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";
                $cuatro3="SELECT $grafico,hora,fecha,estacion FROM estacion where estacion='".$this->estacion."' AND hora like '17:00:00' ORDER BY fecha DESC, hora DESC LIMIT 7;";

        $resultado1 = $this->coneccion -> query($cero1) or trigger_error($this->coneccion ->error);
        $resultado2 = $this->coneccion -> query($cero2) or trigger_error($this->coneccion ->error);
        $resultado3 = $this->coneccion -> query($cero3) or trigger_error($this->coneccion ->error);
        $resultado4 = $this->coneccion -> query($ocho1) or trigger_error($this->coneccion ->error);
        $resultado5 = $this->coneccion -> query($ocho2) or trigger_error($this->coneccion ->error);
        $resultado6 = $this->coneccion -> query($ocho3) or trigger_error($this->coneccion ->error);
        $resultado7 = $this->coneccion -> query($cuatro1) or trigger_error($this->coneccion ->error);
        $resultado8 = $this->coneccion -> query($cuatro2) or trigger_error($this->coneccion ->error);
        $resultado9 = $this->coneccion -> query($cuatro3) or trigger_error($this->coneccion ->error);
        while($fila1 = $resultado1 -> fetch_array() and $fila2 = $resultado2 -> fetch_array() and $fila3 = $resultado3 -> fetch_array() and $fila4 = $resultado4 -> fetch_array() and $fila5 = $resultado5 -> fetch_array() and $fila6 = $resultado6 -> fetch_array() and $fila7 = $resultado7 -> fetch_array() and $fila8 = $resultado8 -> fetch_array() and $fila9 = $resultado9 -> fetch_array())
        {
            /*primer dato */
            $hora1 = $fila2['hora'];
            $fecha1 = $fila2['fecha'];
            list($hora1, $minuto1) = split('[/:.-]', $hora1);
            list($año1, $mes1, $dia1) = split('[/:.-]', $fecha1);
            $mes1=$mes1-1;
            
                $temperatura1 = (($fila1[$grafico])+($fila2[$grafico])+($fila3[$grafico]))/3;
            
            $temperatura1 = number_format($temperatura1, 2, '.', '');
            /*segundo dato */
            $hora2 = $fila5['hora'];
            $fecha2 = $fila5['fecha'];
            list($hora2, $minuto2) = split('[/:.-]', $hora2);
            list($año2, $mes2, $dia2) = split('[/:.-]', $fecha2);
            $mes2=$mes2-1;

                $temperatura2 = (($fila4[$grafico])+($fila5[$grafico])+($fila6[$grafico]))/3;
            
            $temperatura2 = number_format($temperatura2, 2, '.', '');
            /*tercer dato */
            $hora3 = $fila8['hora'];
            $fecha3 = $fila8['fecha'];
            list($hora3, $minuto3) = split('[/:.-]', $hora3);
            list($año3, $mes3, $dia3) = split('[/:.-]', $fecha3);
            $mes3=$mes3-1;

                $temperatura3 = (($fila7[$grafico])+($fila8[$grafico])+($fila9[$grafico]))/3;
            
            $temperatura3 = number_format($temperatura3, 2, '.', '');

            echo "[Date.UTC(".$año3.", ".$mes3.", ".$dia3.", ".$hora3.", ".$minuto3."), ".$temperatura3."],";
			echo "[Date.UTC(".$año2.", ".$mes2.", ".$dia2.", ".$hora2.", ".$minuto2."), ".$temperatura2."],";
			echo "[Date.UTC(".$año1.", ".$mes1.", ".$dia1.", ".$hora1.", ".$minuto1."), ".$temperatura1."],";

        }

    }
	
	public function anualPrec($grafico)
    {
		$ene="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-01-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$feb="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-02-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$mar="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-03-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$abr="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-04-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$may="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-05-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$jun="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-06-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$jul="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-07-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$ago="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-08-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$sep="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-09-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$oct="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-10-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$nov="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-11-%' AND $grafico NOT LIKE '0.0') AS tabla";
		$dic="SELECT SUM($grafico) AS precMensual FROM (SELECT DISTINCT(fecha), $grafico FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '%-12-%' AND $grafico NOT LIKE '0.0') AS tabla";
	
	    $resultado1 = $this->coneccion -> query($ene) or trigger_error($this->coneccion ->error);
        $resultado2 = $this->coneccion -> query($feb) or trigger_error($this->coneccion ->error);
        $resultado3 = $this->coneccion -> query($mar) or trigger_error($this->coneccion ->error);
        $resultado4 = $this->coneccion -> query($abr) or trigger_error($this->coneccion ->error);
        $resultado5 = $this->coneccion -> query($may) or trigger_error($this->coneccion ->error);
        $resultado6 = $this->coneccion -> query($jun) or trigger_error($this->coneccion ->error);
        $resultado7 = $this->coneccion -> query($jul) or trigger_error($this->coneccion ->error);
        $resultado8 = $this->coneccion -> query($ago) or trigger_error($this->coneccion ->error);
        $resultado9 = $this->coneccion -> query($sep) or trigger_error($this->coneccion ->error);
		$resultado10 = $this->coneccion -> query($oct) or trigger_error($this->coneccion ->error);
        $resultado11 = $this->coneccion -> query($nov) or trigger_error($this->coneccion ->error);
        $resultado12 = $this->coneccion -> query($dic) or trigger_error($this->coneccion ->error);
        
			$datoEne = 0;
			$datoFeb = 0;
			$datoMar = 0;
			$datoAbr = 0;
			$datoMay = 0;
			$datoJun = 0;
			$datoJul = 0;
			$datoAgo = 0;
			$datoSep = 0;
			$datoOct = 0;
			$datoNov = 0;
			$datoDic = 0;
			
		while($fila1 = $resultado1 -> fetch_array() and $fila2 = $resultado2 -> fetch_array() and $fila3 = $resultado3 -> fetch_array() and $fila4 = $resultado4 -> fetch_array() and $fila5 = $resultado5 -> fetch_array() and $fila6 = $resultado6 -> fetch_array() and $fila7 = $resultado7 -> fetch_array() and $fila8 = $resultado8 -> fetch_array() and $fila9 = $resultado9 -> fetch_array() and $fila10 = $resultado10 -> fetch_array() and $fila11 = $resultado11 -> fetch_array() and $fila12 = $resultado12 -> fetch_array())
        {
			$datoEne = $fila1['precMensual'];
			$datoFeb = $fila2['precMensual'];			
			$datoMar = $fila3['precMensual'];			
			$datoAbr = $fila4['precMensual'];			
			$datoMay = $fila5['precMensual'];			
			$datoJun = $fila6['precMensual'];			
			$datoJul = $fila7['precMensual'];			
			$datoAgo = $fila8['precMensual'];			
			$datoSep = $fila9['precMensual'];			
			$datoNov = $fila10['precMensual'];			
			$datoNov = $fila11['precMensual'];			
			$datoDic = $fila12['precMensual'];
		}
		
		echo $datoEne.", ".$datoFeb.", ".$datoMar.", ".$datoAbr.", ".$datoMay.", ".$datoJun.", ".$datoJul.", ".$datoAgo.", ".$datoSep.", ".$datoOct.", ".$datoNov.", ".$datoDic;
	}
	
	public function viento($grafico)
    {
		
		$sql="SELECT $grafico,direcViento FROM estacion WHERE estacion = '".$this->estacion."' AND hora LIKE '%00:00' ORDER BY fecha DESC, hora DESC limit 360";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);

		$array1[]=0;
		$array2[]=0;
		$array3[]=0;
		$array4[]=0;
		$array5[]=0;
		$array6[]=0;
		$array7[]=0;
		$array8[]=0;
		$array9[]=0;
		$array10[]=0;
		$array11[]=0;
		$array12[]=0;
		$array13[]=0;
		$array14[]=0;
		$array15[]=0;
		$array16[]=0;
		
		while($row = mysqli_fetch_array($resultado)) {
			$dviento = $row["direcViento"];
			switch (true) {
				case (($dviento >= 349.5 && $dviento <= 360) || ($dviento >= 0 && $dviento <= 10.5)): {
					$array1[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 10.5) && $dviento <= 33.5): {
					$array2[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 33.5) && $dviento <= 55.5): {
					$array3[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 55.5) && $dviento <= 78.5): {
					$array4[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 78.5) && $dviento <= 100.5): {
					$array5[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 100.5) && $dviento <= 123.5): {
					$array6[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 123.5) && $dviento <= 145.5): {
					$array7[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 145.5) && $dviento <= 168.5): {
					$array8[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 168.5) && $dviento <= 190.5): {
					$array9[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 190.5) && $dviento <= 213.5): {
					$array10[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 213.5) && $dviento <= 235.5): {
					$array11[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 235.5) && $dviento <= 258.5): {
					$array12[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 258.5) && $dviento <= 280.5): {
					$array13[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 280.5) && $dviento <= 303.5): {
					$array14[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 303.5) && $dviento <= 325.5): {
					$array15[]=$row['vPromedio'];
					break;
				}
			
				case (($dviento >= 325.5) && $dviento <= 349.5): {
					$array16[]=$row['vPromedio'];
					break;
				}
			}
		}

										function porcentaje($total, $parte, $redondear = 2) {
											return round($parte / $total * 100, $redondear);
										}
										$countN=count($array1)-1;
										$countNNE=count($array2)-1;
										$countNE=count($array3)-1;
										$countENE=count($array4)-1;
										$countE=count($array5)-1;
										$countESE=count($array6)-1;
										$countSE=count($array7)-1;
										$countSSE=count($array8)-1;
										$countS=count($array9)-1;
										$countSSO=count($array10)-1;
										$countSO=count($array11)-1;
										$countOSO=count($array12)-1;
										$countO=count($array13)-1;
										$countONO=count($array14)-1;
										$countNO=count($array15)-1;
										$countNNO=count($array16)-1;
										$total = $countN + $countNE + $countNNE + $countE + $countENE + $countESE + $countNNO + $countNO + $countO + $countONO + $countOSO + $countS + $countSE + $countSO + $countSSE + $countSSO;

										echo "	<tr nowrap>
													<td class='dir'>N</td>
													<td class='data'>".porcentaje($total, $countN, 2)."</td>
												</TR>
												<tr nowrap bgcolor='#DDDDDD'>
													<td class='dir'>NNE</td>
													<td class='data'>".porcentaje($total, $countNNE, 2)."</td>
												</TR>
												<tr nowrap>
													<td class='dir'>NE</td>
													<td class='data'>".porcentaje($total, $countNE, 2)."</td>
												</TR>
												<tr nowrap  bgcolor='#DDDDDD'>
													<td class='dir'>ENE</td>
													<td class='data'>".porcentaje($total, $countENE, 2)."</td>
												</TR>
												<tr nowrap>
													<td class='dir'>E</td>
													<td class='data'>".porcentaje($total, $countE, 2)."</td>
												</TR>
												<tr nowrap bgcolor='#DDDDDD'>
													<td class='dir'>ESE</td>
													<td class='data'>".porcentaje($total, $countESE, 2)."</td>
												</TR>
												<tr nowrap>
													<td class='dir'>SE</td>
													<td class='data'>".porcentaje($total, $countSE, 2)."</td>
												</TR>
												<tr nowrap bgcolor='#DDDDDD'>
													<td class='dir'>SSE</td>
													<td class='data'>".porcentaje($total, $countSSE, 2)."</td>
												</TR>
												<tr nowrap>
													<td class='dir'>S</td>
													<td class='data'>".porcentaje($total, $countS, 2)."</td>
												</TR>
												<tr nowrap bgcolor='#DDDDDD'>
													<td class='dir'>SSO</td>
													<td class='data'>".porcentaje($total, $countSSO, 2)."</td>
												</TR>
												<tr nowrap>
													<td class='dir'>SO</td>
													<td class='data'>".porcentaje($total, $countSO, 2)."</td>
												</TR>
												<tr nowrap bgcolor='#DDDDDD'>
													<td class='dir'>OSO</td>
													<td class='data'>".porcentaje($total, $countOSO, 2)."</td>
												</TR>
												<tr nowrap>
													<td class='dir'>O</td>
													<td class='data'>".porcentaje($total, $countO, 2)."</td>
												</TR>
												<tr nowrap bgcolor='#DDDDDD'>
													<td class='dir'>ONO</td>
													<td class='data'>".porcentaje($total, $countONO, 2)."</td>
												</TR>
												<tr nowrap>
													<td class='dir'>NO</td>
													<td class='data'>".porcentaje($total, $countNO, 2)."</td>
												</TR>
												<tr nowrap  bgcolor='#DDDDDD'>
													<td class='dir'>NNO</td>
													<td class='data'>".porcentaje($total, $countNNO, 2)."</td>
												</tr>
												<tr nowrap>
													<td class='dir'>Frecuencia (%)</td>
													<td class='data'>$total</td>
												</TR>";
	}
	
	
	
    public function json()
    {
        $consulta="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' ORDER BY fecha DESC, hora DESC LIMIT 1";
        $resultado = $this->coneccion -> query($consulta) or trigger_error($this->coneccion ->error);

        while($row = $resultado -> fetch_array() )
        {
            $json_output[] = $row;
        }
        print(json_encode($json_output));
    }

    function __destruct()
    {
        mysqli_close($this->coneccion);
    }
}
