<?php
class datos
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
	
	public function maxminDia($ano,$mes,$dia)
    {	
	//Temperatura
		$sql="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  temp = (SELECT MAX(temp) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado = $this->coneccion -> query($sql) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado)) {
			$this->maxDatoTemp = $row['temp'];
			$this->maxDatoHoraTemp = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaTemp = utf8_encode(strftime("%A, %d de %B", $hoyM));
		
		$sql2="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  temp = (SELECT MIN(temp) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado2 = $this->coneccion -> query($sql2) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado2)) {
			$this->minDatoTemp = $row['temp'];
			$this->minDatoHoraTemp = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->minDatoDiaTemp = utf8_encode(strftime("%A, %d de %B", $hoyM));
	//Sensacion Termica	
		$sql3="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  senTermica = (SELECT MAX(senTermica) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado3 = $this->coneccion -> query($sql3) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado3)) {
			$this->maxDatoSen = $row['senTermica'];
			$this->maxDatoHoraSen = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaSen = utf8_encode(strftime("%A, %d de %B", $hoyM));
		
		$sql4="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  senTermica = (SELECT MIN(senTermica) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado4 = $this->coneccion -> query($sql4) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado4)) {
			$this->minDatoSen = $row['senTermica'];
			$this->minDatoHoraSen = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->minDatoDiaSen = utf8_encode(strftime("%A, %d de %B", $hoyM));
	//Humedad
		$sql5="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  humedad = (SELECT MAX(humedad) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado5 = $this->coneccion -> query($sql5) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado5)) {
			$this->maxDatoHum = $row['humedad'];
			$this->maxDatoHoraHum = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaHum = utf8_encode(strftime("%A, %d de %B", $hoyM));
		
		$sql6="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  humedad = (SELECT MIN(humedad) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado6 = $this->coneccion -> query($sql6) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado6)) {
			$this->minDatoHum = $row['humedad'];
			$this->minDatoHoraHum = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->minDatoDiaHum = utf8_encode(strftime("%A, %d de %B", $hoyM));
	//Temperatura Interior
		$sql7="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  tempInterior = (SELECT MAX(tempInterior) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado7 = $this->coneccion -> query($sql7) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado7)) {
			$this->maxDatoTempI = $row['tempInterior'];
			$this->maxDatoHoraTempI = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaTempI = utf8_encode(strftime("%A, %d de %B", $hoyM));
		
		$sql8="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  tempInterior = (SELECT MIN(tempInterior) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado8 = $this->coneccion -> query($sql8) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado8)) {
			$this->minDatoTempI = $row['tempInterior'];
			$this->minDatoHoraTempI = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->minDatoDiaTempI = utf8_encode(strftime("%A, %d de %B", $hoyM));
	//Humedad Interior
		$sql9="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  humInterior = (SELECT MAX(humInterior) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado9 = $this->coneccion -> query($sql9) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado9)) {
			$this->maxDatoHumI = $row['humInterior'];
			$this->maxDatoHoraHumI = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaHumI = utf8_encode(strftime("%A, %d de %B", $hoyM));
		
		$sql10="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  humInterior = (SELECT MIN(humInterior) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado10 = $this->coneccion -> query($sql10) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado10)) {
			$this->minDatoHumI = $row['humInterior'];
			$this->minDatoHoraHumI = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->minDatoDiaHumI = utf8_encode(strftime("%A, %d de %B", $hoyM));
	//Presion
		$sql11="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  presion = (SELECT MAX(presion) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado11 = $this->coneccion -> query($sql11) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado11)) {
			$this->maxDatoPres = $row['presion'];
			$this->maxDatoHoraPres = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaPres = utf8_encode(strftime("%A, %d de %B", $hoyM));
		
		$sql12="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  presion = (SELECT MIN(presion) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado12 = $this->coneccion -> query($sql12) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado12)) {
			$this->minDatoPres = $row['presion'];
			$this->minDatoHoraPres = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->minDatoDiaPres = utf8_encode(strftime("%A, %d de %B", $hoyM));
	//Intensidad viento
		$sql13="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  vPromedio = (SELECT MAX(vPromedio) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado13 = $this->coneccion -> query($sql13) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado13)) {
			$this->maxDatoVi = $row['vPromedio'];
			$this->maxDatoHoraVi = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaVi = utf8_encode(strftime("%A, %d de %B", $hoyM));
	//Rafaga viento
		$sql14="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  vRafaga = (SELECT MAX(vRafaga) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado14 = $this->coneccion -> query($sql14) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado14)) {
			$this->maxDatoViR = $row['vRafaga'];
			$this->maxDatoHoraViR = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaViR = utf8_encode(strftime("%A, %d de %B", $hoyM));	
	//Precipitacion Hoy
		$sql15="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  precHoy = (SELECT MAX(precHoy) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado15 = $this->coneccion -> query($sql15) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado15)) {
			$this->maxDatoPrec = $row['precHoy'];
			$this->maxDatoHoraPrec = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaPrec = utf8_encode(strftime("%A, %d de %B", $hoyM));
	//Ritmo
		$sql16="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  precActual = (SELECT MAX(precActual) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado16 = $this->coneccion -> query($sql16) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado16)) {
			$this->maxDatoPrecA = $row['precActual'];
			$this->maxDatoHoraPrecA = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaPrecA = utf8_encode(strftime("%A, %d de %B", $hoyM));	
	//Radiacion Solar
		$sql17="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND  rSolar = (SELECT MAX(rSolar) FROM estacion WHERE estacion = '".$this->estacion."' AND fecha LIKE '$ano-$mes-$dia') AND fecha LIKE '$ano-$mes-$dia' ORDER BY fecha DESC, hora DESC LIMIT 1";
		$resultado17 = $this->coneccion -> query($sql17) or trigger_error($this->coneccion ->error);
		while($row = mysqli_fetch_array($resultado17)) {
			$this->maxDatoRSol = $row['rSolar'];
			$this->maxDatoHoraRSol = date("H:i", strtotime($row['hora']));
			$Fecha = $row["fecha"];
			list( $anoo, $meso, $diao  ) = split( '[/.-]', $Fecha);			
		}
		setlocale (LC_TIME,"spanish");
		$hoyM = mktime(0,0,0,$meso,$diao,$anoo);
		$this->maxDatoDiaRSol = utf8_encode(strftime("%A, %d de %B", $hoyM));
	}	
	
	public function diaSeco($dato,$ano,$mes,$dia)
    {
		$sql="SELECT * FROM estacion WHERE estacion = '".$this->estacion."' AND ".$dato." LIKE '0.0' ORDER BY fecha DESC, hora DESC LIMIT 1";
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
	
    function __destruct()
    {
        mysqli_close($this->coneccion);
    }
}





?>