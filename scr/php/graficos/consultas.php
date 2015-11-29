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
                    list($dia, $mes, $año) = split('[/:.-]', $fecha);
                    $mes=$mes-1;
                    $año="20".$año;
                    $temperatura = (($fila1[$grafico].".".$fila1[$grafico."Dec"])+($fila2[$grafico].".".$fila2[$grafico."Dec"])+($fila3[$grafico].".".$fila3[$grafico."Dec"]))/3;
                    $temperatura = number_format($temperatura, 2, '.', '');
                    echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$temperatura."],";
                }
                break;
            }
            case "no":
            {
                $graficoDec=$grafico."Dec";
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
                    list($dia, $mes, $año) = split('[/:.-]', $fecha);
                    $mes=$mes-1;
                    $año="20".$año;
                    $temperatura = (($fila1[$grafico])+($fila2[$grafico])+($fila3[$grafico]))/3;
                    $temperatura = number_format($temperatura, 2, '.', '');
                    echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$temperatura."],";
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
            list($dia1, $mes1, $año1) = split('[/:.-]', $fecha1);
            $mes1=$mes1-1;
            $año1="20".$año1;
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
            list($dia2, $mes2, $año2) = split('[/:.-]', $fecha2);
            $mes2=$mes2-1;
            $año2="20".$año2;
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
            list($dia3, $mes3, $año3) = split('[/:.-]', $fecha3);
            $mes3=$mes3-1;
            $año3="20".$año3;
            if($decimal == "si")
            {
                $temperatura3 = (($fila7[$grafico].".".$fila7[$grafico."Dec"])+($fila8[$grafico].".".$fila8[$grafico."Dec"])+($fila9[$grafico].".".$fila9[$grafico."Dec"]))/3;
            }
            else
            {
                $temperatura3 = (($fila7[$grafico])+($fila8[$grafico])+($fila9[$grafico]))/3;
            }
            $temperatura3 = number_format($temperatura3, 2, '.', '');

            echo "[Date.UTC(".$año1.", ".$mes1.", ".$dia1.", ".$hora1.", ".$minuto1."), ".$temperatura1."],";
            echo "[Date.UTC(".$año2.", ".$mes2.", ".$dia2.", ".$hora2.", ".$minuto2."), ".$temperatura2."],";
            echo "[Date.UTC(".$año3.", ".$mes3.", ".$dia3.", ".$hora3.", ".$minuto3."), ".$temperatura3."],";

        }

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
