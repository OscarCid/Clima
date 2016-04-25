<?php
class graficos
{
    private $host = "sistema.meteorologiaupla.cl";
    private $user = "meteorol_clima";
    private $password = "5@pW(f_E]ExF";
    private $estacion = "";
    private $coneccion = "";
	private $base = "meteorol_clima";

    public function __construct()
    {
        $this->coneccion = new mysqli($this->host, $this->user, $this->password, $this->base) or die ("<center>No se puede conectar con la base de datos\n</center>\n");
        if ($this->coneccion ->connect_errno)
        {
            echo "Fallo al conectar a MySQL: (" . $this->coneccion ->connect_errno . ") " . $this->coneccion ->connect_error;
        }
    }

    function excel($estacion, $anio)
    {
        $consulta="SELECT * FROM estacion WHERE estacion = '".$estacion."' AND fecha like '".$anio."-%' ORDER BY fecha DESC, hora DESC";
        $resultado = $this->coneccion -> query($consulta) or trigger_error($this->coneccion ->error);

        while($row = $resultado -> fetch_array() )
        {
            echo '
            <tr>
                <td>'.$row['fecha'].'</td>
                <td>'.$row['hora'].'</td>
                <td>'.$row['estacion'].'</td>
                <td>'.$row['temp'].'</td>
                <td>'.$row['humedad'].'</td>
                <td>'.$row['pRocio'].'</td>
                <td>'.$row['vPromedio'].'</td>
                <td>'.$row['vRafaga'].'</td>
                <td>'.$row['direcViento'].'</td>
                <td>'.$row['precActual'].'</td>
                <td>'.$row['precHoy'].'</td>
                <td>'.$row['presion'].'</td>
                <td>'.$row['precTotal'].'</td>
                <td>'.$row['tempInterior'].'</td>
                <td>'.$row['humInterior'].'</td>
                <td>'.$row['uViento'].'</td>
                <td>'.$row['senTermica'].'</td>
                <td>'.$row['indHumidex'].'</td>
            </tr>
            ';
        }
    }

    function __destruct()
    {
        mysqli_close($this->coneccion);
    }
}
