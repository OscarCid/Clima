<?php
class datos
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
	
	public function DiaHoy()
    {
		$sql="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' ORDER BY fecha DESC, hora DESC LIMIT 1;";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado)) {
			$Fecha = $row["fecha"];
			list( $this->ano, $this->mes, $this->dia  ) = split( '[/.-]', $Fecha);
		}
	}
	
	public function DiaAyer()
    {
		$sql="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' ORDER BY fecha DESC, hora DESC LIMIT 1;";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado)) {
			$Fecha = $row["fecha"];
			list( $this->ano, $this->mes, $dia  ) = split( '[/.-]', $Fecha);
			$this->dia = $dia-1;
		}
	}
	
	
	public function minDia($dato,$ano,$mes,$dia)
    {		
		$sql="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  ".$dato." = (SELECT MIN(".$dato.") FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado)) {
			$this->minDato = $row[$dato];
			$this->minDatoHora = date("H:i", strtotime($row['hora']));
		}
	}
	
	public function maxDia($dato,$ano,$mes,$dia)
    {		
		$sql="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  ".$dato." = (SELECT MAX(".$dato.") FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado)) {
			$this->maxDato = $row[$dato];
			$this->maxDatoHora = date("H:i", strtotime($row['hora']));
		}
	}
	
	public function diaSeco($dato,$ano,$mes,$dia)
    {
		$sql="SELECT * FROM estacion WHERE ".$dato." LIKE '0.0' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado)) {
			$Fecha = $row["fecha"];
			list( $anoS, $mesS, $diaS  ) = split( '[/.-]', $Fecha);
		}
		$diaSeco = mktime(0,0,0,$mesS,$diaS,$anoS);
		$hoy = mktime(0,0,0,$mes,$dia,$ano);
		$resta = $hoy - $diaSeco;
		$this->diaSecoDato = round($resta/86400);
	}
	
	public function diaLluvioso($dato,$ano,$mes,$dia)
    {
		$sql="SELECT * FROM estacion WHERE ".$dato." NOT LIKE '0.0' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado)) {
			$Fecha = $row["fecha"];
			list( $anoS, $mesS, $diaS  ) = split( '[/.-]', $Fecha);
		}
		$diaSeco = mktime(0,0,0,$mesS,$diaS,$anoS);
		$hoy = mktime(0,0,0,$mes,$dia,$ano);
		$resta = $hoy - $diaSeco;
		$this->diaLluviaDato = round($resta/86400);
	}
	
	public function datoDom($dato,$ano,$mes,$dia)
    {
		$sql="SELECT ".$dato.", COUNT(*) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia' GROUP BY ".$dato." HAVING COUNT(*) > 1 ORDER BY COUNT(*) DESC LIMIT 1";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado)) {
			$this->datoDomV = $row[$dato];
		}
		switch(true)
		{
			case (($this->datoDomV >= 349.5 && $this->datoDomV <= 360) || ($this->datoDomV >= 0 && $this->datoDomV <= 10.5)):
			{
				$this->letra= "N";
				break;
			}
			case (($this->datoDomV >= 10.5) && $this->datoDomV <= 33.5):
			{
				$this->letra= "NNE";
				break;
			}
			case (($this->datoDomV >= 33.5) && $this->datoDomV <= 55.5):
			{
				$this->letra= "NE";
				break;
			}
			case (($this->datoDomV >= 55.5) && $this->datoDomV <= 78.5):
			{
				$this->letra= "ENE";
				break;
			}
			case (($this->datoDomV >= 78.5) && $this->datoDomV <= 100.5):
			{
				$this->letra= "E";
				break;
			}
			case (($this->datoDomV >= 100.5) && $this->datoDomV <= 123.5):
			{
				$this->letra= "ESE";
				break;
			}
			case (($this->datoDomV >= 123.5) && $this->datoDomV <= 145.5):
			{
				$this->letra= "SE";
				break;
			}
			case (($this->datoDomV >= 145.5) && $this->datoDomV <= 168.5):
			{
				$this->letra= "SSE";
				break;
			}
			case (($this->datoDomV >= 168.5) && $this->datoDomV <= 190.5):
			{
				$this->letra= "S";
				break;
			}
			case (($this->datoDomV >= 190.5) && $this->datoDomV <= 213.5):
			{
				$this->letra= "SSO";
				break;
			}
			case (($this->datoDomV >= 213.5) && $this->datoDomV <= 235.5):
			{
				$this->letra= "SO";
				break;
			}
			case (($this->datoDomV >= 235.5) && $this->datoDomV <= 258.5):
			{
				$this->letra= "OSO";
				break;
			}
			case (($this->datoDomV >= 258.5) && $this->datoDomV <= 280.5):
			{
				$this->letra= "O";
				break;
			}
			case (($this->datoDomV >= 280.5) && $this->datoDomV <= 303.5):
			{
				$this->letra= "ONO";
				break;
			}
			case (($this->datoDomV >= 303.5) && $this->datoDomV <= 325.5):
			{
				$this->letra= "NO";
				break;
			}
			case (($this->datoDomV >= 325.5) && $this->datoDomV <= 349.5):
			{
				$this->letra= "NNO";
				break;
			}
		}		
	}
}

