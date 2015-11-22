<?php
class graficos
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $estacion = "";
    private $grafico = "";
    private $coneccion = "";

    public function __construct($estacion)
    {
        $this->estacion = $estacion;
        $this->coneccion = new mysqli($this->host, $this->user, $this->password, "clima") or die ("<center>No se puede conectar con la base de datos\n</center>\n");
        if ($this->coneccion ->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->coneccion ->connect_errno . ") " . $this->coneccion ->connect_error;
        }
    }
    public function unaHora($grafico, $decimal)
    {
        $this->grafico = $grafico;
        $primero="SELECT * FROM (SELECT * FROM $this->estacion where hora like '%:55' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
        $segundo="SELECT * FROM (SELECT * FROM $this->estacion where hora like '%:00' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
        $tercero="SELECT * FROM (SELECT * FROM $this->estacion where hora like '%:05' ORDER BY ordenar DESC LIMIT 12) AS TempTable ORDER BY TempTable.ordenar ASC;";
        $resultado1 = $this->coneccion -> query($primero) or trigger_error($this->coneccion ->error);
        $resultado2 = $this->coneccion -> query($segundo) or trigger_error($this->coneccion ->error);
        $resultado3 = $this->coneccion -> query($tercero) or trigger_error($this->coneccion ->error);

        switch ($decimal)
        {
            case "si":
            {
                while($fila1 = $resultado1 -> fetch_array() and $fila2 = $resultado2 -> fetch_array() and $fila3 = $resultado3 -> fetch_array())
                {
                    $hora = $fila2['hora'];
                    $fecha = $fila2['fecha'];
                    list($hora, $minuto) = split('[/:.-]', $hora);
                    list($dia, $mes, $año) = split('[/:.-]', $fecha);
                    $mes=$mes-1;
                    $temperatura = (($fila1[$grafico].".".$fila1[$grafico."Dec"])+($fila2[$grafico].".".$fila2[$grafico."Dec"])+($fila3[$grafico].".".$fila3[$grafico."Dec"]))/3;
                    $temperatura = number_format($temperatura, 1, '.', '');
                    echo "[Date.UTC(".$año.", ".$mes.", ".$dia.", ".$hora.", ".$minuto."), ".$temperatura."],";

                }
                break;
            }
            case "no":
            {
                while($fila1 = $resultado1 -> fetch_array() and $fila2 = $resultado2 -> fetch_array() and $fila3 = $resultado3 -> fetch_array())
                {
                    $presion = (($fila1["presion"].".".$fila1["presionDec"])+($fila2["presion"].".".$fila2["presionDec"])+($fila3["presion"].".".$fila3["presionDec"]))/3;
                    $presion = number_format($presion, 2, '.', '');
                    echo "Título: " . $fila2["hora"] . "";
                    echo "Contenido: " . $fila2["fecha"] . "";
                    echo "Humedad: " . $presion . "<hr>";
                }
                break;
            }
        }
    }
}