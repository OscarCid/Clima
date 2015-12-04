<?php
class graficos
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $estacion = "";
    private $coneccion = "";

    public function __construct($estacion)
    {
        $this->estacion = $estacion;
        $this->coneccion = new mysqli($this->host, $this->user, $this->password, "clima") or die ("<center>No se puede conectar con la base de datos\n</center>\n");
        if ($this->coneccion ->connect_errno)
        {
            echo "Fallo al conectar a MySQL: (" . $this->coneccion ->connect_errno . ") " . $this->coneccion ->connect_error;
        }
    }

    public function unaHora($grafico, $decimal)
    {
        switch ($decimal)
        {
            case "si":
            {
                $graficoDec=$grafico."Dec";
                if ($this->estacion == "campana")
                {
                    $primero="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '%:50' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                    $segundo="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '%:00' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                    $tercero="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '%:10' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                }
                else
                {
                    $primero = "SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '%:55' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                    $segundo = "SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '%:00' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                    $tercero = "SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '%:05' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                }
                $resultado1 = $this->coneccion -> query($primero) or trigger_error($this->coneccion ->error);
                $resultado2 = $this->coneccion -> query($segundo) or trigger_error($this->coneccion ->error);
                $resultado3 = $this->coneccion -> query($tercero) or trigger_error($this->coneccion ->error);
                while($fila1 = $resultado1 -> fetch_array() and $fila2 = $resultado2 -> fetch_array() and $fila3 = $resultado3 -> fetch_array())
                {
                    $hora = $fila2['hora'];
                    $fecha = $fila2['fecha'];
                    list($hora, $minuto) = split('[/:.-]', $hora);
                    list($dia, $mes, $a�o) = split('[/:.-]', $fecha);
                    $mes=$mes-1;
                    $a�o="20".$a�o;
                    $temperatura = (($fila1[$grafico].".".$fila1[$grafico."Dec"])+($fila2[$grafico].".".$fila2[$grafico."Dec"])+($fila3[$grafico].".".$fila3[$grafico."Dec"]))/3;
                    $temperatura = number_format($temperatura, 2, '.', '');
                    echo "[Date.UTC(".$a�o.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$temperatura."],";
                }
                break;
            }
            case "no":
            {
                if ($this->estacion == "campana") {
                    $primero = "SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '%:50' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                    $segundo = "SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '%:00' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                    $tercero = "SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '%:10' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                }
                else{
                    $primero = "SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '%:55' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                    $segundo = "SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '%:00' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                    $tercero = "SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '%:05' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
                }


                $resultado1 = $this->coneccion -> query($primero) or trigger_error($this->coneccion ->error);
                $resultado2 = $this->coneccion -> query($segundo) or trigger_error($this->coneccion ->error);
                $resultado3 = $this->coneccion -> query($tercero) or trigger_error($this->coneccion ->error);
                while($fila1 = $resultado1 -> fetch_array() and $fila2 = $resultado2 -> fetch_array() and $fila3 = $resultado3 -> fetch_array())
                {
                    $hora = $fila2['hora'];
                    $fecha = $fila2['fecha'];
                    list($hora, $minuto) = split('[/:.-]', $hora);
                    list($dia, $mes, $a�o) = split('[/:.-]', $fecha);
                    $mes=$mes-1;
                    $a�o="20".$a�o;
                    $temperatura = (($fila1[$grafico])+($fila2[$grafico])+($fila3[$grafico]))/3;
                    $temperatura = number_format($temperatura, 2, '.', '');
                    echo "[Date.UTC(".$a�o.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$temperatura."],";
                }
                break;
            }
        }
    }

    public function tresTomas($grafico, $decimal)
    {
        $graficoDec=$grafico."Dec";
        switch ($decimal)
        {
            case "si":
            {
                $cero1="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '23:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cero2="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '00:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cero3="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '01:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $ocho1="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '07:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $ocho2="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '08:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $ocho3="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '09:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cuatro1="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '15:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cuatro2="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '16:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cuatro3="SELECT * FROM (SELECT $grafico,$graficoDec,hora,fecha,ordenar FROM $this->estacion where hora like '17:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
            }
            break;
            case "no":
            {
                $cero1="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '23:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cero2="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '00:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cero3="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '01:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $ocho1="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '07:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $ocho2="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '08:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $ocho3="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '09:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cuatro1="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '15:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cuatro2="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '16:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
                $cuatro3="SELECT * FROM (SELECT $grafico,hora,fecha,ordenar FROM $this->estacion where hora like '17:00' ORDER BY ordenar DESC LIMIT 7) AS TempTable ORDER BY TempTable.ordenar ASC;";
            }
            break;
        }
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
            list($dia1, $mes1, $a�o1) = split('[/:.-]', $fecha1);
            $mes1=$mes1-1;
            $a�o1="20".$a�o1;
            if($decimal == "si")
            {
                $temperatura1 = (($fila1[$grafico] . "." . $fila1[$grafico . "Dec"]) + ($fila2[$grafico] . "." . $fila2[$grafico . "Dec"]) + ($fila3[$grafico] . "." . $fila3[$grafico . "Dec"])) / 3;
            }
            else
            {
                $temperatura1 = (($fila1[$grafico])+($fila2[$grafico])+($fila3[$grafico]))/3;
            }
            $temperatura1 = number_format($temperatura1, 2, '.', '');
            /*segundo dato */
            $hora2 = $fila5['hora'];
            $fecha2 = $fila5['fecha'];
            list($hora2, $minuto2) = split('[/:.-]', $hora2);
            list($dia2, $mes2, $a�o2) = split('[/:.-]', $fecha2);
            $mes2=$mes2-1;
            $a�o2="20".$a�o2;
            if($decimal == "si")
            {
                $temperatura2 = (($fila4[$grafico].".".$fila4[$grafico."Dec"])+($fila5[$grafico].".".$fila5[$grafico."Dec"])+($fila6[$grafico].".".$fila6[$grafico."Dec"]))/3;
            }
            else
            {
                $temperatura2 = (($fila4[$grafico])+($fila5[$grafico])+($fila6[$grafico]))/3;
            }
            $temperatura2 = number_format($temperatura2, 2, '.', '');
            /*tercer dato */
            $hora3 = $fila8['hora'];
            $fecha3 = $fila8['fecha'];
            list($hora3, $minuto3) = split('[/:.-]', $hora3);
            list($dia3, $mes3, $a�o3) = split('[/:.-]', $fecha3);
            $mes3=$mes3-1;
            $a�o3="20".$a�o3;
            if($decimal == "si")
            {
                $temperatura3 = (($fila7[$grafico].".".$fila7[$grafico."Dec"])+($fila8[$grafico].".".$fila8[$grafico."Dec"])+($fila9[$grafico].".".$fila9[$grafico."Dec"]))/3;
            }
            else
            {
                $temperatura3 = (($fila7[$grafico])+($fila8[$grafico])+($fila9[$grafico]))/3;
            }
            $temperatura3 = number_format($temperatura3, 2, '.', '');

            echo "[Date.UTC(".$a�o1.", ".$mes1.", ".$dia1.", ".$hora1.", ".$minuto1."), ".$temperatura1."],";
            echo "[Date.UTC(".$a�o2.", ".$mes2.", ".$dia2.", ".$hora2.", ".$minuto2."), ".$temperatura2."],";
            echo "[Date.UTC(".$a�o3.", ".$mes3.", ".$dia3.", ".$hora3.", ".$minuto3."), ".$temperatura3."],";

        }

    }
	
	public function viento($grafico)
    {
		$graficoDec=$grafico."Dec";
		$sql="SELECT $grafico,$graficoDec,direcViento FROM $this->estacion WHERE hora LIKE '%00' ORDER BY ordenar DESC limit 360";
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
					$array1[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 10.5) && $dviento <= 33.5): {
					$array2[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 33.5) && $dviento <= 55.5): {
					$array3[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 55.5) && $dviento <= 78.5): {
					$array4[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 78.5) && $dviento <= 100.5): {
					$array5[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 100.5) && $dviento <= 123.5): {
					$array6[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 123.5) && $dviento <= 145.5): {
					$array7[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 145.5) && $dviento <= 168.5): {
					$array8[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 168.5) && $dviento <= 190.5): {
					$array9[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 190.5) && $dviento <= 213.5): {
					$array10[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 213.5) && $dviento <= 235.5): {
					$array11[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 235.5) && $dviento <= 258.5): {
					$array12[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 258.5) && $dviento <= 280.5): {
					$array13[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 280.5) && $dviento <= 303.5): {
					$array14[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 303.5) && $dviento <= 325.5): {
					$array15[]=$row['intViento'].'.'.$row['intVientoDec'];
					break;
				}
			}
			switch (true) {
				case (($dviento >= 325.5) && $dviento <= 349.5): {
					$array16[]=$row['intViento'].'.'.$row['intVientoDec'];
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
        $consulta="SELECT * FROM $this->estacion ORDER BY ordenar DESC LIMIT 1";
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