$dato = new datos($estacion);
$datoA = new datos ($estacion);
$datoTemp = new datos($estacion);
$datoHum = new datos($estacion);
$datoSen = new datos($estacion);
$datoTempI = new datos($estacion);
$datoHumI = new datos($estacion);
$datoTempA = new datos($estacion);
$datoHumA = new datos($estacion);
$datoSenA = new datos($estacion);
$datoTempIA = new datos($estacion);
$datoHumIA = new datos($estacion);
$datoPrec = new datos($estacion);
$datoRitPrec = new datos($estacion);
$datoViento = new datos($estacion);
$datoVRafaga = new datos($estacion);
$datoVDViento = new datos($estacion);
$datoPresion = new datos($estacion);
$datoRad = new datos($estacion);

$dato->DiaHoy();
$datoA->DiaAyer();

$datoTemp->minDia('temp',$dato->ano,$dato->mes,$dato->dia);
$datoTemp->maxDia('temp',$dato->ano,$dato->mes,$dato->dia);
$datoHum->minDia('humedad',$dato->ano,$dato->mes,$dato->dia);
$datoHum->maxDia('humedad',$dato->ano,$dato->mes,$dato->dia);
$datoSen->minDia('senTermica',$dato->ano,$dato->mes,$dato->dia);
$datoSen->maxDia('senTermica',$dato->ano,$dato->mes,$dato->dia);
$datoTempI->minDia('tempInterior',$dato->ano,$dato->mes,$dato->dia);
$datoTempI->maxDia('tempInterior',$dato->ano,$dato->mes,$dato->dia);
$datoHumI->minDia('humInterior',$dato->ano,$dato->mes,$dato->dia);
$datoHumI->maxDia('humInterior',$dato->ano,$dato->mes,$dato->dia);

$datoTempA->minDia('temp',$datoA->ano,$datoA->mes,$datoA->dia);
$datoTempA->maxDia('temp',$datoA->ano,$datoA->mes,$datoA->dia);
$datoHumA->minDia('humedad',$datoA->ano,$datoA->mes,$datoA->dia);
$datoHumA->maxDia('humedad',$datoA->ano,$datoA->mes,$datoA->dia);
$datoSenA->minDia('senTermica',$datoA->ano,$datoA->mes,$datoA->dia);
$datoSenA->maxDia('senTermica',$datoA->ano,$datoA->mes,$datoA->dia);
$datoTempIA->minDia('tempInterior',$datoA->ano,$datoA->mes,$datoA->dia);
$datoTempIA->maxDia('tempInterior',$datoA->ano,$datoA->mes,$datoA->dia);
$datoHumIA->minDia('humInterior',$datoA->ano,$datoA->mes,$datoA->dia);
$datoHumIA->maxDia('humInterior',$datoA->ano,$datoA->mes,$datoA->dia);

$datoPrec->diaSeco('precHoy',$dato->ano,$dato->mes,$dato->dia);
$datoPrec->diaLluvioso('precHoy',$dato->ano,$dato->mes,$dato->dia);
$datoPrec->maxDia('precHoy',$dato->ano,$dato->mes,$dato->dia);
$datoRitPrec->maxDia('precActual',$dato->ano,$dato->mes,$dato->dia);  

$datoVRafaga->maxDia('vRafaga',$dato->ano,$dato->mes,$dato->dia); 
$datoViento->maxDia('vPromedio',$dato->ano,$dato->mes,$dato->dia);
$datoVDViento->datoDom('dVientoActual',$dato->ano,$dato->mes,$dato->dia);

$datoPresion->minDia('presion',$dato->ano,$dato->mes,$dato->dia);
$datoPresion->maxDia('presion',$dato->ano,$dato->mes,$dato->dia);

$datoRad->maxDia('rSolar',$dato->ano,$dato->mes,$dato->dia);

?>